<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use App\Models\cafeteria;
use PhpParser\Node\Expr\FuncCall;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cafeteria.sales');
    }


    public function getSales()
    {
        $datos['sales'] = Sales::paginate(6);
        return view('cafeteria/salesList',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = [
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',

        ];
        $message = [
            'required' => 'El :attribute es requerido',
            'numeric' => 'La :attribute es debe ser Numerico',
        ];


        $atributes = [
            'product_id' => 'id del Producto',
            'quantity' => 'cantidad del Producto',
        ];

        $this->validate($request, $params, $message, $atributes);

        $data = request()->except('_token');

        // busco el producto en la base de datos
        $product = cafeteria::findOrFail($request->product_id);

        if ($product->stock > 0) {
            // inserto la venta del producto
            $ins = Sales::insert($data);

            // resto el stock de la base de datos menos el stock del formulario
            $newStock = $product->stock - $request->quantity;

            // actualizo el nuevo stock
            cafeteria::where('id', $request->product_id)->update(['stock' => $newStock]);

            return redirect('sales')->with('mensaje', 'Producto vendido con Exito');
        }else{
            return redirect('sales')->with('mensaje', 'El producto no tiene stock, no es posible realizar la venta.');
        }
    }
}
