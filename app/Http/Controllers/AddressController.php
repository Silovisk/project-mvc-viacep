<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\SalvarRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function index()
    {
        $adresses = Address::all();
        return view('listagem')->with([
            'adresses' => $adresses,
        ]);
    }

    public function adicionar()
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

        $response = Http::get("viacep.com.br/ws/$cep/json/")->json();

        return view('adicionar')->with(
            [
                'zip' => $response['cep'],
                'address' => $response['logradouro'],
                'district' => $response['bairro'],
                'city' => $response['localidade'],
                'state' => $response['uf'],
            ]
        );
    }

    public function salvar(SalvarRequest $request)
    {
        $address = Address::where('zip', $request->input('InputZip'))->first();

        if (!$address) {
            Address::create(
                [
                    'zip' => $request->input('InputZip'),
                    'address' => $request->input('InputAddress'),
                    'number' => $request->input('InputNumber'),
                    'district' => $request->input('InputDistrict'),
                    'city' => $request->input('InputCity'),
                    'state' => $request->input('InputState'),
                ]
            );

            return redirect('/')->withSuccess('Successfully registered address');
        }
        return redirect('/')->withError('Address already registered');
    }
}
