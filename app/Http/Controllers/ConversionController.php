<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function CargueConDatos(Request $request){


        return view('Conversion.CargueConDatos');

     }

    public function index(Request $request)
    {
        $endpoint = 'latest';
        $access_key = '8d05dec33ab742386b3d4420df92ef1b';

        // Initialize CURL:
        $ch = curl_init('https://api.exchangeratesapi.io/v1/'.$endpoint.'?access_key='.$access_key.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response:
        $exchangeRates = json_decode($json, true);
        //Se verifica el Json Decode para verificar el contenido del API
        $valorescambio = array_values($exchangeRates['rates']);
        $nombresdecambio = array_keys($exchangeRates['rates']);
        //Arreglo de TEsting
        $conversion = Conversion::orderBy('id', 'desc')->get();

        // Consulta para solamente para traer los datos de un solo usuario del Auth Logueado por el Token
        // $conversion = Conversion::where('user_id', $parametrodelauthid)
        //              ->orderBy('id', 'desc')
        //              ->get();
        $conversion = Conversion::orderBy('id', 'desc')->get();
        return view('Conversion.index',compact('nombresdecambio','valorescambio','conversion'));
    
       
      //return view('Conversion.index1',compact('conversion'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $conversion = new Conversion();
        $conversion->Moneda_Origen = $request->Moneda_Origen_Texto;
        $conversion->Moneda_Destino = $request->Moneda_Destino_Texto;
        $conversion->Monto_Original = $request->Monto_Original;
        $convertirabaseeuro = $request->Monto_Original / $request->Moneda_Origen;
        $valordestino = $convertirabaseeuro * $request->Moneda_Destino;
        $conversion->Monto_Destino = $valordestino;
        $conversion->user_id = $request->user_id;
        $conversion->save();

        return redirect("/conversion");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}


// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use GuzzleHttp\Client;

// class CurrencyController extends Controller
// {
//     public function showForm()
//     {
//         return view('currency.form');
//     }

//     public function getExchangeRate(Request $request)
//     {
//         $client = new Client();
//         $response = $client->request('GET', 'https://api.exchangeratesapi.io/latest', [
//             'query' => [
//                 'base' => $request->input('base_currency'),
//                 'symbols' => $request->input('target_currency')
//             ]
//         ]);

//         $data = json_decode($response->getBody(), true);
//         $rate = $data['rates'][$request->input('target_currency')];

//         return view('currency.result', compact('rate'));
//     }
// }
