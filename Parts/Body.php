<?php

namespace Grid\Parts;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Body
 *
 * @author Arkadiusz Miszczyszyn
 */
class Body {
    
    /**
    * List of rows
    */
    protected $rows;
    
    public function getRows() {
        return $this->rows;
    }

    public function setRows($rows) {
        $this->rows = $rows;
    }
    
}