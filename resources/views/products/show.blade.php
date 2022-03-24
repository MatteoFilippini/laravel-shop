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



    <a href="{{ route('products.index') }}">Tutti i prodotti</a>
</div>
@endsection