@extends('layouts.app')

@section('title')
  CRM - Dettagli dipendente
@endsection

@section('content')
  <div class="container company_show">
    <h1>{{$worker->surname}} {{$worker->name}}</h1>
    <div class="buttons">
      <a href="{{route('admin.worker.edit', ['worker' => $worker->id])}}"><button type="button" class="btn btn-info">Modifica</button></a>
      <form action="{{route('admin.worker.destroy', ['worker' => $worker->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>
      </form>
    </div>

    <h5 class="mb-3">Numero di telefono: {{$worker->phone}}</h5>
    <h5 class="mb-3">Indirizzo e-mail: {{$worker->email}}</h5>

    <h5 class="mb-3">Azienda di appartenenza: {{$firm->name}}</h5>

    <div class="back"><a href="{{route('admin.worker.index')}}">Torna indietro</a></div>
  </div>

  @if (session('message'))
    <div class="alert alert-success" style="position: fixed; bottom: 30px; right: 30px">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
@endsection