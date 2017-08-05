<?php

/**
 * Description of UserController
 *
 * @author Oliva
 */
class UserController extends _PersistenceManager {

    public function __construct() {
        parent::__construct(TABLE_USER);
    }

    public function findById($id) {
        $key = array(
            COL_ID_USER => $id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new User($result);
        }
        return FALSE;
    }

    public function findAllByUsername($username) {
        $key = array(
            COL_USERNAME => $username
        );
        return parent::findByKey($key);
    }

    public function create(User $data) {
        $key = array(
            COL_USERNAME => $data->getUsername()
        );
        $find = parent::exists($key);
        if (is_null($find)) {
            $total = parent::count();
            $data->setIdUser($total + 1);
            $data->setSignupDate(time());
            $data->setFlagActive(TRUE);
            $data->setEmailActivation(FALSE);
            if (!is_null($data->getInfo())) {
                $data->setInfo((array)json_decode($data->getInfo()->serialize(), TRUE));
            }
            return parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
        }
        return FALSE;
    }

    public function update(User $data) {
        $key = array( COL_ID_USER => $data->getIdUser() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(User $data) {
        $key = array( COL_ID_USER => $data->getIdUser() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}
