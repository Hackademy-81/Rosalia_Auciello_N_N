<x-layout>
    <section class="container-fluid bg-dark">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-white text-center">Accedi</h1>
            </div>
        </div>
    </section>
    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('register')}}">Non sei registrato? Registrati</a>
                  </form>
            </div>
        </div>
    </section>
</x-layout>