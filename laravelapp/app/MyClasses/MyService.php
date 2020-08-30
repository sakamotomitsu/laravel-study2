<?php
namespace App\MyClasses;


class MyService
{
    private $msg;
    private $data;

    public function __construct ()
    {
        $this->msg = 'Hello! This is MyService';
        $this->data = ['Hello', 'Welcome', 'Bye'];
    }

    public function say()
    {
        return $this->msg;
    }

    public function data()
    {
        return $this->data;
    }
}
