<?php

namespace App\Http\Controllers\Admin;

use App\Firm;
use App\Worker;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FirmController extends Controller
{
    protected $validation = [
        'name' => 'required|string|max:50|unique:App\Firm,name',
        'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048',
        'partita_iva' => 'required|numeric|digits:11|unique:App\Firm,partita_iva'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firm = Firm::paginate(10);

        return view('admin.company.index', compact('firm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione dei dati inseriti
        $validation = $this->validation;
        $request->validate($validation);

        // prendo tutti i dati da salvare
        $data = $request->all();

        // upload immagine
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('images', $data['logo']);
        }

        // creo variabile e salvo nel DB
        $newFirm = Firm::create($data);

        return redirect()->route('admin.company.index')->with('message', 'La nuova azienda è stata inserita correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $firm = Firm::where('id', $id)->first();

        return view('admin.company.show', compact('firm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $firm = Firm::where('id', $id)->first();

        return view('admin.company.edit', compact('firm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firm $company)
    {

        // validazione dei dati inseriti
        $validation2 = [
            'name' => 'required|string|max:50|unique:App\Firm,name,'.$company->id,
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048',
            'partita_iva' => 'required|numeric|digits:11|unique:App\Firm,partita_iva,'.$company->id
        ];
        $request->validate($validation2);

        // prendo tutti i dati da salvare
        $data = $request->all();

        // upload immagine
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('images', $data['logo']);
        }

        // update
        $company->update($data);
        
        return redirect()->route('admin.company.index')->with('message', 'L\'azienda è stata modificata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $firm = Firm::where('id', $id)->first();

        // se l'azienda ha dei dipendenti associati, non cancellare e avvisa
        if (count($firm->worker) > 0) {
            return redirect()->back()->with('message', 'Non puoi eliminare un\'azienda se ha dei dipendenti associati');
        }

        // altrimenti, cancella
        $firm->delete();
        return redirect()->route('admin.company.index')->with('message', 'L\'azienda è stata eliminata');
    }
}
