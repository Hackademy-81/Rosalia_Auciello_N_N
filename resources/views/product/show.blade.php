<x-layout>
    <section class="container-fluid bg-dark">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-white text-center">Dettaglio</h1>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="{{Storage::url($product['img'])}}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
                <h5 class="fw-bold">{{$product['name']}}</h5>
                <p class="fw-bold">Creato da: <a href="">{{$product->user->name}}</a></p>
                <p>{{$product['price']}}€</p>
                <p>{{$product['body']}}</p>
                <div class="d-flex justify-content-around">
                    <a href="{{route('homePage')}}" class="btn btn-primary mx-1">Home</a>
                    @if (Auth::user()->name==$product->user->name)
                    <a href="{{route('product.edit', compact('product'))}}" class="btn btn-warning mx-1">Modifica</a>
                    <form action="{{route('product.destroy', compact('product'))}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mx-1">Elimina</button>
                    </form>
                    @endif
                </div>          
            </div>
        </div>
    </section>
</x-layout>    