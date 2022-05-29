<?php

class Field
{
    public $name;
    public $errorMessages = [];
    public $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function addError($message)
    {
        array_push($this->errorMessages, $message);
    }
}