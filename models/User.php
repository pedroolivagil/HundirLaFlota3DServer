<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: User.php
 * Date: 09/08/2017 02:48
 */
class User extends _EntitySerialize {

    private $_id;
    private $IdUser;
    private $FlagActive;
    private $AcountActive;      // True si el usuario tiene el email verificado
    private $EntryDate;
    private $Username;
    private $Password;
    private $Email;
    private $TypeUser;
    private $Firstname;
    private $Lastname;
    private $EmailSecurity;
    private $Phone;
    private $Address;
    private $State;
    private $Country;
    private $Birthday;
    private $Gender;
    private $Code;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->IdUser = (int)$arrayValues[ 'IdUser' ];
        $this->FlagActive = (bool)$arrayValues[ 'FlagActive' ];
        $this->AcountActive = (bool)$arrayValues[ 'AcountActive' ];
        $this->Username = $arrayValues[ 'Username' ];
        $this->Password = $arrayValues[ 'Password' ];
        $this->Email = $arrayValues[ 'Email' ];
        $this->TypeUser = (int)$arrayValues[ 'TypeUser' ];
        $this->EntryDate = (int)$arrayValues[ 'EntryDate' ];
        $this->Firstname = $arrayValues[ 'Firstname' ];
        $this->Lastname = $arrayValues[ 'Lastname' ];
        $this->EmailSecurity = $arrayValues[ 'EmailSecurity' ];
        $this->Phone = $arrayValues[ 'Phone' ];
        $this->Address = $arrayValues[ 'Address' ];
        $this->State = (int)$arrayValues[ 'State' ];
        $this->Country = $arrayValues[ 'Country' ];
        $this->Birthday = (int)$arrayValues[ 'Birthday' ];
        $this->Gender = (int)$arrayValues[ 'Gender' ];
        $this->Code = $arrayValues[ 'Code' ];
    }

    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getIdUser() {
        return $this->IdUser;
    }

    /**
     * @param mixed $IdUser
     */
    public function setIdUser($IdUser) {
        $this->IdUser = $IdUser;
    }

    /**
     * @return mixed
     */
    public function getFlagActive() {
        return $this->FlagActive;
    }

    /**
     * @param mixed $FlagActive
     */
    public function setFlagActive($FlagActive) {
        $this->FlagActive = $FlagActive;
    }

    /**
     * @return mixed
     */
    public function getAcountActive() {
        return $this->AcountActive;
    }

    /**
     * @param mixed $AcountActive
     */
    public function setAcountActive($AcountActive) {
        $this->AcountActive = $AcountActive;
    }

    /**
     * @return mixed
     */
    public function getEntryDate() {
        return $this->EntryDate;
    }

    /**
     * @param mixed $EntryDate
     */
    public function setEntryDate($EntryDate) {
        $this->EntryDate = $EntryDate;
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->Username;
    }

    /**
     * @param mixed $Username
     */
    public function setUsername($Username) {
        $this->Username = $Username;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password) {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email) {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getTypeUser() {
        return $this->TypeUser;
    }

    /**
     * @param mixed $TypeUser
     */
    public function setTypeUser($TypeUser) {
        $this->TypeUser = $TypeUser;
    }

    /**
     * @return mixed
     */
    public function getFirstname() {
        return $this->Firstname;
    }

    /**
     * @param mixed $Firstname
     */
    public function setFirstname($Firstname) {
        $this->Firstname = $Firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname() {
        return $this->Lastname;
    }

    /**
     * @param mixed $Lastname
     */
    public function setLastname($Lastname) {
        $this->Lastname = $Lastname;
    }

    /**
     * @return mixed
     */
    public function getEmailSecurity() {
        return $this->EmailSecurity;
    }

    /**
     * @param mixed $EmailSecurity
     */
    public function setEmailSecurity($EmailSecurity) {
        $this->EmailSecurity = $EmailSecurity;
    }

    /**
     * @return mixed
     */
    public function getPhone() {
        return $this->Phone;
    }

    /**
     * @param mixed $Phone
     */
    public function setPhone($Phone) {
        $this->Phone = $Phone;
    }

    /**
     * @return mixed
     */
    public function getAddress() {
        return $this->Address;
    }

    /**
     * @param mixed $Address
     */
    public function setAddress($Address) {
        $this->Address = $Address;
    }

    /**
     * @return mixed
     */
    public function getState() {
        return $this->State;
    }

    /**
     * @param mixed $State
     */
    public function setState($State) {
        $this->State = $State;
    }

    /**
     * @return mixed
     */
    public function getCountry() {
        return $this->Country;
    }

    /**
     * @param mixed $Country
     */
    public function setCountry($Country) {
        $this->Country = $Country;
    }

    /**
     * @return mixed
     */
    public function getBirthday() {
        return $this->Birthday;
    }

    /**
     * @param mixed $Birthday
     */
    public function setBirthday($Birthday) {
        $this->Birthday = $Birthday;
    }

    /**
     * @return mixed
     */
    public function getGender() {
        return $this->Gender;
    }

    /**
     * @param mixed $Gender
     */
    public function setGender($Gender) {
        $this->Gender = $Gender;
    }

    /**
     * @return mixed
     */
    public function getCode() {
        return $this->Code;
    }

    /**
     * @param mixed $Code
     */
    public function setCode($Code) {
        $this->Code = $Code;
    }

    public function criptPass() {
        $this->Password = Tools::cryptString($this->Password);
    }

    /**
     * Array de nombre de propiedades a excluir
     * @param array $propsUnserialized
     * @return string
     */
    public function serialize($propsUnserialized = NULL) {
        $properties = get_object_vars($this);
        if (!is_null($propsUnserialized)) {
            foreach ($propsUnserialized as $property) {
                unset($properties[ $property ]);
            }
        }
        parent::setObject($properties);
        return parent::serialize();
    }
}
