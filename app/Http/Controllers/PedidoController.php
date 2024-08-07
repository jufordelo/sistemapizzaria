<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Charts\GraficoPedido;
use PDF;

class PedidoController extends Controller

{
    public function index()
    {
         $dados= Pedido::all();

        return view("pedido.list", ["dados"=> $dados]);
    }

    public function create()
    {
        $categorias= Categoria::all();
        return view("pedido.form",['categorias'=>$categorias]);
    }

    public function store(Request $request)
    {

       // dd($request->all());
        $request->validate([
            'nome'=>"required|max:100",
             'qtn'=> "required|max:16",
             'contato'=>"nullable",
             'horareti'=> "nullable",
             'tamanho'=> "nullable",

        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'qtn.required'=> "O :attribute é obrigatório",
            'qtn.max'=> "São permitidos 16 caracteres",
            'categoria_id.required'=> "O: attribute é obrigatório",
        ]);


        Pedido::create(
            [ 'nome'=> $request->nome,
            'contato'=> $request->contato,
            'qtn'=> $request->qtn,
            'horareti'=> $request -> horareti,
            'tamanho' => $request -> tamanho,
            'categoria_id'=>$request->categoria_id,
            ] );

            return redirect('pedido');

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
     $dado= Pedido::findOrFail($id);
     $categorias= Categoria::all();

     return view ("pedido.form",
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
             'horareti' => "nullable",
             'tamanho' => "nullable",
             'contato'=>"nullable"
        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'qtn.required'=> "O :attribute é obrigatório",
            'qtn.max'=> "É permitido somente 100 unidades",
            'categoria_id.required'=> "O: attribute é obrigatório",
        ]);


        Pedido::updateOrCreate(
            [ 'id'=> $request->id],

            [ 'nome'=> $request->nome,
            'contato'=> $request->contato,
            'qtn'=> $request->qtn,
            'horareti' => $request -> horareti,
            'tamanho' => $request -> tamanho,
            'categoria_id'=>$request->categoria_id,
        ]);
            return redirect('pedido');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = pedido::findOrFail($id);
       // dd($dado);
        $dado->delete();

        return redirect('pedido');
    }
    public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = pedido::where(
                "nome",
                "like",
                "%". $request->nome . "%" )->get();
        } else{
            $dados=pedido::all();
        } //dd($dados)
             return view("pedido.list",["dados"=> $dados]);

    }
    public function chart(GraficoPedido $pedidoChart)
    {
        return view("pedido.chart", ["pedidoChart" => $pedidoChart -> build()]);
    }
    public function report()
    {
        $pedidos = pedido::All();

        $data = [
            'titulo' => 'Relatório de Pedidos',
            'pedido'=> $pedidos,
        ];

        $pdf = PDF::loadView('pedido.report', $data);

        return $pdf->download('relatorio_pedidos.pdf');
    }


}


