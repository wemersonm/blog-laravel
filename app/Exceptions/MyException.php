<?php

namespace App\Exceptions;

use Exception;

class MyException extends Exception
{

    public function report()
    {
        //dd("Passou aqui");
    }
    public function render()
    {
        // return response()->view('errors.myExceptiom', [], 500);
           return response()->json(['msg'=> "MyException"]);
    
    }
}
