<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Resource.php
 * Date: 09/08/2017 02:48
 */
class Resource extends _EntitySerialize {

    private $_id;
    private $IdResource;
    private $Code;
    private $Name;
    private $MimeType;
    private $File;
    private $Size;
    private $FlagActive;
    private $EntryDate;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->IdResource = (int)$arrayValues[ 'IdResource' ];
        $this->Name = $arrayValues[ 'Name' ];
        $this->MimeType = $arrayValues[ 'MimeType' ];
        $this->Size = (int)$arrayValues[ 'Size' ];
        $this->File = $arrayValues[ 'File' ];
        $this->Code = $arrayValues[ 'Code' ];
    }

    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getIdResource() {
        return $this->IdResource;
    }

    /**
     * @param mixed $IdResource
     */
    public function setIdResource($IdResource) {
        $this->IdResource = $IdResource;
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

    /**
     * @return mixed
     */
    public function getName() {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name) {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getMimeType() {
        return $this->MimeType;
    }

    /**
     * @param mixed $MimeType
     */
    public function setMimeType($MimeType) {
        $this->MimeType = $MimeType;
    }

    /**
     * @return mixed
     */
    public function getFile() {
        return $this->File;
    }

    /**
     * @param mixed $File
     */
    public function setFile($File) {
        $this->File = $File;
    }

    /**
     * @return mixed
     */
    public function getSize() {
        return $this->Size;
    }

    /**
     * @param mixed $Size
     */
    public function setSize($Size) {
        $this->Size = $Size;
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
    public function getEntryDate() {
        return $this->EntryDate;
    }

    /**
     * @param mixed $EntryDate
     */
    public function setEntryDate($EntryDate) {
        $this->EntryDate = $EntryDate;
    }

    // public function selectResourceFile() {
    //     $filename = $this->getName() . EXTENSION_RESOURCE;
    //     $url = _RESOURCE_PATH_ . TABLE_RESOURCE . '/' . $filename;
    //     var_dump($url);
    //     if (file_exists($url)) {
    //         $this->setFile(file_get_contents($url));
    //     }
    // }

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
