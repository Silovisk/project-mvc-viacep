<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function index()
    {
        return view('busca');
    }

    public function getAll(Request $request)
    {
        $dataForms = $request->all();

        return $dataForms;
    }

    public function searchZip(Request $request)
    {
        $cep = $request->input('InputZip');

        return Http::get("viacep.com.br/ws/$cep/json/")->json();
    }
}
