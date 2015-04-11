<?php

namespace Grid\Parts;

defined('SECURITY') OR die('HACKING_ATTEMPT');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Column
 *
 * @author Arkadiusz Miszczyszyn
 */
class Column {
    
    /**
    * Name of column
    */
    protected $name;
    
    /**
    * Name of column
    */
    protected $label;
    
    /**
    * Type of column ex. text, option
    */
    protected $type;
    
    /**
    * Column components ex. sort, filter
    */
    protected $components;
    
    public function __construct(array $data) {
        if(count($data)>0){
            foreach($data as $key => $v){
                if(property_exists(get_class($this), $key)) $this->$key = $v;
            }
        }
    }
    
    public function getName() {
        return $this->name;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getType() {
        return $this->type;
    }

    public function getComponents() {
        return $this->components;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setComponents($components) {
        $this->components = $components;
    }
    
}