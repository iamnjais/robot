<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Robot;

/**
 * Interface for all rechargeable type batteries
 * 
 * @author naveen.jaiswal
 */
interface RechargableBattery extends Battery {
    
    /**
     * Abstract function to charge battery
     */
    public function chargerBattery() : void;
}
