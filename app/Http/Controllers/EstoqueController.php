<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\CategoriaEstoque;
use Illuminate\Http\Request;
use PDF;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dados = Estoque::all();

        return view("estoque.list", ["dados" => $dados]);
    }
    public function create()
    {
        $categoria_estoque = CategoriaEstoque::all();

        return view("estoque.form", ['categoria_estoque' => $categoria_estoque]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mprima' => "required|max:100",
            'tipo' => "nullable",
            'validade' => "nullable",
            'quantidade' => "required|max:100",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",

        ], [
            'mprima.required' => "O :attribute é obrigatório",
            'mprima.max' => "São permitidos 100 caracteres",
            'validade.required' => "O :attribute é obrigatório",
            'validade.max' => "São permitidos 3 caracteres",
            'quantidade.required' => "O :attribute é obrigatório",
            'quantidade.max' => "São permitidos 3 caracteres",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/estoque/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }


        //dd($request->all());
        Estoque::create($data);
        return redirect('estoque');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estoque $estoque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Estoque::findOrFail($id);

        $categoria_estoque = CategoriaEstoque::all();

        return view("estoque.form", [
            'dado' => $dado,
            'categoria_estoque' => $categoria_estoque
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'mprima' => "required|max:100",
            'tipo' => "nullable",
            'validade' => "nullable",
            'quantidade' => "required|max:16",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",

        ], [
            'mprima.required' => "O :attribute é obrigatório",
            'mprima.max' => "São permitidos 100 caracteres",
            'validade.required' => "O :attribute é obrigatório",
            'validade.max' => "São permitidos 3 caracteres",
            'quantidade.required' => "O :attribute é obrigatório",
            'quantidade.max' => "São permitidos 3 caracteres",
            'categoria_estoque_id.required' => "O: attribute é obrigatório",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/estoque/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Estoque::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('estoque');

       /* Estoque::updateOrCreate(
            ['id' => $request->id],

            [
                'mprima' => $request->mprima,
                'tipo' => $request->tipo,
                'validade' => $request->validade,
                'quantidade' => $request -> quantidade,
                'categoria_estoque_id' => $request->categoria_estoque_id,
            ]
        );
        return redirect('estoque');*/

    }

        public function destroy($id)
    {
        $dado = Estoque::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('estoque');
    }
    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $dados = Estoque::where(
                "tipo",
                "like",
                "%" . $request->nome . "%"
            )->get();
        } else {
            $dados = EstoqueController::all();
        } //dd($dados)
        return view("estoque.list", ["dados" => $dados]);
    }
    public function report()
    {
        $estoque = Estoque::All();

        $data = [
            'titulo' => 'Relatório Estoque',
            'estoque'=> $estoque,
        ];

        $pdf = PDF::loadView('estoque.report', $data);

        return $pdf->download('relatorio_estoque.pdf');
    }
}
