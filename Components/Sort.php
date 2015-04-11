<?php

namespace Grid\Components;

use Grid\Manager\AbstractComponent;
use Grid\Parts\Column;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sort
 *
 * @author Arkadiusz Miszczyszyn
 */
class Sort implements ComponentInterface {
    
    protected $prefix = 'sort';
    
    protected $sortOptions = array(
        'up', 'down', ''
    );
    
    public function render(&$html, Column $column){
        
        $get = $_GET;
        
        $sortName = $this->prefix.'-'.$column->getName();
        $sortValue = null;
        if(!empty($get)){
            foreach($get as $key => $val){
                if(stripos($key, $this->prefix) !== false){
                    if($key == $sortName) {
                        $sortValue = $val;
                    }
                }
                unset($get[$key]);
            }
        } 
        
        if($sortValue == null){
            $sortValue = 0;
        } else {
            $sortValue = ($sortValue + 1)%count($this->sortOptions);
        }        
        
        $get[$this->prefix.'-'.$column->getName()] = $sortValue;
        
        $href = array();
        foreach($get as $key => $val){
            $href[] = $key.'='.$val;
        }
        
        $html = sprintf('<a href="?'.implode('&', $href).'" title="">%s</a>', $html);
    }
    
    public function apply(&$data, Column $column) {
        
        $get = $_GET;
        
        $sortName = $this->prefix.'-'.$column->getName();
        $sortValue = null;
        if(!empty($get)){
            foreach($get as $key => $val){
                if(stripos($key, $this->prefix) !== false){
                    if($key == $sortName) {
                        $sortValue = $val;
                    }
                }
                unset($get[$key]);
            }
        } 
        
        if($sortValue != null){
            $sortedData = array();
            switch($this->sortOptions[$sortValue]){
                case 'up':
                    usort($data, function($a, $b) use($column) {
                        return $b[$column->getName()] - $a[$column->getName()];
                    });
                    break;
                case 'down':
                    usort($data, function($a, $b) use($column) {
                        return $a[$column->getName()] - $b[$column->getName()];
                    });
                    break;
                default:
                    
                    break;
            }
        }
        
    }
    
}