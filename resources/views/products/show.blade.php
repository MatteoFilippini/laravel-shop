@extends('layouts.main')

@section('content')
<div class="container p-5">



    <div class="card">
        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <h3 class="card-title">$ {{ $product->price }}</h3>
        </div>
    </div>


<form action="{{ route('products.destroy', $product->id) }}" method="POST">
<!-- AGGIUNTO collegamento per modificare il prodotto -->
    <a href="{{ route('products.edit', $product->id) }}" role="button">
        MODIFICA
    </a>
         @method('DELETE')
         @csrf
         <button type="submit" class="btn btn-danger">Elimina Prodotto</button>
      </form>
    <a href="{{ route('products.index') }}">Tutti i prodotti</a>
</div>
@endsection
