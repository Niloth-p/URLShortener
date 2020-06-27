<?php
use PHPUnit\Framework\TestCase;
require_once('../src/Shortener.php');

$serverName = "localhost";

//NOT WORKING YET

class RemoteConnectTest extends PHPUnit_Framework_TestCase
{
  public function setUp(){ }
  public function tearDown(){ }

  public function testConnectionIsValid()
  {
    // test to ensure that the object from an fsockopen is valid
    $connObj = new RemoteConnect();
    $this->assertTrue($connObj->connectToServer($serverName) !== false);
  }
}

function testIsRightObject() {
  $connObj = new RemoteConnect();
  $returnedObject = $connObj->returnSampleObject();
  $this->assertType('remoteConnect', $returnedObject);
}

?>


