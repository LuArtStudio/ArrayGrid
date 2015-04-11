<?php

namespace Grid\Types;

use Grid\Parts\Column;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Unique
 *
 * @author Arkadiusz Miszczyszyn
 */
class Unique implements TypesInterface {
    public function render(&$html, Column $column, array &$rowData){
        try {
            $rowData[$column->getName()] = intval($rowData[$column->getName()]);
        } catch (\Exception $e){
            
        }
    }
}