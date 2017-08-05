<?php

/**
 * Description of PowerUp
 *
 * @author Oliva
 */
class Resource extends _EntitySerialize {

    private $_id;
    private $id_resource;
    private $name;
    private $mimetype;
    private $file;
    private $size;
    private $flag_active;
    private $add_date;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_resource = $arrayValues[ 'id_resource' ];
        $this->name = $arrayValues[ 'name' ];
        $this->mimetype = $arrayValues[ 'mimetype' ];
        $this->size = $arrayValues[ 'size' ];
        $this->file = $arrayValues[ 'file' ];
    }

    public function getId() {
        return $this->_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getMimetype() {
        return $this->mimetype;
    }

    public function getFile() {
        return $this->file;
    }

    public function getSize() {
        return $this->size;
    }

    public function getIdResource() {
        return $this->id_resource;
    }

    public function getFlagActive() {
        return $this->flag_active;
    }

    public function setFlagActive($flag_active) {
        $this->flag_active = $flag_active;
    }

    public function getAddDate() {
        return $this->add_date;
    }

    public function setAddDate($add_date) {
        $this->add_date = $add_date;
    }

    public function setIdResource($id_resource) {
        $this->id_resource = $id_resource;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setMimetype($mimetype) {
        $this->mimetype = $mimetype;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function selectResourceFile() {
        $filename = $this->getName() . EXTENSION_RESOURCE;
        $url = _RESOURCE_PATH_ . TABLE_RESOURCE . $filename;
        if (file_exists($url)) {
            $this->setFile(file_get_contents($url));
        }
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
