<?php

namespace App\Http\Controllers\Admin;

use App\Firm;
use App\Http\Controllers\Controller;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::paginate(10);
        $firms = Firm::all();

        return view('admin.worker.index', compact('workers', 'firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firms = Firm::all();
        return view('admin.worker.create', compact('firms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione dati inseriti
        $validation = [
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'phone' => 'required|string|max:30|unique:App\Worker,phone', Rule::unique('workers'),
            'email' => 'required|string|max:50|unique:App\Worker,email', Rule::unique('workers')
        ];
        $request->validate($validation);

        // prendo i dati
        $data = $request->all();

        // salvo
        $newWorker = Worker::create($data);

        return redirect()->route('admin.worker.index')->with('message', 'Il nuovo dipendente è stato aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $worker = Worker::where('id', $id)->first();

        $firm = Firm::where('id', $worker->firm_id)->first();

        return view('admin.worker.show', compact('worker', 'firm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $firms = Firm::all();
        $worker = Worker::where('id', $id)->first();

        return view('admin.worker.edit', compact('worker', 'firms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        // validazione dati inseriti
        $validation = [
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'phone' => 'required|string|max:30', Rule::unique('workers')->ignore($worker->id),
            'email' => 'required|string|max:50', Rule::unique('workers')->ignore($worker->id)
        ];

        $request->validate($validation);

        // prendo i dati
        $data = $request->all();

        // update
        $worker->update($data);

        return redirect()->route('admin.worker.index')->with('message', 'Il dipendente è stato modificato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::where('id', $id)->first();

        $worker->delete();

        return redirect()->route('admin.worker.index')->with('message', 'Il dipendente è stato eliminato');
    }
}
