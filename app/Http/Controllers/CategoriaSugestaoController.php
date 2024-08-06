<?php

namespace App\Http\Controllers;
use App\Models\Sugestao;
use App\Models\CategoriaSugestao;
use Illuminate\Http\Request;

class CategoriaSugestaoController extends Controller
{
    public function index()
    {
        $dados = Sugestao::all();

        return view("sugestao.lists", ["dados" => $dados]);
    }

    public function create()
    {
        $categoria_sugestao = CategoriaSugestao::all();

        return view("sugestao.forms", ['categoria_sugestao' => $categoria_sugestao]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'resp' => "required|max:100",
            'data' => "nullable",
            'hora' => "nullable",
            'pss' => "required|max:3",
            'tel' => "nullable",
        ], [
            'resp.required' => "O :attribute é obrigatório",
            'resp.max' => "São permitidos 100 caracteres",
            'pss.required' => "O :attribute é obrigatório",
            'pss.max' => "São permitidos 3 caracteres",
            //  'categoria_sugestao_id.required'=> "O: attribute é obrigatório",
        ]);

        // dd($request->all());
        Sugestao::create(
            $request->all()
        );

        return redirect('sugestao');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Sugestao::findOrFail($id);

        $categoria_sugestao = CategoriaSugestao::all();

        return view("sugestao.forms", [
            'dado' => $dado,
            'categoria_sugestao' => $categoria_sugestao
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'assunto' => "required|max:100",
            'tipo' => "required|max:16",
            'comentario' => "nullable"
        ], [
            'assunto.required' => "O :attribute é obrigatório",
            'assunto.max' => "São permitidos 100 caracteres",
            'tipo.required' => "O :attribute é obrigatório",
            'tipo.max' => "É permitido somente 3 unidades",
            'categoria_sugestao_id.required' => "O: attribute é obrigatório",
        ]);


        Sugestao::updateOrCreate(
            ['id' => $request->id],

            [
                'assunto' => $request->resp,
                'tipo' => $request->tel,
                'comentario' => $request->pss,
                'categoria_sugestao_id' => $request->categoria_sugestao_id,
            ]
        );
        return redirect('sugestao');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Sugestao::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('sugestao');
    }
    public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = Sugestao::where(
                "assunto",
                "like",
                "%". $request->nome . "%" )->get();
        } else{
            $dados=Sugestao::all();
        } //dd($dados)
             return view("sugestao.lists",["dados"=> $dados]);
    }
}
