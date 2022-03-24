@extends('layouts.main')

@section('content')
   <div class="container p-5">
      <div class="row">
         <div class="col-6 offset-3">
            <div class="card">
               <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
               <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text">{{ $product->description }}</p>
                  <h3 class="card-title">$ {{ $product->price }}</h3>
               </div>
               {{-- DELETE BUTTON --}}
               <div class="d-flex justify-content-between">
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                     @method('DELETE')
                     @csrf
                     <button type="submit" class="btn btn-danger">Elimina Prodotto</button>
                  </form>
                  <!-- AGGIUNTO collegamento per modificare il prodotto -->
                  <a class="btn btn-secondary" href="{{ route('products.edit', $product->id) }}" role="button">
                     MODIFICA
                  </a>
                  <a class="btn btn-primary" href="{{ route('products.index') }}">Tutti i prodotti</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
