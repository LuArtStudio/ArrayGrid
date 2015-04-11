<?php

namespace Grid\Elements;

use Grid\Element;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Option
 *
 * @author Arkadiusz Miszczyszyn
 */
class Option extends Element {
    
    protected $name;
    
    protected $url;
    
    protected $params;
    
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

    public function getUrl() {
        return $this->url;
    }

    public function getParams() {
        return $this->params;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setParams(array $params) {
        $this->params = $params;
    }
    
}