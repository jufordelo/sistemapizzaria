<?php

namespace App\Http\Controllers;
use App\Models\Estoque;
use App\Models\CategoriaEstoque;
use Illuminate\Http\Request;

class CategoriaEstoqueController extends Controller
{
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
            //  'categoria_estoque_id.required'=> "O: attribute é obrigatório",
        ]);

        // dd($request->all());
        Estoque::create(
            $request->all()
        );

        return redirect('estoque');
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
            'tipo' => "required|max:16",
            'validade' => "nullable",
            'quantidade' => "nullable",
        ], [
            'mprima.required' => "O :attribute é obrigatório",
            'mprima.max' => "São permitidos 100 caracteres",
            'tipo.required' => "O :attribute é obrigatório",
            'tipo.max' => "É permitido somente 3 unidades",
            'quantidade.required' => "O :attribute é obrigatório",
            'quantidade.max' => "É permitido somente 3 unidades",
            'categoria_estoque_id.required' => "O: attribute é obrigatório",
        ]);


        Estoque::updateOrCreate(
            ['id' => $request->id],

            [
                'mprima' => $request->mprima,
                'tipo' => $request->tipo,
                'validade' => $request->validade,
                'quantidade' => $request->quantidade,
                'categoria_estoque_id' => $request->categoria_estoque_id,
            ]
        );
        return redirect('estoque');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Estoque::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('estoque');
    }
    public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = Estoque::where(
                "mprima",
                "like",
                "%". $request->nome . "%" )->get();
        } else{
            $dados=estoque::all();
        } //dd($dados)
             return view("estoque.list",["dados"=> $dados]);
    }
}
