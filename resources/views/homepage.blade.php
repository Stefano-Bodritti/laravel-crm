@extends('layouts.app')

@section('title')
  CRM - Home
@endsection

@section('content')
  <div class="container">
    <h1>Benvenuto nel tuo CRM</h1>
    <br>
    <h3>Per gestire i dipendenti e le aziende <a href="{{ route('login') }}">clicca qui</a></h3>
  </div>
@endsection