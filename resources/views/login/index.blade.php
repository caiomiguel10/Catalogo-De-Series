

<x-layout title="Séries">
    <form action="{{route('login.store')}}" method ="post" >
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email"        placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password"  name="password"  placeholder="senha">
          </div>

          <button type="submit" class="btn btn-primary">enviar</button>

          <a href="{{route('registro.index')}}"  class="btn btn-success">Regristrar</a>
    </form>
</x-layout>