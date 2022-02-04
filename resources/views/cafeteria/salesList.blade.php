@extends('layouts.app')
@section('content')
    <div class="container">
     

        <br>
        <a href="{{ url('sales') }} " class="btn - btn-success"> Registrar venta </a>
        <br>
        <br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Id del Producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->product_id }}</td>
                        <td>{{ $sale->quantity }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection