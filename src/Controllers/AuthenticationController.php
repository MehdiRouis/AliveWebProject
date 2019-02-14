<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 25/01/19
 * Time: 13:34
 */

namespace Controllers;

use App\Validators\Validator;
use Models\Database\PDOConnect;
use Models\Globals\Post;
use Models\Keys\Key;
use Models\Users\User;

class AuthenticationController extends Controller
{

    public function getLogin()
    {
        $this->security->restrict(false);
        $this->render('auth/login', ['pageName' => 'Connexion']);
    }

    public function getRegister()
    {
        $this->security->restrict(false);
        $captcha = $this->security->generateCaptcha();
        $this->render('auth/register', ['pageName' => 'Inscription', 'captcha' => $captcha, 'scripts' => ['js/register.js']]);
    }

    public function getForgotPassword()
    {
        $this->security->restrict(false);
        $captcha = $this->security->generateCaptcha();
        $this->render('auth/forgotpassword', ['pageName' => 'Mot de passe oublié', 'captcha' => $captcha, 'scripts' => ['js/register.js']]);
    }

    public function getValidationChangePassword($id)
    {
        $this->security->restrict(false);
        $db = new PDOConnect();
        $error = false;
        if ($db->existContent('alive_users', 'id', $id)) {
            $user = new User($id);
            $req = $db->query('SELECT id FROM alive_keys WHERE status = ? AND userId = ? AND type = ? OR type = ?', [1, $user->getId(), 3, 4]);
            if ($req->rowCount() > 0) {
                $captcha = $this->security->generateCaptcha();
                $this->render('auth/validationchangepassword', ['pageName' => 'Validation du changement de mot de passe', 'userId' => $user->getId(), 'captcha' => $captcha]);
            } else {
                $error = true;
            }
        } else {
            $error = true;
        }
        if ($error) {
            $this->security->safeLocalRedirect('default');
        }
    }

    public function getLogout()
    {
        $this->security->restrict();
        $this->dbauth->logOut();
    }

    public function postLogin()
    {
        $this->security->restrict(false);
        $errors = $this->dbauth->logIn('logUsername', 'logPassword');
        $this->render('auth/login', ['pageName' => 'Connexion', 'errors' => $errors]);
    }

    public function postRegister()
    {
        $this->security->restrict(false);
        $errors = $this->dbauth->register('regUsername', 'regAccountType', 'regLastName', 'regFirstName', 'regEmail', 'regConfirmEmail', 'regPhoneNumber', 'regBirthDay', 'regPassword', 'regConfirmPassword', 'regCaptcha');
        $captcha = $this->security->generateCaptcha();
        $this->render('auth/register', ['pageName' => 'Inscription', 'errors' => $errors, 'scripts' => ['js/register.js'], 'captcha' => $captcha]);
    }

