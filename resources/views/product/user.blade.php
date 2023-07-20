<x-layout>
    <section class="container-fluid bg-dark">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-white text-center">I tuoi prodotti {{$user->name}}</h1>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            @if($user->products->isNotEmpty())
                @foreach ($user->products as $product)
                    <div class="col-12 col-md-4">
                        <x-cardProduct :product="$product"></x-cardProduct>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
</x-layout>   