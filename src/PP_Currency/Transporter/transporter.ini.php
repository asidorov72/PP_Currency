<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PP_Currency\Transporter;

class Transporter {
    protected $url;
    protected $resposne;
    
    public function __construct($url) {
        $this->url = $url;
    }
    
    private function setTransaction() {
        $json = file_get_contents($this->url);
        $this->response = json_decode($json);
    }
    
    public function getJson () {
        $this->setTransaction();
        return $this->response;
    }
}

