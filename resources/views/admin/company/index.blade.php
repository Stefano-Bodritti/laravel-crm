@extends('layouts.app')

@section('title')
  CRM - Lista Aziende
@endsection

@section('content')
  <div class="container company_index">
    <div class="create">
      <a href="{{route('admin.company.create')}}"><button type="button" class="btn btn-primary">Aggiungi nuova azienda</button></a>
    </div>
    <h1>Lista delle aziende</h1>
    <div class="row title">
      <div class="col-2">Logo</div>
      <div class="col-2">Nome</div>
      <div class="col-2">Partita IVA</div>
      <div class="col-4 offset-2">Azioni</div>
    </div>
    @foreach ($firm as $company)
      <div class="row">
        <div class="col-2"><img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" alt="Logo"></div>
        <div class="col-2">{{$company->name}}</div>
        <div class="col-2">{{$company->partita_iva}}</div>
        <div class="col-4 offset-2">
          <button type="button" class="btn btn-success">Visualizza</button>
          <button type="button" class="btn btn-info">Modifica</button>

          {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-times"></i> Elimina</button>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Elimina profilo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">Sei proprio sicuro di voler eliminare l'azienda? Questa operazione è irreversibile.</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Torna indietro</button> --}}
                  <form action="{{route('admin.company.destroy', ['company' => $company->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                  </form>
                {{-- </div>
              </div>
            </div>
          </div>  --}}

        </div>
      </div>
    @endforeach
    <div class="pagination">{{ $firm->links() }}</div>
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