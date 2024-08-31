<?php

namespace App\Http\Controllers;

use App\Models\Sugestao;
use App\Models\CategoriaSugestao;
use Illuminate\Http\Request;

class SugestaoController extends Controller
{
    private $pagination = 2;

    public function index()
    {

        $dados = Sugestao::paginate($this->pagination);

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
            'assunto' => "required|max:100",
            'tipo' => "nullable",
            'comentario' => "nullable",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'assunto.required' => "O :attribute é obrigatório",
            'assunto.max' => "São permitidos 100 caracteres",
            'comentario.required' => "O :attribute é obrigatório",
            'comentario.max' => "São permitidos 3 caracteres",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
            //  'categoria_sugestao_id.required'=> "O: attribute é obrigatório",
        ]);
        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/sugestao/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Sugestao::create($data);

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
            'tipo' => "nullable",
            'comentario' => "required|max:16",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'assunto.required' => "O :attribute é obrigatório",
            'assunto.max' => "São permitidos 100 caracteres",
            'comentario.required' => "O :attribute é obrigatório",
            'comentario.max' => "São permitidos 100 caracteres",
            'categoria_sugestao_id.required' => "O: attribute é obrigatório",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);
        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/sugestao/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Sugestao::updateOrCreate(
            ['id' => $request->id],
            $data
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
        if (!empty($request->nome)) {
            $dados = Sugestao::where(
                "tipo",
                "like",
                "%" . $request->nome . "%"
            )->get();
        } else {
            $dados = Sugestao::all();
        } //dd($dados)
        return view("sugestao.lists", ["dados" => $dados]);
    }
}

