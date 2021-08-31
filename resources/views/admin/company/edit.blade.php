@extends('layouts.app')

@section('title')
  CRM - Modifica azienda
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

    <h1>Modifica i dati dell'azienda</h1>
    <form action="{{route('admin.company.update', $firm->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group mt-5">
        <label for="name">Nome azienda</label>
        <input type="text" class="form-control" name="name" id="name" maxlength="50" placeholder="Inserisci il nome" value="{{$firm->name}}">
      </div>
      <div class="form-group mt-5">
        <label for="logo">Logo azienda</label>
        <input type="file" id="logo" name="logo">
        @if ($firm->logo != null)
          <img class="logo" src="{{asset('storage/' . $firm->logo)}}" alt="Logo">
        @endif
      </div>
      <div class="form-group mt-5">
        <label for="partita_iva">Partita IVA</label>
        <input type="text" class="form-control" name="partita_iva" id="partita_iva" minlength="11" maxlength="11" placeholder="Inserisci la partita IVA" value="{{$firm->partita_iva}}">
      </div>

      <button type="submit" class="btn btn-primary">Inserisci</button>
    </form>
  </div>
@endsection