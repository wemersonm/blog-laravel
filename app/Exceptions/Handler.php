<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    protected $dontReport = [
        ProductInvalidException::class,
    ];


    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (MyException $e){
            // return response()->view('errors.myExceptiom',[], 500);
           // return response()->json(['msg'=> "MyException"]);
        });


       /*  $this->reportable(function (MyException $e){
            dd("GG");
        });
        $this->reportable(function (ProductInvalidException $e){
            dd("product invalid");
        });
 */
        //ligado a todas as exceptions
        $this->reportable(function (Throwable $e) {
          /*   if ($e instanceof MyException) {
                 dd("GG");
            } */
        });
    }
}
