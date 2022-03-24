@extends('layouts.main')

@section('content')

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
                        {{-- FORM DESTROY --}}
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
               @method('DELETE')
               @csrf
               <button type="submit" class="btn btn-danger">Elimina Prodotto</button>
            </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <a class="btn btn-primary m-3" href="{{route('products.create')}}">Aggiungi un prodotto</a>
</div>
@endsection



            


