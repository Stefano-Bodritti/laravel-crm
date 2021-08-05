@extends('layouts.app')

@section('title')
  CRM - Dettagli azienda
@endsection

@section('content')
  <div class="container company_show">
    <h1>{{$firm->name}}</h1>

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
@endsection