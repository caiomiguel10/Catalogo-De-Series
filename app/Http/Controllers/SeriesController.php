<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Http\Middleware\Autenticador;


use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Serie;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use function GuzzleHttp\Promise\all;

class SeriesController extends Controller
{
    //o construtor recebe a interface SeriesRepository, que tem como o EloquentRepository implementada
    //entao ele espera que nessa classe tem um metodo add, eu poderia criar uma outra classe que implementasse do SeriesRepository
    //com o mesmo metodo, fazendo assim se eu precisar usar outro orm n tenha muitas dificuldades de mudar
    public function __construct(private SeriesRepository $repository)
    {   
        //todos os metodos estao passando pelo middleware autentifcador menos o index
        $this->middleware(Autenticador::class)->except('index');
    }

    
    public function index(Request $request)
    {
        //retorna a mensagem para a view
        // $msg = $request->session()->get('mensagem.sucesso');

        //adiciona uma mensagem nova na "mensagem.sucesso" que foi definida no fim de cada acao de adicioanr ou excluir
        // session(['mensagem.sucesso'=>'seria removida com sucesso']);
        // $series = Serie::with('Temporadas')->get();
        
        
        $series = Serie::all();
        
         $msg = session('mensagem.sucesso');
        // $series = Serie::find(9);
        
        // foreach ($series->Temporadas as $key => $value) {
        //     echo "chaves : {$key} <br>";
        //     echo "Valores : {$value->numero} <br>";


        // }

        //     dd();

        return view('series.index', ['series' => $series, 'msg' => $msg]);
    }

    public function create()
    {
        return view('series.create');
    }
    //ultilizando uma classe de request onde la tem todas as validacoes que antes estavam aqui

    public function store(SeriesFormRequest $request)
    {
        
        $coverPath = $request->hasFile ('cover')
        ? $request->file('cover')->store('series_cover','public')
        :null;
        $request->coverPath = $coverPath;


        //funcao de transacao   
        //nao tem acesso a varial request, so usar o use    
        $series = $this->repository->add($request);
        //dispara os emails
        EventsSeriesCreated::dispatch(
            $series->nome,
            $series->id,
            $request->numero_temporadas,
            $request->numero_eps,
        );
        //pega o usuario logado

      
        
        // $users = User::all();
        // foreach ($users as $index => $user) {

        //     $email = new SeriesCreated(

        //         $series->nome,
        //         $series->id,
        //         $request->numero_temporadas,
        //         $request->numero_eps,
        //     );


        //     $when = now()->addSeconds($index * 5);
        //     Mail::to($user)->later($when, $email);              
            
        // }
        // Mail::to(Auth::user())->send($email);

        //FORMAS DE MANDAR UMA MENSAGEM

        //porem dessa forma nao tem o flash, que faz a mensagem ficar em uma unica sessao, se atualizar continua a mensagem
        // session(['mensagem.sucesso'=>'seria adicionada com sucesso']);
        // $request->session()->flash('mensagem.sucesso',"a Serie {$serie->nome} adicionada com sucesso");
        return to_route('series.index')
            ->with('mensagem.sucesso', "a Serie {$series->nome} foi adicionada com sucesso");;
    }


    public function edit(Serie $series)
    {

        return view('series.edit', ['series' => $series]);
    }
    public function update(Serie $series, SeriesFormRequest $request)
    {

        
        $series->update($request->all());
        
        return to_route('series.index')->with('mensagem.sucesso', "a Serie {$series->nome} foi atualizada com sucesso");
    }


    public function destroy(Request $request, Serie $series)
    {
        //mostra os parametros das rotas

        //formas de deletar  1
        Serie::destroy($series->id);
        //formas de deletar  2
        $series->delete();

        //mensagem de exclusao atraves da sessao
        // $request->session()->flash('mensagem.sucesso',"a Serie {$series->nome} foi removida com sucesso");

        return to_route('series.index')
            ->with('mensagem.sucesso', "a Serie {$series->nome} foi removida com sucesso");
    }
}
