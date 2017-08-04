<?php

/**
 * Description of PersistenseManager
 *
 * @author Oliva
 */
class _PersistenceManager {

    protected $db;
    protected $collectionName;

    public function __construct($collectionName) {
        $this->db = DB::getInstance();
        $this->collectionName = $collectionName;
    }

    public function count() {
        $result = $this->db->count($this->collectionName);
        Tools::newLog('', $this->collectionName, 'COUNT', $this->isBadResult($result));
        return $result;
    }

    protected function find() {
        $result = $this->db->find($this->collectionName);
        Tools::newLog('', $this->collectionName, 'FIND', $this->isBadResult($result));
        return $result;
    }

    protected function findByKey($key) {
        $keys = array_keys($key);
        $val = $key[ $keys[ 0 ] ];
        $clave = array(
            $keys[ 0 ] => $val
        );
        $result = $this->db->findByKey($this->collectionName, $clave);
        Tools::newLog($key, $this->collectionName, 'FINDBYKEY', $this->isBadResult($result));
        return $result;
    }

    protected function findOneByKey($key) {
        $keys = array_keys($key);
        $val = $key[ $keys[ 0 ] ];
        $clave = array(
            $keys[ 0 ] => $val
        );
        $result = $this->db->findOneByKey($this->collectionName, $clave);
        Tools::newLog($key, $this->collectionName, 'FINDONE', $this->isBadResult($result), $result);
        return $result;
    }

    protected function exists($key) {
        $keys = array_keys($key);
        $val = $key[ $keys[ 0 ] ];
        $clave = array(
            $keys[ 0 ] => $val
        );
        $result = $this->db->findOneByKey($this->collectionName, $clave);
        Tools::newLog($key, $this->collectionName, 'EXISTS', ($this->isBadResult($result, TRUE)), $result);
        return $result;
    }

    protected function merge($key, $data) {
        $result = FALSE;
        if (!is_null($data)) {
            $data = json_decode($data, TRUE);
            $result = $this->db->merge($this->collectionName, $key, $data);
        }
        Tools::newLog($key, $this->collectionName, 'UPDATE', $this->isBadResult($result), NULL, $data);
        return $result;
    }

    protected function persist($data) {
        $result = FALSE;
        if (!is_null($data)) {
            $data = json_decode($data, TRUE);
            $result = $this->db->persist($this->collectionName, $data);
        }
        Tools::newLog('', $this->collectionName, 'CREATE', $this->isBadResult($result), NULL, $data);
        return $result;
    }

    protected function remove($key, $data) {
        $result = FALSE;
        if (!is_null($data)) {
            $data = json_decode($data, TRUE);
            $data[ COL_FLAG_ACTIVO ] = FALSE;
            $result = $this->db->remove($this->collectionName, $key, $data);
        }
        Tools::newLog($key, $this->collectionName, 'REMOVE', $this->isBadResult($result), COL_FLAG_ACTIVO . ' = true', COL_FLAG_ACTIVO . ' = false');
        return $result;
    }

    public function close() {
        Tools::newLog('', $this->collectionName, 'CLOSE_CONECTION', "OK");
        $this->db->close();
    }

    private function isBadResult($result, $inverted = FALSE) {
        $var = is_null($result) || empty($result);
        return (($inverted) ? ((!$var) ? 'FAIL' : 'OK') : (($var) ? 'FAIL' : 'OK'));
    }
}
