<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Interface for all robot type cleaner
 * 
 * @author naveen.jaiswal
 */
interface Cleaner extends Robot{
    
    /**
     * abstract method to implement floor cleaning
     * 
     * @param int $areaToClean
     * @param string $floorToClean
     */
    public function clean(int $areaToClean, string $floorToClean): bool;
}
