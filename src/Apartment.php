<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App;
/**
 * Parent class for all type of apartment
 *
 * @author naveen.jaiswal
 */
abstract class Apartment {

    protected $width;
    protected $length;

    /**
     * Gets the area of the apartment
     */
    
    Abstract function getArea(): int;

    /**
     * Sets the width of the apartment
     * 
     * @param int $width
     */
    public function setWidth(int $width): void {
        $this->width = $width;
    }

    /**
     * gets the width of the apartment
     * @return int
     */
    public function getWidth(): int {
        return $this->width;
    }

    /**
     * Sets the length of the apartment 
     * 
     * @param int $length
     */
    public function setLength(int $length): void {
        $this->length = $length;
    }

    /**
     * Gets the length of the apartment 
     * 
     * @return int
     */
    public function getLength(): int {
        return $this->length;
    }

}
