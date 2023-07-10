

<x-layout title="Séries">
    <form action="{{route('registro.store')}}" method ="post" >
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">nome</label>
            <input type="text" class="form-control" id="name" name="name"        placeholder="digite o nome">
          </div>


        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email"        placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password"  name="password"  placeholder="senha">
          </div>

          <button type="submit" class="btn btn-primary">Cadastrar</button>

         
    </form>
</x-layout>