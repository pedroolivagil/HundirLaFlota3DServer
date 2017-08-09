<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: ResourceTest.php
 * Date: 09/08/2017 02:48
 */
define("UNIT_TEST", TRUE);
require_once('../config.php');

class ResourceTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
    }

    public function tearDown() {
    }

    public function testFindOk() {
        var_dump(_RESOURCE_PATH_);
        $resource = new Resource(array(
            '_id'         => NULL,
            'id_resource' => 1,
            'name'        => 'índice',
            'mimetype'    => 'image/gif',
            'size'        => 5.98,
            'file'        => ''
        ));
        $resource->selectResourceFile();
        var_dump($resource->serialize());
        $this->assertTrue($resource != NULL);
    }

    public function testCreateOk() {
    }

    public function testCreateFailOk() {
    }
}
