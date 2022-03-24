@extends('layouts.main')

@section('content')
   <ul>
      @foreach ($products as $product)
         <li>
            <figure>
               <img src="{{ $product->image }}" alt="">
            </figure>
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <div>{{ $product->price }}</div>
            <a href="{{ route('products.show', ['product' => $product->id]) }}">Dettagli</a>
            {{-- FORM DESTROY --}}
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
               @method('DELETE')
               @csrf
               <button type="submit" class="btn btn-danger">Elimina Prodotto</button>
            </form>
         </li>
      @endforeach
   </ul>
@endsection
