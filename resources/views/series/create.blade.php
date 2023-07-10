<x-layout title="Nova Série">
    <form action="{{route('series.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->has('nome'))
            <div class="alert alert-danger">
                {{(($errors->first('nome')))}}
            </div>
        @endif
            
        <div class="row mb-3">

            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="nome" class="form-label">Temporadas:</label>
                <input type="text" id="numero_temporadas" name="numero_temporadas" class="form-control" value="{{ old('numero') }}">
            </div>
            <div class="col-2">
                <label for="nome" class="form-label">Episodes / Temporada:</label>
                <input type="text" id="numero_eps" name="numero_eps" class="form-control" value="{{ old('nome') }}">
            </div>

          
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa</label>
                    <input type="file" 
                                    id="cover" 
                                    name="cover" 
                                    class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
