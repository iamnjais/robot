<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Robot;

/**
 * Interface for all battery types
 * 
 * @author naveen.jaiswal
 */
interface Battery {

    /**
     * get the life span of a battery for single use
     */
    public function getBatteryLife(): int;
}
