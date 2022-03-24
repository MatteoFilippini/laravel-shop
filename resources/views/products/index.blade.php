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
        <div>
            <!-- AGGIUNTO collegamento per modificare il prodotto -->
            <a href="{{ route('products.edit', $product->id) }}" role="button">
                MODIFICA
            </a>
        </div>


    </li>
    @endforeach
</ul>
@endsection