<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class Validator{

    public $isValid;
    protected $valueForValidate;

    public function __construct($valueForValidate){
        $this->valueForValidate = $valueForValidate;
    }

    public function validateEan13(){
        $this->isValid = false;
        $data = $this->dataValidateEan13($this->valueForValidate);
        if (isset($data['checksum']) && isset($data['originalcheck'])) {
            if ($data['checksum'] == $data['originalcheck']) {
                $this->isValid = true;
            }
        }
    }

    protected function dataValidateEan13($digits){

        $originalcheck = false;
        if ( strlen($digits) == 13 ) {
            $originalcheck = substr($digits, -1);
            $digits = substr($digits, 0, -1);
        } elseif ( strlen($digits) != 12 ) {
            // Invalid EAN13 barcode
            return false;
        }

        // Add even numbers together
        $even = $digits[1] + $digits[3] + $digits[5] + $digits[7] + $digits[9] + $digits[11];
        // Multiply this result by 3
        $even = $even * 3;

        // Add odd numbers together
        $odd = $digits[0] + $digits[2] + $digits[4] + $digits[6] + $digits[8] + $digits[10];

        // Add two totals together
        $total = $even + $odd;

        // Calculate the checksum
        // Divide total by 10 and store the remainder
        $checksum = $total % 10;
        // If result is not 0 then take away 10
        if($checksum != 0){
            $checksum = 10 - $checksum;
        }

        // Return results.
        if ( $originalcheck !== false ) {
            return array('barcode'=>$digits, 'checksum'=>$checksum, 'originalcheck'=>$originalcheck);
        } else {
            return array('barcode'=>$digits, 'checksum'=>$checksum);
        }
    }

}