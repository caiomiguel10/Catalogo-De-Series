<x-layout title="Séries">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            
        </div>
      </nav>
      @auth
      <a href="{{route('series.create')}}" class="btn btn-dark mb-2">Adicionar</a>
          
      @endauth
    @isset($msg)
    <div class="alert alert-success">
        {{($msg)}}
    </div>
    @endisset
     
    
    
    <ul class="list-group ">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center p-2">
            
            <div class="flex justify-center">

                <img src="{{asset("storage/{$serie->cover}")}}" alt="capa" class="img-fluid" width="100px" height="100px">
            </div>

          @auth <a href="{{route('seasons.index',$serie->id)}}"> @endauth {{ $serie->nome }}
        
        @auth</a>@endauth
            @auth
            <span class="d-flex p-2 ">  
                <a href="{{route('series.edit',$serie->id)}}" class="btn btn-success m-1 ">E</a>
                <form action="{{route('series.destroy',$serie->id)}}"  method="post" class="m-1">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">X</button>
        
                </form>
            </span>
            @endauth


        </li>
            
            {{-- @foreach($serie->Temporadas as $valor)

                <p>temporada : {{$valor->numero}} </p>
        
             @endforeach --}}
       



        @endforeach
    </ul>
</x-layout>




