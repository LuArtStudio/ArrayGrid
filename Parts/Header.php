<?php

namespace Grid\Parts;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Header
 *
 * @author Arkadiusz Miszczyszyn
 */
class Header {
    
    /**
    * List of columns
    */
    protected $columns;
    
    public function getColumns() {
        return $this->columns;
    }
    
    public function addColumn(Column $column){
        $this->columns[] = $column;
        return $this;
    }
    
    public function validateData(array $data){
        if(count($data)>0 && count($this->columns)>0){
            foreach($data as $item){
                foreach($item as $prop => $val){
                    $ok = 0;
                    foreach($this->columns as $column){
                        if($prop == $column->getName()) $ok = 1;
                    }
                    if($ok == 0){
                        throw new \Exception("Column key '".$prop."' was not found!");
                    }
                }
            }
        }
    }
    
}