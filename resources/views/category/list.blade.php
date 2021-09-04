[0:02 p. m., 4/9/2021] David Sena: <div class="row mb-3">
    <label for="category" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
    <select name="category" class="form-select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                {{ $product->category_id == $category->id ? "selected" : ""}}>
                {{ $category->name }}</option>
            @endforeach
          </select>
    </div>    
    @error('category')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
  </div>
[0:03 p. m., 4/9/2021] David Sena: @extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <a href="{{ route('category.form') }}" class="btn btn-primary">Nueva Marca</a>
    </div>
</div>
@if(Session::has('message'))
    <p class="alert alert-success">
        {{ Session::get('message') }}
    </p>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category -> name }}</td>
            <td>{{ $category -> description }}</td>
            <td>
                <a href="{{ route('category.form',['id'=>$category->id]) }}"class="btn btn-warning">Editar</a>
                <a href="{{ route('category.delete',['id'=>$category->id]) }}"class="btn btn-danger">Borrar</a>
            </td>          
        </tr>
        @endforeach
    </tbody>
</table>
@endsection