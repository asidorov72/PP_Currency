<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PP_Currency\Forms;
//use \PP_Currency\Transporter\Transporter as Transporter;

class Forms {
    
    public function __construct() {
    }
    
    public function buildSelectList($name, $options, $fieldValue, $fieldText, $label = null) {
        $selectList = "";
        
        $selectList .= (!empty($label)) ? '<label for="'.$name.'">'.$label.'</label>' : "";
        
        $selectList .= '<select name="'.$name.'">';
                foreach($options as $option) {
                    $option = (array) $option;
                    $selectList .= '<option ';
                    $selectList .= (strtolower($option[$fieldValue]) === strtolower($this->getValue($name))) ? 'selected' : '';
                    $selectList .= ' value="'.$option[$fieldValue].'">'.$option[$fieldText].'</option>';
                }
        $selectList .= '/<select>';
        return $selectList;
    }
    
    public function buildInput($type, $name, $value = null) {
        return '<input type="'.$type.'" name="'.$name.'" value="'.$value.'">';
    }
    
    public function getValue($name, $method = null) {
        if (!isset($_REQUEST) || !count($_REQUEST)) return "";
        
        switch ($method) {
            case 'post':
                return $_POST[$name];
                break;
            case 'get':
                return $_GET[$name];
                break;
            default:
                return $_REQUEST[$name];
        }
    }
}