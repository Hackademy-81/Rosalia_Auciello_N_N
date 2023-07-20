<x-layout>
    <section class="container-fluid bg-dark">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-white text-center">Modifica</h1>
            </div>
        </div>
    </section>
    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{route('product.update', compact('product'))}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label class="form-label">Nome Prodotto</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product['name']}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrizione</label>
                        <textarea name="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$product['body']}}</textarea>
                        @error('body')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prezzo</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$product['price']}}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"{{$category== $product->category? 'selected' :''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <select name="tag_id[]" id="" class="form-control" multiple>
                            @foreach ($tags as $tag)
                                <option @if ($product->tags->contains($tag)) selected @endif value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        <small>Premi Ctrl + Click per selezionare più tags</small>
                    </div>
                    <div class="mb-3">
                        <p>Immagine corrente:</p>
                        <img src="{{Storage::url($product['img'])}}" alt="" width="200px" height="150px">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Immagine</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" name="img">
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </section>
</x-layout>