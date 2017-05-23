<?php

/**
 * Description of EntityManager
 *
 * @author Oliva
 */
class EntityManager implements BasicMethods {

    public function create($params, $table) {
        DB::GetInstance()->begin_trans();
        DB::GetInstance()->insert($params, $table);
        if (DB::GetInstance()->getProblems() == 0) {
            DB::GetInstance()->commit_trans();
            return TRUE;
        } else {
            DB::GetInstance()->rollBack_trans();
            return FALSE;
        }
    }

    public function update($table, $newValues, $params) {
        DB::GetInstance()->begin_trans();
        DB::GetInstance()->update($table, $newValues, $params);
        if (DB::GetInstance()->getProblems() == 0) {
            DB::GetInstance()->commit_trans();
            return TRUE;
        } else {
            DB::GetInstance()->rollBack_trans();
            return FALSE;
        }
    }

    public function delete($table, $newValues, $params) {
        DB::GetInstance()->begin_trans();
        DB::GetInstance()->deleteLogic($table, $newValues, $params);
        if (DB::GetInstance()->getProblems() == 0) {
            DB::GetInstance()->commit_trans();
            return TRUE;
        } else {
            DB::GetInstance()->rollBack_trans();
            return FALSE;
        }
    }

    /**
     * 
     * @param type $field nombre del campo a 
     * @param type $paramValue
     * @param type $table
     */
    public function findByParam($namedQuery, $params) {
        if(!defined($namedQuery)){
            return null;
        }
        return DB::GetInstance()->preparedQuery($namedQuery, $params);
    }

    public function findById($namedQuery, $params) {
        if(!defined($namedQuery)){
            return null;
        }
        return DB::GetInstance()->preparedQuery($namedQuery, $params);
    }

}
