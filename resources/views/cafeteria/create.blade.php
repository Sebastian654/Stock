@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/cafeteria') }}" method="post" enctype="multipart/form-data">
@csrf
@include('cafeteria.form', ['modo'=>'Crear'])





</form>
</div>
@endsection