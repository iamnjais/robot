<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * This is a Hard Floor apartment class
 *
 *
 * @author naveen.jaiswal
 */
class HardFloor extends Apartment{
    
    const DEFAULT_LENGTH = 10;
    const DEFAULT_WIDTH = 7;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setLength(self::DEFAULT_LENGTH);
        $this->setWidth(self::DEFAULT_WIDTH);
    }
    
    /**
     * Gets the area of the hard floor
     * 
     * @return int
     */
    public function getArea() : int{
        return $this->length * $this->width;
    }
}
