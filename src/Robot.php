<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Interface for all robot types
 * 
 * @author naveen.jaiswal
 */
interface Robot {
    
    /**
     * abstract function to charge battery
     */
    public function chargeBattery() : void;
}
