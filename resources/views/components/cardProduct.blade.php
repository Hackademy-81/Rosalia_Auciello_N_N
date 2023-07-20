<div class="card my-5">
    <img src="{{Storage::url($product['img'])}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title fw-bold">{{$product['name']}}</h5>
      <h5 class="card-title fw-bold">Creato da: <a href="{{route('product.user', $product->user)}}">{{$product->user->name}}</a></h5>
      <h5 class="card-title fw-bold">Categoria: <a href="{{route('product.category', $product->category)}}">{{$product->category->name}}</a></h5>
      @foreach ($product->tags as $tag)
        <span>#{{$tag->name}} </span>      
      @endforeach
      <p class="card-text">{{$product['price']}}€</p>
      <p class="card-text">{{$product->getdescriptionSubstring()}}...</p>
      <p class="card-text">Inserito il: {{$product->formatData()}}</p>
      <a href="{{route('product.show', compact('product'))}}" class="btn btn-primary">Dettaglio</a>
    </div>
</div>