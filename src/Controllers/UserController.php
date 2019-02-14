<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 18:31
 */

namespace Controllers;

use App\Validators\Validator;
use App\Validators\Verifications;
use Models\Globals\Files;
use Models\Globals\Post;
use Models\Users\User;

class UserController extends Controller {

    public function getDashboard() {
        $this->security->restrict();
        $this->render('user/dashboard', ['pageName' => 'Dashboard']);
    }

    public function getProfile($id) {
        $this->security->restrict();
        $redirect = false;
        if($this->security->idVerification($id, 'alive_users')) {
            $user = new User($id);
            if($user->getId() === $this->user->getId() || $user->isProfilePublic()) {
                $this->render('user/profile', ['pageName' => $user->getUserName(), 'userProfile' => $user, 'scripts' => ['js/userProfile.js']]);
            } else {
                $redirect = 'default';
            }
        } else {
            $redirect = 'default';
        }
        if($redirect) {
            $this->security->safeLocalRedirect($redirect);
        }
    }

    public function getEmailValidationKey() {
        $this->security->restrict();
        if(!$this->user->isEmailValidate()) {
            $key = $this->user->generateKey(1, 1, $this->user->getEmail());
            if($key) {
                $this->sendMail('AliveWebProject - Service de validation', [$this->user->getEmail() => $this->user->getFullName()], "
            <p>Bonjour {$this->user->getFullName()},</p>
            <p>Nous avons remarqué que vous vouliez confirmer votre adresse email ( {$this->user->getEmail()} ).</p>
            <p>Pour ce faire, il faut entrer la clé qui suit dans vos paramètres de comptes.</p>
            <p>( Menu : -> PROFIL -> Paramètres -> Valider mon adresse email ).</p>
            <p>Voici la clé : {$key}</p>
            <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"btn btn-primary\">
                          <tbody>
                            <tr>
                              <td align=\"left\">
                                <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                                  <tbody>
                                    <tr>
                                      <td><a href=\"{$this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()])}#parameters\" target=\"_blank\">Valider son adresse email</a></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
</table>
            <p>Lien d'accès : <a href=\"{$this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()])}#parameters\">{$this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()])}#parameters</a></p>");
                $this->security->safeExternalRedirect($this->security->safeExternalRedirect($this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()]) . '?success=generationEmail#parameters'));
            } else {
                $this->security->safeExternalRedirect($this->security->safeExternalRedirect($this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()]) . '?error=generationEmail#parameters'));
            }
        }
        $this->security->safeLocalRedirect('default');
    }

    public function getPhoneNumberValidationKey() {
        $this->security->restrict();
        if(!$this->user->isPhoneNumberValidate()) {
            $key = $this->user->generateSMSKey(2, 1, $this->user->getPhoneNumber());
            if($key) {
                $this->sms->definePhoneNumber($this->user->getPhoneNumber());
                $this->sms->defineMessage('Validation de compte AliveWebProject -> CODE : ' . $key);
                $this->sms->send();
                $this->security->safeExternalRedirect($this->security->safeExternalRedirect($this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()]) . '?success=generationSMS#parameters'));
            } else {
                $this->security->safeExternalRedirect($this->security->safeExternalRedirect($this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()]) . '?error=generationSMS#parameters'));
            }
        }
        $this->security->safeLocalRedirect('default');
    }

    public function postConfidentialityChange() {
        $this->security->restrict();
        $privateProfile = 'privateProfile';
        $post = new Post();
        $validator = new Validator();
        $validator->validate();
        $postPrivateProfile = $post->getvalue($privateProfile);
        if(isset($postPrivateProfile)) {
            if($postPrivateProfile === 'public' || $postPrivateProfile === 'private') {
                $this->user->setProfileType($postPrivateProfile);
                $this->security->safeExternalRedirect($this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()]) . '?success=confidentialityChange');
            } else {
                $validator->addError($privateProfile, 'Champs incorrect.');
            }
        } else {
            $validator->addError($privateProfile, 'Champs incorrect.');
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'scripts' => ['js/userProfile.js'], 'errors' => $validator->getErrors()]);
    }

    public function postEmailChange() {
        $this->security->restrict();
        $email = 'email';
        $reMail = 'reEmail';
        $password = 'emailFormPassword';
        $validator = new Validator([
            'email' => [$email]
        ], 'alive_users');
        $validator->validate();
        $post = new Post();
        if($post->getValue($email) !== $post->getValue($reMail)) {
            $validator->addError($email, 'Les 2 adresses email ne correspondent pas.');
        }
        if(!$this->user->matchPassword($post->getValue($password))) {
            $validator->addError($password, 'Le mot de passe est incorrect.');
        }
        if(!$validator->isThereErrors()) {
            $this->user->setEmail($post->getValue($email));
            $this->security->safeLocalRedirect('profile', ['id' => $this->user->getId()]);
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'scripts' => ['js/userProfile.js'], 'errors' => $validator->getErrors()]);
    }

    public function postPasswordChange() {
        $this->security->restrict();
        $oldPassword = 'oldPassword';
        $newPassword = 'newPassword';
        $reNewPassword = 'reNewPassword';
        $validator = new Validator(['password' => [$newPassword]]);
        $validator->validate();
        $post = new Post();
        if($post->getValue($newPassword) !== $post->getValue($reNewPassword)) {
            $validator->addError($newPassword, 'Les mots de passes ne correspondent pas.');
        }
        if(!$this->user->matchPassword($post->getValue($oldPassword))) {
            $validator->addError($oldPassword, 'Le mot de passe est incorrect.');
        }
        if(!$validator->isThereErrors()) {
            $this->user->setPassword($post->getValue($newPassword));
            $this->security->safeLocalRedirect('profile', ['id' => $this->user->getId()]);
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'scripts' => ['js/userProfile.js'], 'errors' => $validator->getErrors()]);
    }

    public function postPhoneNumberChange() {
        $this->security->restrict();
        $phoneNumber = 'phoneNumber';
        $password = 'phoneFormPassword';
        $validator = new Validator(['phoneNumber' => [$phoneNumber]]);
        $validator->validate();
        $post = new Post();
        if(!$this->user->matchPassword($post->getValue($password))) {
            $validator->addError($password, 'Mot de passe incorrect.');
        }
        if(!$validator->isThereErrors()) {
            $this->user->setPhoneNumber($post->getValue($phoneNumber));
            $this->security->safeLocalRedirect('profile', ['id' => $this->user->getId()]);
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'scripts' => ['js/userProfile.js'], 'errors' => $validator->getErrors()]);
    }

    public function postBannerChange() {
        $this->security->restrict();
        $file = 'file';
        $validator = new Validator();
        $validator->validate();
        $files = new Files();
        if($files->getValue($file)) {
            $verifications = new Verifications();
            $verifs = $verifications->isValidPicture($file);
            if(count($verifications->isValidPicture($file)) === 0) {
                if(!$validator->isThereErrors()) {
                    if(!$this->user->isProfileBannerNull()) {
                        $banner = $this->user->getProfileBanner(true);
                        $files->secureUploadFile($file, PROJECT_LIBS . '/public/assets/img/profile/banners', $banner);
                    } else {
                        $banner = $files->secureUploadFile($file, PROJECT_LIBS . '/public/assets/img/profile/banners');
                        $this->user->setProfileBanner($banner);
                    }
                    $this->security->safeLocalRedirect('profile', ['id' => $this->user->getId()]);
                }
            } else {
                $validator->addError($file, $verifs[$file]);
            }
        } else {
            $validator->addError($file, 'Merci de choisir une image valide.');
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'scripts' => ['js/userProfile.js'], 'errors' => $validator->getErrors()]);
    }

    public function postValidateEmail() {
        $this->security->restrict();
        $key = 'emailValidationKey';
        $errors = $this->user->validateEmail($key);
        if(count($errors) === 0) {
            $this->security->safeExternalRedirect($this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()]). '?success=emailValidated');
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'errors' => $errors, 'scripts' => ['js/userProfile.js']]);
    }

    public function postValidatePhoneNumber() {
        $this->security->restrict();
        $key = 'phoneNumberValidationKey';
        $errors = $this->user->validatePhoneNumber($key);
        if(count($errors) === 0) {
            $this->security->safeExternalRedirect($this->getRouter()->getFullUrl('profile', ['id' => $this->user->getId()]). '?success=phoneNumberValidated');
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'errors' => $errors, 'scripts' => ['js/userProfile.js']]);
    }

}
