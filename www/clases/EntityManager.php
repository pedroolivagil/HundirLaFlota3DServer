<?php

/**
 * Description of EntityManager
 *
 * @author Oliva
 */
class EntityManager implements BasicMethods {

    public function create($params, $table) {
        DB::begin_trans();
        DB::insert($params, $table);
        if (DB::getProblems() == 0) {
            DB::commit_trans();
            return TRUE;
        } else {
            DB::rollBack_trans();
            return FALSE;
        }
    }

    public function update($table, $newValues, $params) {
        DB::begin_trans();
        DB::update($table, $newValues, $params);
        if (DB::getProblems() == 0) {
            DB::commit_trans();
            return TRUE;
        } else {
            DB::rollBack_trans();
            return FALSE;
        }
    }

    public function delete($table, $newValues, $params) {
        DB::begin_trans();
        DB::deleteLogic($table, $newValues, $params);
        if (DB::getProblems() == 0) {
            DB::commit_trans();
            return TRUE;
        } else {
            DB::rollBack_trans();
            return FALSE;
        }
    }

    public static function findById($id, $table) {
        
    }

}
