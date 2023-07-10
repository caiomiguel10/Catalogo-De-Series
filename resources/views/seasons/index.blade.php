<x-layout title="Séries">
   
    
    <h1 class="text-center">
        {{ $series->nome}}
     </h1>

    <div class="d-flex justify-center">
        <img src="{{asset("storage/{$series->cover}")}}" alt="capa" class="img-fluid"   >
    </div>
    
    <ul class="list-group ">
        @foreach ($seasons as $season)

        <li class="list-group-item d-flex justify-content-between align-items-center" >
           <span><a href="{{route('eps.index',$season->id)}}"> temporada -  {{ $season->numero }}</a>     </span>   
            
            <span class="d-flex bg-secondary p-3 text-white">
              {{$season->numberOfWatchedEpisodes()}} /  {{$season->Episodes()->count()}}
            </span>
            

            
        </li>

           
       



        @endforeach
    </ul>
</x-layout>




