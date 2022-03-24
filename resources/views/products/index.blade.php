@extends('layouts.main')

@section('content')
<a class="btn btn-primary m-3" href="{{route('products.create')}}">Aggiungi un prodotto</a>
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
    </li>
    @endforeach
</ul>
@endsection