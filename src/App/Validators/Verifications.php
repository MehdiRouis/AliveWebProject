<?php
/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 07:59
 */

namespace App\Validators;

use Models\Database\PDOConnect;

/**
 * Class Verifications
 * @package App\Validators
 */
class Verifications {

    /**
     * @var PDOConnect
     */
    private $db;

    /**
     * @var array
     */
    private $inputTypes = [];

    /**
     * @var array
     */
    private $errorList = [];

    /**
     * @var bool|string
     */
    private $verification_table;

    /**
     * Verifications constructor.
     * @param bool|string $table
     */
    public function __construct($table = false) {
        $this->db = new PDOConnect();
        $this->verification_table = $table;
        $this->errorList = [];
        $this->inputTypes = [
            'name' => 'isValidName',
            'birthDay' => 'isValidBirthDay',
            'email' => 'isValidEmail',
            'editEmail' => 'isBaseEmailValid',
            'phoneNumber' => 'isValidPhoneNumber',
            'password' => 'isValidPassword'
        ];
    }

    /**
     * Récupérer la table où auront lieu les vérifications si elle existe.
     * @return bool|string
     */
    public function getVerificationTable() {
        return $this->verification_table;
    }

    /**
     * Envoyer les vérifications des valeurs dans les fonctions prédéfinies.
     * @param string $valueType
     * @param array $content
     */
    public function verify($valueType, $content) {
        $found = false;
        foreach($this->inputTypes as $key => $value) {
            if($key === $valueType) {
                $found = $value;
            }
        }
        foreach($content as $key => $value) {
            if($found) {
                $this->$found(key($value), $value[key($value)]);
            } else {
                $this->addError(key($value), 'La clé "' . $valueType . '" de vérification est introuvable.');
            }
        }
    }

    /**
     * Savoir si un prénom / nom est valide.
     * @param string$inputName
     * @param string $inputValue
     * @return bool
     */
    public function isValidName($inputName, $inputValue) {
        if(!empty($inputValue)) {
            if(preg_match('/^[A-Za-zÂ-ÿ -]+$/i', $inputValue)) {
                if(strlen($inputName) > 3 && strlen($inputName) <= 25) {
                    return true;
                } else {
                    $this->addError($inputName, 'Le champs doit contenir entre 3 et 25 caractères.');
                }
            } else {
                $this->addError($inputName, 'Caractères spéciaux non-autorisés.');
            }
        } else {
            $this->addError($inputName, 'Champs vide.');
        }
        return false;
    }

    /**
     * Savoir si une date est valide.
     * @param string $inputName
     * @param string $inputValue
     * @return bool
     */
    public function isValidDate($inputName, $inputValue) {
        if(!empty($inputValue)) {
            if(preg_match('/^[\d]{1,2}\/[\d]{1,2}\/[\d]{4}$/i', $inputValue)) {
                $date = explode('/', $inputValue);
                $day = (int)$date[0];
                $month = (int)$date[1];
                $year = (int)$date[2];
                if (checkdate($month, $day, $year)) {
                    return true;
                } else {
                    $this->addError($inputName, 'Date invalide.');
                }
            } else {
                $this->addError($inputName, 'Date demandée sous la forme : DD/MM/YYYY');
            }
        } else {
            $this->addError($inputName, 'Champs vide.');
        }
        return false;
    }

    /**
     * Savoir si une date de naissance est valide.
     * @param string $inputName
     * @param string $inputValue
     * @return bool
     */
    public function isValidBirthDay($inputName, $inputValue) {
        if($this->isValidDate($inputName, $inputValue)) {
            if($inputValue <= date('d/m/Y')) {
                return true;
            } else {
                $this->addError($inputName, 'Date de naissance invalide.');
            }
        }
        return false;
    }

    /**
     * Savoir si une adresse mail est valide.
     * @param string $inputName
     * @param string $inputValue
     * @return bool
     */
    private function isBaseEmailValid($inputName, $inputValue) {
        if(!empty($inputValue)) {
            if(filter_var($inputValue, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                $this->addError($inputName, 'Adresse email invalide.');
            }
        } else {
            $this->addError($inputName, 'Champs vide.');
        }
        return false;
    }

    /**
     * Savoir si une adresse mail est valide avec des vérifications si il y a une table présente.
     * @param string $inputName
     * @param string $inputValue
     * @return bool
     */
    public function isValidEmail($inputName, $inputValue) {
        if($this->isBaseEmailValid($inputName, $inputValue)) {
            if($this->verification_table) {
                if(!$this->db->existContent($this->verification_table, 'mail', $inputValue)) {
                    return true;
                } else {
                    $this->addError($inputName, 'Adresse mail déjà utilisée.');
                }
            } else {
                return true;
            }
        }
        return false;
    }

    /**
     * Savoir si un numéro de téléphone est valide.
     * @param string $inputName
     * @param string $inputValue
     * @return bool
     */
    public function isValidPhoneNumber($inputName, $inputValue) {
        if(!empty($inputValue)) {
            if(preg_match('/^(\+33)[1-9]([0-9]{2}){4}$/i', $inputValue)) {
                return true;
            } else {
                $this->addError($inputName, 'Numéro demandé sous la forme +331 00 00 00 00');
            }
        } else {
            $this->addError($inputName, 'Champs vide.');
        }
        return false;
    }

    /**
     * Savoir si un mot de passe est valide.
     * @param string $inputName
     * @param string $inputValue
     * @return bool
     */
    public function isValidPassword($inputName, $inputValue) {
        if(strlen($inputValue) > 6) {
            return true;
        } else {
            $this->addError($inputName, 'Le mot de passe doit contenir plus de 6 caractères.');
        }
        return false;
    }

    /**
     * Ajouter une erreur.
     * @param string $inputName
     * @param string$message
     */
    public function addError($inputName, $message) {
        $this->errorList[$inputName] = $message;
    }

    /**
     * Récupérer les erreurs.
     * @return array
     */
    public function getErrors() {
        return $this->errorList;
    }

    public function __destruct() {

    }

}
