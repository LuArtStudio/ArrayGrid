<?php

namespace Grid\Manager;

defined('SECURITY') OR die('HACKING_ATTEMPT');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractManager
 *
 * @author Arkadiusz Miszczyszyn
 */
interface ManagerInterface {
    
    public function getData();

    public function setData($data);
    
}