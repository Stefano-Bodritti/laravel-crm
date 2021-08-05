@extends('layouts.app')

@section('title')
  CRM - Dettagli azienda
@endsection

@section('content')
  <div class="container company_show">
    <h1>{{$firm->name}}</h1>

    <div class="back"><a href="{{route('admin.company.index')}}">Torna indietro</a></div>
  </div>
@endsection