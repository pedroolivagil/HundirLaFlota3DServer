<?php

/**
 * Created by PhpStorm.
 * User: Oliva
 * Date: 05/08/2017
 * Time: 20:04
 */
class ResourceTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
    }

    public function tearDown() {
    }

    public function testCreateOk() {
        $resource = new Resource(array(
            '_id'         => NULL,
            'id_resource' => 1,
            'name'        => 'índice',
            'mimetype'    => 'image/gif',
            'size'        => 5.98,
            'file'        => ''
        ));
    }

    public function testCreateFailOk() {
    }
}
