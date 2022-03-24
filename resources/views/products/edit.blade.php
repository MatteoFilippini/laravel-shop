@extends('layouts.main')

@section('content')
<form action="{{ route('products.update', $product->id) }}" method="POST" novalidate>
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome prodotto</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">
        <div class="form-text">nome del prodotto da inserire</div>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" rows="5" name="description">{{ old('description', $product->description) }}
        </textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo prodotto</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
        <div class="form-text">Prezzo</div>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $product->image) }}">
        <div class="form-text">Immagine del prodotto</div>
    </div>
    <div class="d-flex justify-content-end align-items-center pt-3">
        <button type="reset" class="btn btn-danger me-3">RESET</button>
        <button type="submit" class="btn btn-success">SEND</button>
    </div>
</form>
@endsection