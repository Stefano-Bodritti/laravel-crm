@extends('layouts.app')

@section('title')
  CRM - Lista Aziende
@endsection

@section('content')
  <div class="container company_index">
    <h1>Lista delle aziende</h1>
    <div class="row title">
      <div class="col-2">Logo</div>
      <div class="col-2">Nome</div>
      <div class="col-2">Partita IVA</div>
      <div class="col-4 offset-2">Azioni</div>
    </div>
    @foreach ($firm as $item)
      <div class="row">
        <div class="col-2"><img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" alt="Logo"></div>
        <div class="col-2">{{$item->name}}</div>
        <div class="col-2">{{$item->partita_iva}}</div>
        <div class="col-4 offset-2">
          <button type="button" class="btn btn-success">Visualizza</button>
          <button type="button" class="btn btn-primary">Modifica</button>
          <button type="button" class="btn btn-danger">Cancella</button>
        </div>
      </div>
    @endforeach
  </div>
@endsection