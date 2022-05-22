<?php

namespace App\Http\Controllers;

use App\Traits\EncryptTrait;
use Illuminate\Http\Request;

class EncryptController extends Controller
{
    use EncryptTrait;

    public function index(Request $request)
    {
        dd($request->all('name'));
        return $this->decrypt($request->get('name'), env('PASSWORD_ENCRYPT'));
    }
}
