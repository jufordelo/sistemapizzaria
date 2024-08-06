<?php

namespace App\Http\Controllers;
use App\Models\Personalizado;
use Illuminate\Http\Request;
use App\Models\CategoriaPersonalizado;

class PersonalizadoController extends Controller
{
    public function index()
    {
        $dados=Personalizado::all();

        return view("personalizado.list", ["dados"=> $dados]);
    }

    public function create()
    {
        $categoria_personalizados = CategoriaPersonalizado::all();
        return view("personalizado.form",['categoria_personalizados'=>$categoria_personalizados]);
    }
       public function store(Request $request)
    {
        $request->validate([
            'nomec'=>"required|max:100",
             'tel'=>"nullable",
             'datareti'=>'nullable',
             'horaret' => 'nullable',
             'kg'=> "required|max:16",
             'obs'=> 'required|max:30',
             'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ],[
            'nomec.required' => 'O campo :attribute é obrigatório.',
            'nomec.max' => 'O campo :attribute não pode ter mais de 100 caracteres.',
            'kg.required' => 'O campo :attribute é obrigatório.',
            'kg.max' => 'O campo :attribute não pode ter mais de 3 caracteres.',
            'obs.required' => 'O campo :attribute é obrigatório.',
            'obs.max' => 'O campo :attribute não pode ter mais de 3 caracteres.',
            'imagem.image' => "Deve ser enviado uma imagem",

             //copiei de encomenda, qualuqer coisa faz igual reserva
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/personalizado/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo; }


        Personalizado::create(
            [ 'nomec'=> $request->nomec,
            'tel'=> $request->tel,
            'datareti'=> $request->datareti,
            'horareti'=> $request->horareti,
            'kg'=> $request -> kg,
            'obs'=> $request -> obs,
            'categoria_personalizados_id'=>$request-> categoria_personalizados_id , //talvez tenque por 's'
            ] );

            return redirect('personalizado');

    }

    /**
     * Display the specified resource.
     */
    public function show(Personalizado $personalizado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado= Personalizado::findOrFail($id);
        $categoria_personalizados =CategoriaPersonalizado::all();

        return view ("personalizado.form",
        ['dado'=>$dado,
       'categoria_personalizados'=>$categoria_personalizados]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomec'=>"required|max:100",
             'tel'=>"nullable",
             'datareti'=>'required|max:16',
             'horaret' => 'required|max:16',
             'kg'=> "required|max:16",
             'obs'=> 'required|max:30',
             'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ],[
            'nomec.required' => 'O campo :attribute é obrigatório.',
            'nomec.max' => 'O campo :attribute não pode ter mais de 100 caracteres.',
            'kg.required' => 'O campo :attribute é obrigatório.',
            'kg.max' => 'O campo :attribute não pode ter mais de 3 caracteres.',
            'obs.required' => 'O campo :attribute é obrigatório.',
            'obs.max' => 'O campo :attribute não pode ter mais de 3 caracteres.',
            'imagem.image' => "Deve ser enviado uma imagem",


        ]);
        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/personalizado/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Personalizado::updateOrCreate(
            [ 'id'=> $request->id],

            ['nomec'=> $request->nomec,
            'tel'=> $request->tel,
            'datareti'=> $request-> datareti,
            'horareti'=> $request-> horareti,
            'kg'=> $request -> kg,
            'obs'=> $request -> obs,
            'categoria_personalizados_id'=>$request-> categoria_personalizados_id ,

        ]);
            return redirect('personalizado');
    }
    public function destroy($id)
    {
        $dado = Personalizado::findOrFail($id);
       // dd($dado);
        $dado->delete();

        return redirect('personalizado');
    }
    public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = Personalizado::where(
                "nome",
                "like",
                "%". $request->nome . "%" )->get();
        } else{
            $dados=Personalizado::all();
        } //dd($dados)
             return view("personalizado.list",["dados"=> $dados]);

    }

}
