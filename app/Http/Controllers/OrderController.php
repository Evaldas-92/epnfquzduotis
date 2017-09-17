<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Input;
use Validator;
use App\Uzsakymas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {
        $uzsakymai = Uzsakymas::all();
        return view('uzsakymai', compact('uzsakymai'));
    }

    public function create()
    {
        //
    }

    public function store()
    {
        $validator = Validator::make(Input::all(), [
            'vardas' => 'required',
            'pavarde' => 'required',
            'adresas' => 'required',
            'telefonas' => 'required',
            'elpastas' => 'required',
            'kiekis' => 'required',
            'pristatymas' => 'required',
            'suma' => 'numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $uzsakymas = new Uzsakymas;
        $uzsakymas->vardas = Input::get('vardas');
        $uzsakymas->pavarde = Input::get('pavarde');
        $uzsakymas->telefonas = Input::get('telefonas');
        $uzsakymas->miestas = Input::get('miestas');
        $uzsakymas->adresas = Input::get('adresas');
        $uzsakymas->elpastas = Input::get('elpastas');
        $uzsakymas->kiekis = Input::get('kiekis');
        $uzsakymas->pristatymas = Input::get('pristatymas');
        $uzsakymas->suma = Input::get('suma');
        $uzsakymas->save();

        Input::session()->flash('alert-success', 'Netrukus gausite el. laišką su mokėjimo nuorodomis.');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $uzsakymas = Uzsakymas::find($id);
        return view('edit', compact('uzsakymas'));
    }

    public function update($id)
    {
        $validator = Validator::make(Input::all(), [
            'vardas' => 'required',
            'pavarde' => 'required',
            'adresas' => 'required',
            'telefonas' => 'required',
            'elpastas' => 'required',
            'kiekis' => 'required',
            'pristatymas' => 'required',
            'suma' => 'numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $uzsakymas = Uzsakymas::find($id);
        $uzsakymas->vardas = Input::get('vardas');
        $uzsakymas->pavarde = Input::get('pavarde');
        $uzsakymas->telefonas = Input::get('telefonas');
        $uzsakymas->miestas = Input::get('miestas');
        $uzsakymas->adresas = Input::get('adresas');
        $uzsakymas->elpastas = Input::get('elpastas');
        $uzsakymas->kiekis = Input::get('kiekis');
        $uzsakymas->suma = Input::get('suma');
        $uzsakymas->pristatymas = Input::get('pristatymas');
        $uzsakymas->created_at = Input::get('data');
        $uzsakymas->updated_at = Input::get('atnaujinta');
        $uzsakymas->atnaujino = Auth::user()->name;

        $uzsakymas->save();

        Input::session()->flash('alert-success', 'Užsakymas sėkmingai atnaujintas.');
        return redirect("/uzsakymai");
    }

    public function destroy($id)
    {
        $uzsakymas = Uzsakymas::find($id);
        $uzsakymas->delete();
        Input::session()->flash('alert-success', 'Užsakymas pašalintas.');
        return redirect()->back();
    }
}
