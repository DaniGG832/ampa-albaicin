<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovimientoRequest;
use App\Http\Requests\UpdateMovimientoRequest;
use App\Models\Movimiento;
use Illuminate\Pagination\Paginator;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Paginator::defaultView('paginate');

        $movimientos = Movimiento::with('user')->orderBy('id','desc')->paginate(15);
        $total = Movimiento::sum('cantidad');

        //return $total;
        //return $movimientos[0]->user;
        return view('movimientos.index',compact('movimientos','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovimientoRequest $request)
    {

        if (Movimiento::sum('cantidad')+$request->validated('cantidad')<0) {
            # code...
        return back()->with('error', "El total no puede ser negativo");

        }
        $movimiento = new Movimiento();

        $movimiento->concepto = $request->validated('concepto');
        $movimiento->cantidad = $request->validated('cantidad');
        $movimiento->subtotal = Movimiento::sum('cantidad')+$request->validated('cantidad');
        $movimiento->user_id = auth()->id();

        $movimiento->save();

        return back()->with('success', "Movimiento registrado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimiento $movimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimiento $movimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovimientoRequest $request, Movimiento $movimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimiento $movimiento)
    {
        //
    }
}
