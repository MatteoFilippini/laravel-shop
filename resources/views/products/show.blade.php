@extends('layouts.main')

@section('content')
   <div>
      <figure>
         <img src="{{ $product->image }}" alt="">
      </figure>
      <h2>{{ $product->name }}</h2>
      <p>{{ $product->description }}</p>
      <div>{{ $product->price }}</div>
      <a href="{{ route('products.index') }}">Home</a>
      {{-- FORM DESTROY --}}
      <form action="{{ route('products.destroy', $product->id) }}" method="POST">
         @method('DELETE')
         @csrf
         <button type="submit" class="btn btn-danger">Elimina Prodotto</button>
      </form>
   </div>
@endsection
