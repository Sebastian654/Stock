@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/cafeteria/'.$cafeteria->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('cafeteria.form',['modo'=>'Editar'])
    
    
</form>
</div>
@endsection

