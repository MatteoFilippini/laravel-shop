@extends('layouts.main')

@section('content')
<div class="container p-5">
   <div class="row">


      <div class="col-6 offset-3">
         @if(session('message'))
         <div class="alert alert-success">
            {{session('message')}}
         </div>
         @endif
         <div class="card pb-3">
            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
            <div class="card-body">
               <h5 class="card-title">{{ $product->name }}</h5>
               <p class="card-text">{{ $product->description }}</p>
               <h3 class="card-title">$ {{ $product->price }}</h3>
               @if($product->brand)
               <h4>Brand: {{ $product->brand->name }}</h4>
               @else
               -
               @endif
               <h5>Categorie:</h5>
               @forelse($product->categories as $category)
               <h6> {{ $category->name }}</h6>
               @empty
               NO CATEGORIE
               @endforelse
            </div>
            <div class="d-flex justify-content-between">
               <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">Elimina Prodotto</button>
               </form>
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