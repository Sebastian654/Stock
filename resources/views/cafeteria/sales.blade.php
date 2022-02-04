@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Formulario de Venta </h1>
        @if (count($errors) > 0)

            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)

                        <li> {{ $error }} </li>

                    @endforeach
                </ul>
            </div>

        @endif
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
            </div>
        @endif
        <form action="{{ url('/sales/save') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nameproduct">Id del producto</label>
                <input type="text" class="form-control" name="product_id"
                    value="{{ isset($cafeteria->product_id) ? $cafeteria->product_id : old('product_id') }}"
                    id="product_id">

            </div>

            <div class="form-group">
                <label for="reference">Cantidad</label>
                <input type="text" class="form-control" name="quantity"
                    value="{{ isset($cafeteria->quantity) ? $cafeteria->quantity : old('quantity') }}" id="quantity">

            </div>

            <br>
            <input class="btn btn-success" type="submit" value="Guardar Venta">
            <a class="btn btn-primary" href="{{ url('/sales/list') }}">Listado de ventas</a>
            <a class="btn btn-warning" href="{{ url('/') }}">Listado de productos</a>
        </form>
    </div>
@endsection