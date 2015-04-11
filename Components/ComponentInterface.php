<?php

namespace Grid\Components;

use Grid\Parts\Column;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComponentInterface
 *
 * @author Arkadiusz Miszczyszyn
 */
interface ComponentInterface {
    
    public function render(&$html, Column $column);
    
    public function apply(&$data, Column $column);
    
}