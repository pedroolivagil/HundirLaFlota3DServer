<?php

/**
 *
 * @author Oliva
 */
interface BasicMethods {

    public function create($params, $table);

    public function delete($table, $newValues, $params);

    public function update($table, $newValues, $params);

    public function findByParam($namedQuery, $params);

    public function findById($id, $table);
}
