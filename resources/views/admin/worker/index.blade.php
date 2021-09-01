@extends('layouts.app')

@section('title')
  CRM - Lista Dipendenti
@endsection

@section('content')
  <div class="container workers_index">
    <div class="create">
      <a href="{{route('admin.worker.create')}}"><button type="button" class="btn btn-primary">Aggiungi nuovo dipendente</button></a>
    </div>
    <h1>Lista dipendenti</h1>
    <div class="row title">
      <div class="col-2">Cognome</div>
      <div class="col-2">Nome</div>
      <div class="col-2">Azienda</div>
      <div class="col-4 offset-2">Azioni</div>
    </div>
    @foreach ($workers as $worker)
      <div class="row">
        <div class="col-2">{{$worker->name}}</div>
        <div class="col-2">{{$worker->surname}}</div>
        <div class="col-2">
          @foreach ($firms as $firm)
          @if ($worker->firm_id == $firm->id)
            {{$firm->name}} 
          @endif
          @endforeach
        </div>
        <div class="col-4 offset-2">
          <a href="{{route('admin.worker.show', ['worker' => $worker->id])}}"><button type="button" class="btn btn-success">Visualizza</button></a>
          <a href="{{route('admin.worker.edit', ['worker' => $worker->id])}}"><button type="button" class="btn btn-info">Modifica</button></a>
          <form action="{{route('admin.worker.destroy', ['worker' => $worker->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>

        </div>
      </div>
    @endforeach

    <div class="pagination">{{ $workers->links() }}</div>
    <div class="back"><a href="{{route('admin.dashboard')}}">Torna indietro</a></div>
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