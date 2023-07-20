<x-layout>
    <section class="container-fluid bg-dark">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-white text-center">Contattaci</h1>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{route('contact.submit')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Nome e Cognome</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Commento</label>
                        <input type="text" class="form-control" name="comment">
                    </div>                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </section>
</x-layout>