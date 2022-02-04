<h1> {{ $modo }} Producto </h1>
@if (count($errors)>0)

<div class="alert alert-danger" role="alert">
<ul>    
    @foreach ( $errors ->all() as $error )

   <li> {{ $error }} </li>
    
@endforeach
</ul>
</div>



@endif
<div class="form-group">
<label for="nameproduct">Nombre del producto</label>
<input  type="text" class="form-control" name="nameproduct" value="{{ isset($cafeteria->nameproduct)?$cafeteria->nameproduct:old('nameproduct') }}" id="nameproduct">

</div>

<div class="form-group">
<label for="reference">Referencia</label>
<input type="text" class="form-control" name="reference" value="{{ isset($cafeteria->reference)?$cafeteria->reference:old('reference') }}" id="reference">

</div>

<div class="form-group">
<label for="price">Precio</label>
<input type="text" class="form-control" name="price" value="{{ isset($cafeteria->price)?$cafeteria->price:old('price') }}" id="price">

</div>

<div class="form-group">
<label for="weight">peso</label>
<input type="text"  class="form-control" name="weight" value="{{ isset($cafeteria->weight)?$cafeteria->weight:old('weight') }}" id="weight">

</div>

<div class="form-group">
<label for="category">Categoria</label>
<input type="text" class="form-control" name="category" value="{{ isset($cafeteria->category)?$cafeteria->category:old('category') }}" id="category">

</div>

<div class="form-group">

<label for="stock">Cantidad</label>
<input type="text" class="form-control" name="stock" value="{{ isset($cafeteria->stock)?$cafeteria->stock:old('stock') }}" id="stock"> 


</div>
<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('cafeteria/') }}"> Regresar </a>
