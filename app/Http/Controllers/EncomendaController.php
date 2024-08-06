<?php

namespace App\Http\Controllers;
use App\Models\Encomenda;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Charts\GraficoEncomenda;
use PDF;

class EncomendaController extends Controller

{
    public function index()
    {
         $dados=Encomenda::all();

        return view("encomenda.list", ["dados"=> $dados]);
    }

    public function create()
    {
        $categorias= Categoria::all();
        return view("encomenda.form",['categorias'=>$categorias]);
    }

    public function store(Request $request)
    {

       // dd($request->all());
        $request->validate([
            'nome'=>"required|max:100",
             'qtn'=> "required|max:16",
             'contato'=>"nullable"
        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'qtn.required'=> "O :attribute é obrigatório",
            'qtn.max'=> "São permitidos 16 caracteres",
            'categoria_id.required'=> "O: attribute é obrigatório",
        ]);


        Encomenda::create(
            [ 'nome'=> $request->nome,
            'contato'=> $request->contato,
            'qtn'=> $request->qtn,
            'categoria_id'=>$request->categoria_id,
            ] );

            return redirect('encomenda');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     $dado= Encomenda::findOrFail($id);
     $categorias= Categoria::all();

     return view ("encomenda.form",
     ['dado'=>$dado,
    'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nome'=>"required|max:100",
             'qtn'=> "required|max:16",
             'contato'=>"nullable"
        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'qtn.required'=> "O :attribute é obrigatório",
            'qtn.max'=> "É permitido somente 100 unidades",
            'categoria_id.required'=> "O: attribute é obrigatório",
        ]);


        Encomenda::updateOrCreate(
            [ 'id'=> $request->id],

            [ 'nome'=> $request->nome,
            'contato'=> $request->contato,
            'qtn'=> $request->qtn,
            'categoria_id'=>$request->categoria_id,
        ]);
            return redirect('encomenda');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Encomenda::findOrFail($id);
       // dd($dado);
        $dado->delete();

        return redirect('encomenda');
    }
    public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = Encomenda::where(
                "nome",
                "like",
                "%". $request->nome . "%" )->get();
        } else{
            $dados=Encomenda::all();
        } //dd($dados)
             return view("encomenda.list",["dados"=> $dados]);

    }
    public function chart(GraficoEncomenda $encomendaChart)
    {
        return view("encomenda.chart", ["encomendaChart" => $encomendaChart -> build()]);
    }
    public function report()
    {
        $encomendas = Encomenda::All();

        $data = [
            'titulo' => 'Relatório de Encomendas',
            'encomenda'=> $encomendas,
        ];

        $pdf = PDF::loadView('encomenda.report', $data);

        return $pdf->download('relatorio_encomendas.pdf');
    }


}


