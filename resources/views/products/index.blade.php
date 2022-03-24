@extends('layouts.main')

@section('content')


<!-- <ul>
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
</ul>  -->




<div class="main-index p-5">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->description }}</p>

                        <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-primary">Dettaglio</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection