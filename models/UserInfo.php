<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: UserInfo.php
 * Date: 09/08/2017 02:48
 */
class UserInfo extends _EntitySerialize {

    private $flag_active;
    private $firsname;
    private $lastname;
    private $email_security;
    private $phone;
    private $address;
    private $state;
    private $country;
    private $birthday;
    private $gender;

    public function __construct1($arrayValues) {
        $this->flag_active = $arrayValues[ 'flag_active' ];
        $this->firsname = $arrayValues[ 'firsname' ];
        $this->lastname = $arrayValues[ 'lastname' ];
        $this->email_security = $arrayValues[ 'email_security' ];
        $this->phone = $arrayValues[ 'phone' ];
        $this->address = $arrayValues[ 'address' ];
        $this->state = $arrayValues[ 'state' ];
        $this->country = $arrayValues[ 'country' ];
        $this->birthday = $arrayValues[ 'birthday' ];
        $this->gender = $arrayValues[ 'gender' ];
    }

    public function getFlagActive() {
        return $this->flag_active;
    }

    public function getFirsname() {
        return $this->firsname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmailSecurity() {
        return $this->email_security;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getState() {
        return $this->state;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setFlagActive($flag_active) {
        $this->flag_active = $flag_active;
    }

    public function setFirsname($firsname) {
        $this->firsname = $firsname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setEmailSecurity($email_security) {
        $this->email_security = $email_security;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    /**
     *
     * @param type $propsUnserialized Array de nombre de propiedades a excluir
     * @return type
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
