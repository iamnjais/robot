<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Robot;

/**
 * Class to handle program output on screen
 *
 * @author naveen.jaiswal
 */
class OutputHandler {

    /**
     * Prints message
     * 
     * @param type $message
     */
    public function out($message) {
        echo $message;
    }

    /**
     * Adds new line
     */
    public function newline() {
        $this->out("\n");
    }

    /**
     * Formats message and displays on screen
     * 
     * @param type $message
     */
    public function display($message) {
        $this->newline();
        $this->out($message);
        $this->newline();
        $this->newline();
    }

}