    public function postForgotPassword()
    {
        $this->security->restrict(false);
        $userKey = 'user';
        $typeKey = 'type';
        $captchaKey = 'captcha';
        $post = new Post();
        $userValue = $post->getValue($userKey);
        $typeValue = $post->getValue($typeKey);
        $validator = new Validator(['captcha' => [$captchaKey]]);
        $validator->validate();
        if (!$userValue) {
            $validator->addError($userKey, 'Merci de remplir ce champ.');
        }
        if (!$typeValue || $typeValue !== 'email' && $typeValue !== 'sms') {
            $validator->addError($typeKey, 'Merci de remplir ce champ.');
        }
        if (!$validator->isThereErrors()) {
            $db = new PDOConnect();
            $req = $db->query('SELECT id FROM alive_users WHERE userName = ? OR email = ?', [$this->security->secureValue($userValue), $this->security->secureValue($userValue)]);
            if ($req->rowCount() > 0) {
                $userFetch = $req->fetch();
                $userClass = new User($userFetch->id);
                if ($typeValue === 'email') {
                    $key = $userClass->generateKey(3, 1, $userClass->getEmail());
                    if ($key) {
                        $this->sendMail('AliveWebProject - Service de validation', [$userClass->getEmail() => $userClass->getFullName()], '
<p>Bonjour ' . $userClass->getFullName() . ',</p>
<p>Nous t\'envoyons cet email afin de pouvoir vous donner la chance de changer votre mot de passe.</p>
<p>Si ce n\'est pas vous, je vous pries de bien vouloir ignorer cet email.</p>
<p>Pour procéder au changement de mot de passe, une clé est présente ci-dessous.</p>
<p>CODE : ' . $key . '</p>
<tr>
                              <td align="left">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td><a href="' . $this->getRouter()->getFullUrl('lostPasswordValidation', ['id' => $userClass->getId()]) . '" target="_blank">Changer de mot de passe</a></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>');
                        $this->security->safeExternalRedirect($this->getRouter()->getFullUrl('lostPasswordValidation', ['id' => $userClass->getId()]) . '?success=generationEmail');
                    } else {
                        $validator->addError('global', 'Clé déjà générée. Il faut attendre 15 minutes pour en recevoir une de nouveau.');
                    }
                } elseif ($typeValue === 'sms') {
                    if ($userClass->isPhoneNumberValidate()) {
                        $key = $userClass->generateSMSKey(4, 1, $userClass->getPhoneNumber());
                        if ($key) {
                            $this->sms->definePhoneNumber($userClass->getPhoneNumber());
                            $this->sms->defineMessage('Changement de mot de passe AliveWebProject -> CODE : ' . $key);
                            $this->sms->send();
                            $this->security->safeExternalRedirect($this->getRouter()->getFullUrl('lostPasswordValidation', ['id' => $userClass->getId()]) . '?success=generationSMS');
                        } else {
                            $validator->addError('global', 'Clé déjà générée. Il faut attendre 15 minutes pour en recevoir une de nouveau.');
                        }
                    } else {
                        $validator->addError($typeKey, 'Le numéro de téléphone n\'a pas été validé.');
                    }
                }
            } else {
                $validator->addError($userKey, 'Compte introuvable.');
            }
        }
        $captcha = $this->security->generateCaptcha();
        $this->render('auth/forgotpassword', ['pageName' => 'Mot de passe oublié', 'captcha' => $captcha, 'errors' => $validator->getErrors(), 'scripts' => ['js/register.js']]);
    }

    public function postValidateNewPassword()
    {
        $key = 'code';
        $newPassword = 'newPassword';
        $reNewPassword = 'reNewPassword';
        $captcha = 'captcha';
        $validator = new Validator(['password' => [$newPassword], 'captcha' => [$captcha]]);
        $validator->validate();
        $post = new Post();
        $code = $post->getValue($key);
        $pass = $post->getValue($newPassword);
        $pass2 = $post->getValue($reNewPassword);
        $userId = $post->getValue('userId');
        if (!$code) {
            $validator->addError($key, 'Champ vide.');
        }
        if ($pass !== $pass2) {
            $validator->addError($reNewPassword, 'Les mots de passes ne correspondent pas.');
        }
        $db = new PDOConnect();
        $req = $db->query('SELECT id FROM alive_users WHERE id = ?', [$userId]);
        if ($req->rowCount() === 0) {
            $validator->addError('global', 'Erreur interne...');
        }
        $req = $db->query('SELECT id FROM alive_keys WHERE userId = ? AND status = ? AND code = ? AND type = ? OR type = ?', [$userId, 1, $code, 3, 4]);
        if ($req->rowCount() === 0) {
            $validator->addError($key, 'Clé incorrect.');
        }
        if (!$validator->isThereErrors()) {
            $user = new User($userId);
            $key = $req->fetch();
            $key = new Key($key->id);
            $key->setStatus(2);
            $user->setPassword($pass);
            $this->security->safeLocalRedirect('login');
        }
        $req = $db->query('SELECT id FROM alive_keys WHERE status = ? AND userId = ? AND type = ? OR type = ?', [1, $userId, 3, 4]);
        if ($req->rowCount() > 0) {
            $newCaptcha = $this->security->generateCaptcha();
            $this->render('auth/validationchangepassword', ['pageName' => 'Validation du changement de mot de passe', 'userId' => $userId, 'captcha' => $newCaptcha, 'errors' => $validator->getErrors()]);
        } else {
            $this->security->safeLocalRedirect('default');
        }
    }
}