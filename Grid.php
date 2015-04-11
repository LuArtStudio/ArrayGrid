<?php

namespace Grid;

defined('SECURITY') OR die('HACKING_ATTEMPT');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Grid
 *
 * @author Arkadiusz Miszczyszyn
 */
class Grid {
    
    protected $header;
    
    protected $body;
    
    protected $data;
    
    protected $manager;
    
    public function getHeader() {
        return $this->header;
    }

    public function getBody() {
        return $this->body;
    }

    public function getData() {
        return $this->data;
    }

    public function getManager() {
        return $this->manager;
    }

    public function setHeader($header) {
        $this->header = $header;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setManager($manager) {
        $this->manager = $manager;
    }
    
    //Renderuje grid'a
    public function render(){
        if(is_null($this->manager)){
            throw new \Exception("Data manager was not found!");
        }
        
        $data = $this->getManager()->getData();
        
        if(!is_null($this->header)){
            $this->getHeader()->validateData($data);
            return sprintf('<table class="table table-striped"><thead><tr>%s</tr></thead><tbody>%s</tbody></table>', $this->renderHeader(), $this->renderBody());
        }
        
        return sprintf('<table class="table table-striped"><tbody>%s</tbody></table>', $this->renderBody());
    }
    
    protected function renderHeader(){
        $columns = $this->header->getColumns();
        $html = '';
        $col = '<th>%s</th>';
        foreach($columns as $column){
            $colBody = '<span class="col-name">'.$column->getLabel().'</span>';
            $components = $column->getComponents();
            if(!empty($components)){
                foreach($components as $component){
                    $component->render($colBody, $column);
                }
            }
            $html .= sprintf($col, $colBody);
        }
        return $html;
    }
    
    protected function renderBody(){
        $data = $this->manager->getData();
        $columns = $this->header->getColumns();
        $this->applyComponents($data, $columns);
        $rows = '';
        $col = '<td>%s</td>';
        $row = '<tr>%s</tr>';
        foreach($data as $dataVal){
            $cols = '';
            foreach($columns as $column){
                $body = '';
                if(isset($dataVal[$column->getName()])){
                    $body = $dataVal[$column->getName()];
                }
                $column->getType()->render($body, $column, $dataVal);
                $cols .= sprintf($col, $body);
            }
            $rows .= sprintf($row, $cols);
        }
        return $rows;
    }
    
    protected function applyComponents(&$data, $columns){
        foreach($columns as $column){
            $components = $column->getComponents();;
            if(!empty($components)){
                foreach($components as $component){
                    $component->apply($data, $column);
                }
            }
        }
    }
    
}