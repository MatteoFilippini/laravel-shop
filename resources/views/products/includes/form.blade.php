<div class="container p-3">
   {{-- ERROR --}}
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif

   @if ($product->exists)
   <form action="{{ route('products.update', $product->id) }}" method="POST" novalidate>
      @method('PUT')
      @else
      <form action="{{ route('products.store') }}" method="POST">
         @endif
         @csrf
         <div class="mb-3">
            <label for="name" class="form-label">Nome prodotto:</label>
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
         <div class="form-group">
            <label for="exampleFormControlSelect1">Brand</label>
            <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
               <option value="">-</option>
               @foreach($brands as $brand)
               <option value="{{$brand->id}}" @if (old('brand_id',$product->brand_id) == $brand->id) selected @endif>{{$brand->name}}</option>
               @endforeach
            </select>
         </div>
         @foreach($categories as $category)
         <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="c-{{$category->id}}" name="cats[]" @if (in_array($category->id,old('category_id',$categories_ids ?? []) )) checked @endif>
            <label class="form-check-label" for="c-{{$category->id}}">{{$category->name}}</label>
         </div>
         @endforeach
         <div class="d-flex justify-content-end align-items-center pt-3">
            <button type="reset" class="btn btn-danger me-3">RESET</button>
            <button type="submit" class="btn btn-success">SEND</button>
         </div>
      </form>

</div>