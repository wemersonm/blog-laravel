<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->funcao();
        
    }
    public function funcao()
    {
        dump("Pagamento iniciado ....");
    }
}
