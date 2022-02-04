@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="alert alert-success alert-dismissible" role="alert">
            @if (Session::has('mensaje'))
                {{ Session::get('mensaje') }}
            @endif


                
        </div>        

        <br>
        <a href="{{ url('cafeteria/create') }} " class="btn - btn-success"> Registrar nuevo Producto </a>
        <a class="btn btn-primary" href="{{ url('/sales') }}">Registrar venta</a>
        <br>
        <br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nombre del Producto</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cafeterias as $cafeteria)

                    <tr>
                        <td>{{ $cafeteria->id }}</td>
                        <td>{{ $cafeteria->nameproduct }}</td>
                        <td>{{ $cafeteria->reference }}</td>
                        <td>{{ $cafeteria->price }}</td>
                        <td>{{ $cafeteria->weight }}</td>
                        <td>{{ $cafeteria->category }}</td>
                        <td>{{ $cafeteria->stock }}</td>
                        <td>

                            <a href="{{ url('/cafeteria/' . $cafeteria->id . '/edit') }}" class="btn btn-warning">
                                Editar

                            </a>


                            <form action="{{ url('/cafeteria/' . $cafeteria->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger " type="submit" onclick="return confirm('¿Quieres Borrar?')"
                                    value="Borrar">

                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
