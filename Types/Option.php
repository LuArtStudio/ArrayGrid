<?php

namespace Grid\Types;

defined('SECURITY') OR die('HACKING_ATTEMPT');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Grid\Parts\Column;

/**
 * Description of Grid
 *
 * @author Arkadiusz Miszczyszyn
 */
class Option implements TypesInterface {
    
    protected $options = array();
    
    public function __construct(array $options) {
        if(count($options)>0){
            foreach($options as $option){
                $this->addOption($option);
            }
        }
    }
    
    public function getOptions(){
        return $this->options;
    }
    
    protected function addOption(\Grid\Elements\Option $option){
        $this->options[] = $option;
    }
    
    public function render(&$html, Column $column, array &$rowData){
        $dropdownElement = '';
        if(!empty($this->options)){
            foreach($this->options as $option){
                $query = '';
                if($option->getParams() != null){
                    foreach($option->getParams() as $key => $param){
                        preg_match('/^%(?P<prop>\w+)/', $param, $matches);
                        if(isset($matches['prop']) && $matches['prop'] != '' && isset($rowData[$matches['prop']])){
                            $query[] = $key.'='.$rowData[$matches['prop']];
                        }
                    }
                }
                $dropdownElement .= '<li><a href="'.$option->getUrl().(!empty($query)?'?'.implode("&",$query):'').'" title="">'.$option->getName().'</a></li>';
            }
        }
        $dropdownMenu = sprintf('<ul class="dropdown-menu" role="menu">%s</ul>', $dropdownElement);
        $dropdownToggle = sprintf('<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">'.$column->getLabel().' <span class="caret"></span></a>%s', $dropdownMenu);
        $html = sprintf('<div role="presentation" class="dropdown">%s</div>', $dropdownToggle);
    }
    
}