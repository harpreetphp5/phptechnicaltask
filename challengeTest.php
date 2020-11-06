<?php

use PHPUnit\Framework\TestCase;

include ('challenge.php');

class challengeTest extends TestCase
{
  public function setUp() : void { }
  public function tearDown() : void { }

  public function testfWithFLush() : void
  {
    // test to ensure that the object from an fsockopen is valid
    
    $cards = array(1,2,3,4,5);
    $suits = array("s","h","s","s","s");
    $this->assertEquals(
            'Straight',
            Challenge::f($cards,$suits)
        );
  }
  
  public function testfWithStraightFLush() : void {
    $cards = array(1,2,3,4,5);
    $suits = array("s","s","s","s","s");
    $this->assertEquals(
            'Straight Flush',
            Challenge::f($cards,$suits)
        );
  }
  
  public function testfWithNone() : void {
    $cards = array(1,2,3,6,5);
    $suits = array("s","s","h","s","s");
    $this->assertEquals(
            '',
            Challenge::f($cards,$suits)
        );
  }
}