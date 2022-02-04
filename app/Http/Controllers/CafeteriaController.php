<?php

namespace App\Http\Controllers;

use App\Models\cafeteria;
use Illuminate\Http\Request;

class CafeteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cafeterias'] = cafeteria::paginate(6);
        return view('cafeteria.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cafeteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = [
            'nameproduct' => 'required|string',
            'reference' => 'required|string',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'category' => 'required|string',
            'stock' => 'required|string',

        ];
        $message = [
            'required' => 'El :attribute es requerido',
            'numeric' => 'El :attribute es debe ser Numerico',
        ];


        $atributes = [
            'nameproduct' => 'Nombre del Producto',
            'reference' => ' Referencia del Producto',
            'price' => '  Precio del Producto',
            'weight' => '  Peso del Producto ',
            'category' => 'Categoria del Producto',
            'stock' => ' Cantidad del Producto',
        ];

        $this->validate($request, $country, $message,$atributes);

        //$datoscafeteria = request()->all();
        $datoscafeteria = request()->except('_token');
        cafeteria::insert($datoscafeteria);

        // return response()->json($datoscafeteria);
        return redirect('cafeteria')->with('mensaje', 'Producto Agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cafeteria  $cafeteria
     * @return \Illuminate\Http\Response
     */
    public function show(cafeteria $cafeteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cafeteria  $cafeteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cafeteria = cafeteria::findOrFail($id);
        return view('cafeteria.edit', compact('cafeteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cafeteria  $cafeteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $country = [
            'nameproduct' => 'required|string',
            'reference' => 'required|string',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'category' => 'required|string',
            'stock' => 'required|string',

        ];

        $message = [
            'required' => 'El :attribute es requerido',
            'numeric' => 'El :attribute debe ser Numerico',
        ];


        $atributes = [
            'nameproduct' => ' Nombre del Producto',
            'reference' => 'Referencia del Producto',
            'price' => ' Precio del Producto ',
            'weight' => '  Peso del Producto ',
            'category' => 'Categoria del Producto',
            'stock' => ' Cantidad del Producto',
        ];

        $this->validate($request, $country, $message,$atributes);

        

        $datoscafeteria = request()->except(['_token', '_method']);
        cafeteria::where('id', '=', $id)->update($datoscafeteria);

        $cafeteria = cafeteria::findOrFail($id);
        //return view('cafeteria.edit', compact('cafeteria') ); 
        return redirect('cafeteria')->with('mensaje', 'Producto Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cafeteria  $cafeteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cafeteria::destroy($id);

        return redirect('cafeteria')->with('mensaje', 'Producto Borrado');
    }


}
