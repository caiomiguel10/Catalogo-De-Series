<x-layout title="Episodes">
   
  @isset($msg)
  <div class="alert alert-success">
      {{($msg)}}
  </div>
  @endisset
    <form  method="post" >
    @csrf
   
    <ul class="list-group ">
        @foreach ($episodes as $episode)
        <li class="list-group-item d-flex justify-content-between align-items-center" >
          <span>eps:   {{ $episode->numero }}</span> 
          {{-- vai transformar o nome em um array --}}
          <input type="checkbox" name="episodes[]" id="" value="{{$episode->id}}" @if($episode->watched) checked @endif/>
          




        </li>
       

        @endforeach
        <button type="submit" class="btn btn-primary mt-3">salvar</button>
    </ul>
  </form>
</x-layout>




