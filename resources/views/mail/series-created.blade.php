@component('mail::message')
    #{{$nomeSerie}} criada

   A Serie {{$nomeSerie}} com {{$qtdTemporadas}} temporadas e {{$qntEpisodes}} episodios por temporada, foi criada
   - teste
   - alow

@component('mail::button',['url'=>route('seasons.index',$idSerie)])
    Ver serie
@endcomponent
@endcomponent
