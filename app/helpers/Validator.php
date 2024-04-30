<?php
namespace App\Helpers;

class Validator {

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public static function make($data)
    {
        return new Validator($data);
    }

    public function empty()
    {
        foreach($this->data as $key => $value){
            $value = trim($value);
            if($value == ''){
                throw new \Exception('empty_'.$key);
            }
            return $this;
        }
    }

    public function minStr($keys, $minLength)
    {
        foreach($keys as $key){
            if(strlen($this->data[$key]) < $minLength){
                throw new \Exception('min_'.$key);
            }
        }
        return $this;
    }
    public function maxStr($keys, $maxLength)
    {
        foreach($keys as $key){
            if(strlen($this->data[$key]) > $maxLength){
                throw new \Exception('max_'.$key);
            }
        }
        return $this;
    }
}