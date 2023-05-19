@extends('layouts.appAdmin')
@section('content')

<form id="editProductForm" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')

    <a href="{{ route('admin.home')}}" class="edit-button">Voltar</a>
    <input type="text" name="name" value="{{ $product->name}}">
    <input type="number" name="price" value="{{ $product->price }}">
    <input type="number" name="price" value="{{ $product->quantity }}">
    <!-- Outros campos do produto -->

    <button type="submit">Salvar</button>
    <button type="submit">Remover</button>
</form>

@endsection