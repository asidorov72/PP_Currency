<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'src/PP_Currency/Transporter/transporter.ini.php';
require_once 'src/PP_Currency/Forms/forms.ini.php';
require_once 'src/PP_Currency/Currency/currency.ini.php';

use \PP_Currency\Transporter\Transporter as Transporter;
use \PP_Currency\Forms\Forms as Forms;
use \PP_Currency\Currency\Currency as Currency;

$currencyJson = new Transporter('currency.json');
$optionsObj   = $currencyJson->getJson();
$optionsArr   = (array) $optionsObj;
$frm          = new Forms();

$res         = new Currency($frm->getValue('sum'), $frm->getValue('currencyFrom'), $frm->getValue('currencyTo'), $optionsArr);
$rate        = $res->getRate();



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Poddy Power Currency</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style>
            fieldset div {
                margin: 5px;
            }
            fieldset label {
                margin-right: 5px;
            }
            #currencyFrom,#currencyTo {
                float: left;
            }
            #sum, #sendBtn, .rate {
                clear:both;
            }
            .rate {
                display: table;
                margin: 10px 0 10px 5px;
                background: white;
                padding: 10px;
                color: violet; 
                font-weight:bold;
                font-size: 6em;
            }
        </style>
    </head>
    <body>
        <form name="currencyForm" method="post" action="">
            <fieldset>
                <legend>Currency converter</legend>
                <div id="sum"><?php echo $frm->buildInput('text', 'sum', $frm->getValue('sum')); ?></div>
                <div id="currencyFrom"><?php echo $frm->buildSelectList('currencyFrom', $optionsArr, 'code', 'name', 'From:'); ?></div>
                <div id="currencyTo"><?php echo $frm->buildSelectList('currencyTo', $optionsArr, 'code', 'name', 'To:');   ?></div>
                <div class="rate"><?php echo $rate; ?></div>
                <div id="sendBtn"><?php echo $frm->buildInput('submit', 'submit', 'Send'); ?></div>
            </fieldset>
        </form>
    </body>
</html>

