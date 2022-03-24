@extends('layouts.main')

@section('content')
<div class="container">
  <header>
    <div class="card-title d-flex align-items-center justify-content-between">
      <h1>Inserisci un prodotto</h1>
      <a class="btn btn-secondary" href="{{route('products.index')}}">Indietro</a>
    </div>
  </header>
  <!-- *** FORM *** -->
  <div class="card-body">
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form action="{{route('products.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-10">
          <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div id="nameHelp" class="form-text">Questo campo è obbligatorio</div>
          </div>
        </div>
        <div class="col-10">
          <div class="mb-3">
            <label for="image" class="form-label">Inserisci Url immagine di copertina:</label>
            <input type="text" type="url" class="form-control" id="image" name="image">
          </div>
        </div>
        <div class="col-10">
          <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="text" class="form-control" id="price" name="price">
          </div>
        </div>
        <div class="col-10">
          <div class="col-10">
            <div class="mb-3">
              <div class="mb-3">
                <label for="description" class="form-label">Inserisci una descrizione:</label>
                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ***Form buttons*** -->
      <div class="d-flex align-content-center justify-content-end">
        <button type="reset" class="btn btn-secondary m-3">Cancella</button>
        <button type="submit" class="btn btn-success m-3">Crea</button>
      </div>
    </form>
  </div>
</div>
@endsection