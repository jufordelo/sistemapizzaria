<?php

namespace App\Http\Controllers;
use App\Models\Reserva;
use App\Models\CategoriaReserva;
use App\Models\categoria1;
use Illuminate\Http\Request;

class CategoriaReservaController extends Controller
{
    public function index()
    { //app/http/controler
        $dados = Reserva::all();
        //dd($dados);
        return view("reserva.listr", ["dados" => $dados]);
    }

    public function create()
    {
        $categoria_reservas = CategoriaReserva::all();

        return view("reserva.formr", ['categoria_reservas' => $categoria_reservas]);
    }

    public function store(Request $request)
    {   // dd($request->all());
        $request->validate([
            'resp' => 'required|max:100',
            'data' => 'nullable',
            'hora' => 'nullable',
            'pss' => 'required|max:16',
            'tel' => 'nullable',
            'categoria_reserva_id' => 'required|exists:categoria_reserva_id', // Validar que a categoria existe na tabela categorias_reserva
        ], [
            'resp.required' => 'O campo :attribute é obrigatório.',
            'resp.max' => 'O campo :attribute não pode ter mais de 100 caracteres.',
            'pss.required' => 'O campo :attribute é obrigatório.',
            'pss.max' => 'O campo :attribute não pode ter mais de 3 caracteres.',
            'categoria_reserva_id.required' => 'A categoria da reserva é obrigatória.',
            'categoria_reserva_id.exists' => 'A categoria selecionada é inválida.',
        ]);

        // Criação da reserva
        $reserva = Reserva::create([
            'resp' => $request->resp,
            'tel' => $request->tel,
            'pss' => $request->pss,
            'categoria_reserva_id' => $request->categoria_reserva_id,
            'data' => $request->data,
            'hora' => $request->hora,
        ]);
              return redirect('reserva'); 
    
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
        $dado = Reserva::findOrFail($id);

        $categoria_reservas = CategoriaReserva::all();

        return view("reserva.formr", [
            'dado' => $dado,
            'categoria_reservas' => $categoria_reservas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'resp' => "required|max:100",
            'pss' => "required|max:16",
            'tel' => "nullable"
        ], [
            'resp.required' => "O :attribute é obrigatório",
            'resp.max' => "São permitidos 100 caracteres",
            'pss.required' => "O :attribute é obrigatório",
            'pss.max' => "É permitido somente 16 unidades",
            'categoria_reserva_id.required' => "O: attribute é obrigatório",
        ]);


        Reserva::updateOrCreate(
            ['id' => $request->id],

            [
                'resp' => $request->resp,
                'tel' => $request->tel,
                'pss' => $request->pss,
                'categoria_reserva_id' => $request->categoria_reserva_id,
            ]
        );
        return redirect('reserva');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Reserva::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('reserva');
    }
    public function search(Request $request)
    {
        if (!empty($request->pss)) {
            $dados = Reserva::where(
                "pss",
                "like",
                "%" . $request->pss . "%"
            )->get();
        } else {
            $dados = Reserva::all();
        } //dd($dados)
        return view("reserva.listr", ["dados" => $dados]);
    }
}
