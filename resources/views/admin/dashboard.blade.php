@extends('layouts.app')

@section('title')
  CRM - Dashboard
@endsection

@section('content')
  <div class="container dashboard">
    <h2>Da qui puoi gestire le aziende e i dipendenti</h2>
    <a href="{{route('admin.company.index')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Aziende</button></a>
    <button type="button" class="btn btn-primary btn-lg btn-block">Dipendenti</button>
  </div>
@endsection