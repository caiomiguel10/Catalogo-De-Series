<x-layout title="Nova Série">
    <form action="{{route('series.update',$series->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value={{$series->nome}}>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</x-layout>
