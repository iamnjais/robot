<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of Robot
 *
 * @author naveen.jaiswal
 */
class RoboOne implements Cleaner {

    /**
     *
     * @var int 
     */
    protected $endTime;

    /**
     *
     * @var OutputHandler
     */
    protected $outputHandler;

    /**
     *
     * @var Battery 
     */
    protected $powerSource;

    /**
     * Constructor
     */
    public function __construct() {
        $this->outputHandler = new \Robot\OutputHandler();
        $this->powerSource = new \Robot\BatteryTypeOne();
    }

    /**
     * Gets output handler
     * 
     * @return OutputHandler
     */
    public function getOutputHandler() {
        return $this->outputHandler;
    }

    /**
     * Cleans the floor based on the input provided.
     * 
     * @param int $areaToClean
     * @param string $floorToClean
     * @return bool
     */
    public function clean(int $areaToClean = 0, string $floorToClean = ''): bool {
        $interval = 1;
        $success = true;
        switch ($floorToClean) {
            case 'carpet':
                $floor = new CarpetFloor();
                $area = $floor->getArea();
                $estimatedTimeToRun = ($areaToClean == 0 || $areaToClean > $area) ? ($area * 2) : $areaToClean * 2;
                $interval = $interval * 2;
                break;
            case 'hard':
                $floor = new HardFloor();
                $area = $floor->getArea();
                $estimatedTimeToRun = ($areaToClean == 0 || $areaToClean > $area) ? $area : $areaToClean;
                break;

            default:
                $this->outputHandler->display("No floor to clean");
                
                return true;
        }
        try {
            $this->startCleaning($estimatedTimeToRun, $interval);
            $this->outputHandler->display("Cleaning complete.");
        } catch (\Exception $ex) {
            $success = false;
            $this->outputHandler->display("Cleaning could not complete. " . $ex->getMessage());
        }
        
        return $success;
    }

    /**
     * Function to start cleaning operation
     * 
     * @param int $estimatedTimeToRun
     * @param int $interval
     */
    private function startCleaning(int $estimatedTimeToRun, int $interval): void {

        $currentTime = $startTime = $time = time();
        $this->endTime = $currentTime + $estimatedTimeToRun;
        $counter = 0;
        while ($currentTime <= $this->endTime) {

            if (($currentTime - $startTime) == $interval) {

                $this->getOutputHandler()->display("Cleaning in progress. Area cleaned " . ++$counter . " Meter square.");
                $this->powerSource->updateBatteryStrength($currentTime - $startTime);
                $startTime = $currentTime;
            }

            if (($currentTime - $time) == $this->powerSource->getBatteryLife()) {
                $this->getOutputHandler()->display("Battery Low!!!");
                $this->getOutputHandler()->display("Charging battery.");

                $this->chargeBattery();
                $this->getOutputHandler()->display("Battery full charged. Battery Level " . $this->powerSource->getBatteryStrength() . "%");
                $time = $startTime = time();
            }
            $currentTime = time();
        }
    }

    /**
     * 
     * @return int
     */
    public function chargeBattery(): void {
        $this->powerSource->chargerBattery();
        $this->endTime = $this->endTime + $this->powerSource->getTimeToFullCharge();
    }

}
