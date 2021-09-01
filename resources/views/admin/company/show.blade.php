@extends('layouts.app')

@section('title')
  CRM - Dettagli azienda
@endsection

@section('content')
  <div class="container company_show">
    <h1>{{$firm->name}}</h1>

    <div class="buttons">
      <a href="{{route('admin.company.edit', ['company' => $firm->id])}}"><button type="button" class="btn btn-info">Modifica</button></a>
      <form action="{{route('admin.company.destroy', ['company' => $firm->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>
      </form>
    </div>

    @if ($firm->logo != null)
      <div class="logo">
        <img src="{{asset('storage/' . $firm->logo)}}" alt="Logo">
      </div>
    @endif

    <h5 class="mb-3">Partita IVA: {{$firm->partita_iva}}</h5>

    @if (count($firm->worker) > 0)
      
    <h3 class="mb-1">Dipendenti associati all'azienda:</h3>
    <ul class="list">
      @foreach ($firm->worker as $employee)
        <li>{{$employee->name}} {{$employee->surname}}</li>
      @endforeach
    </ul>

    @else
      <h3>Questa azienda non ha dipendenti associati</h3>
    @endif
    <div class="back"><a href="{{route('admin.company.index')}}">Torna indietro</a></div>
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