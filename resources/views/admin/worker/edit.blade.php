@extends('layouts.app')

@section('title')
  CRM - Modifica dipendente
@endsection

@section('content')
  <div class="container create">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <h1>Modifica i dati del dipendente</h1>
    <form action="{{route('admin.worker.update', ['worker' => $worker->id])}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group mt-5">
        <label for="name">Nome dipendente</label>
        <input type="text" class="form-control" name="name" id="name" maxlength="50" placeholder="Inserisci il nome" value="{{$worker->name}}">
      </div>
      <div class="form-group mt-5">
        <label for="surname">Cognome dipendente</label>
        <input type="text" class="form-control" name="surname" id="surname" maxlength="50" placeholder="Inserisci il cognome" value="{{$worker->surname}}">
      </div>
      <div class="form-group mt-5">
        <label for="firm_id">Seleziona l'azienda di appartenenza</label>
        <select required class="form-control" name="firm_id" id="firm_id">
          @foreach ($firms as $firm)
            <option value="{{$firm->id}}" {{ $firm->id == $worker->firm_id ? 'selected' : '' }}>{{$firm->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mt-5">
        <label for="phone">Numero di telefono</label>
        <input type="text" class="form-control" name="phone" id="phone" maxlength="30" placeholder="Inserisci il numero di telefono" value="{{$worker->phone}}">
      </div>
      <div class="form-group mt-5">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Inserisci l'indirizzo email'" value="{{$worker->email}}">
      </div>

      <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
  </div>
@endsection