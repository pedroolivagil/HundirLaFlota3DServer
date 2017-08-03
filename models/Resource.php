<?php

/**
 * Description of PowerUp
 *
 * @author Oliva
 */
class Resource extends _EntitySerialize
{

    private $_id;
    private $name;
    private $mimetype;
    private $file;
    private $size;

    public function __construct1($arrayValues)
    {
        $this->_id = $arrayValues['_id'];
        $this->name = $arrayValues['name'];
        $this->mimetype = $arrayValues['mimetype'];
        $this->file = $arrayValues['file'];
        $this->size = $arrayValues['size'];
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getMimetype()
    {
        return $this->mimetype;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     *
     * @param type $propsUnserialized Array de nombre de propiedades a excluir
     * @return type
     */
    public function serialize($propsUnserialized = null)
    {
        $properties = get_object_vars($this);
        if (!is_null($propsUnserialized)) {
            foreach ($propsUnserialized as $property) {
                unset($properties[$property]);
            }
        }
        parent::setObject($properties);
        return parent::serialize();
    }

}
