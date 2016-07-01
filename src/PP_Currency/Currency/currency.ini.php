<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PP_Currency\Currency;

class Currency {
    protected $codeFrom;
    protected $codeTo;
    protected $sum;
    public $rate;
    protected $options;
    
    public function __construct($sum, $codeFrom, $codeTo, $options) {
        $this->sum      = $sum;
        $this->codeFrom = $codeFrom;
        $this->codeTo   = $codeTo;
        $this->options  = $options;
    }
    
    public function getRate () {
        $this->rate = "";
        
        if (isset($this->options[$this->codeFrom])) {
            $codesToArr = (array) $this->options[$this->codeFrom]->value;
            $codeTo = $codesToArr[strtolower($this->codeTo)];
            $this->rate = round(($this->sum * $codeTo), 2);
        }
        return $this->rate;
    }
}