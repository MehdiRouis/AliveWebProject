<?php

namespace App\Validators;

use App\Protections\Security;

/**
 * Class Validator
 * @package App\Validators
 */
class Validator extends Security {

    /**
     * @var bool
     */
    private $table;

    /**
     * @var array
     */
    private $postValues = [];

    /**
     * @var array
     */
    private $verifiedInputs = [];

    /**
     * Validator constructor.
     * @param array $postValues
     * @param bool $table
     */
    public function __construct($postValues = [], $table = false) {
        parent::__construct();
        $this->table = $table;
        $this->postValues = $postValues;
        $newArray = [];
        foreach($this->postValues as $valueType => $valueArray) {
            $newArray[$valueType] = [];
            foreach($valueArray as $postName) {
                $newArray[$valueType][] = [$postName => $_POST[$postName]];
            }
        }
        $this->postValues = $newArray;
    }

    /**
     * Valider les informations des inputs via la classe Vérifications
     * @return array
     */
    public function validate() {
        $postValues = $this->postValues;
        $validType = new Verifications($this->table);
        foreach ($postValues as $valueType => $valuePost) {
            $validType->verify($valueType, $valuePost);
            $this->verifiedInputs = $validType->getErrors();
        }
        return $validType->getErrors();
    }

    /**
     * Obtenir les erreurs des vérifications
     * @return array
     */
    public function getErrors() {
        return $this->verifiedInputs;
    }

    public function addError($inputName, $errorValue) {
        $this->verifiedInputs[$inputName] = $errorValue;
    }
    /**
     * Savoir s'il y a des erreurs.
     * @return bool
     */
    public function isThereErrors() {
        if(count($this->verifiedInputs) > 0) {
            return true;
        } else {
            return false;
        }
    }
}