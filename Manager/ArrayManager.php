<?php

namespace Grid\Manager;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArrayManager
 *
 * @author Arkadiusz Miszczyszyn
 */
class ArrayManager implements ManagerInterface {

    protected $data = array();
    
    public function __construct(array $data) {
        $this->setData($data);
    }
    
    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }
    
}