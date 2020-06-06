<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Robot;

/**
 * Class to represent a type of battery called BatteryTypeOne
 *
 * @author naveen.jaiswal
 */
class BatteryTypeOne implements RechargableBattery {

    /**
     *
     * @var int 
     */
    private $batteryStrength;
    /**
     *
     * @var type 
     */
    private $batteryLife;

    const TIME_TO_FULL_CHARGE = 30; //seconds
    const MAX_BATTERY_STRENGTH = 100;
    const SINGLE_USE_BATTERY_LIFE = 60;//seconds


    /**
     * constructor
     */
    public function __construct() {
        $this->batteryStrength = self::MAX_BATTERY_STRENGTH;
        $this->batteryLife = self::SINGLE_USE_BATTERY_LIFE;
    }

    /**
     * Charges battery
     */
    public function chargerBattery(): void {
        sleep($this->getTimeToFullCharge());
        $this->setBatteryStrength(self::MAX_BATTERY_STRENGTH);
    }

    /**
     * sets battery strength
     * @param int $power
     */
    public function setBatteryStrength(int $power): void {
        $this->batteryStrength = $power <= self::MAX_BATTERY_STRENGTH ? $power : self::MAX_BATTERY_STRENGTH;
    }

    /**
     * gets battery strength
     * 
     * @return int
     */
    public function getBatteryStrength(): int {
        return $this->batteryStrength;
    }

    /**
     * Gets battery life in current use
     * 
     * @return int
     */
    public function getBatteryLife(): int {
        return $this->batteryLife;
    }

    /**
     * Gets time to full charge battery
     * 
     * @return int
     */
    public function getTimeToFullCharge(): int {
        return self::TIME_TO_FULL_CHARGE;
    }
    
    /**
     * Updates battery status when in use
     * 
     * @param int $runningDuration
     */
    public function updateBatteryStrength(int $runningDuration){
        if($runningDuration == 1){
            $this->setBatteryStrength($this->getBatteryStrength() - ($runningDuration * round(self::MAX_BATTERY_STRENGTH/$this->getBatteryLife())));
        }
    }

}
