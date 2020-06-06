<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPUnit\Framework\TestCase;
/**
 * Test class for Robot
 *
 * @author naveen.jaiswal
 */
class RobotTest  extends TestCase{
    
    /**
     * 
     */
    public function testClean()
    {
        $area = $GLOBALS['area'];
        $floor = $GLOBALS['floor'];
        $robot = new \App\RoboOne();
        $response = $robot->clean($area, $floor);
        $this->assertTrue($response);
    }
}
