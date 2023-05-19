@extends('layouts.appAdmin')
@section('content')

<form enctype="multipart/form-data" method="post" action="/admin/product/update/{{ $product->id }}">
    @csrf
    @method('PUT')

    <div class="contact_section layout_padding">
        <form enctype="multipart/form-data" method="post" action="{{ route('admin.product.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6" style="margin-top: 50px; margin-left:150px;">
                    <a href="{{ route('admin.home')}}" class="btn btn-primary" style="margin-left: -70px; text-decoration: none; color: white; background-color:#72DB8F;
                outline: none; border: none;">Voltar</a>

                    <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Cadastrar produto</b></h1>

                    <div class="form-group">
                        <div class="radio-section">
                            <input type="radio" id="comida" name="tipo" value="comida">
                            <label for="comida" style="margin-left: 5px; font-size: 15px;">Comida</label>

                            <input type="radio" id="bebida" name="tipo" value="bebida" style="margin-left: 5px;">
                            <label for="bebida" style="margin-left: 5px; font-size: 15px;">Bebida</label>
                        </div>
                    </div>

                    <div class="mail" style="margin-top: 0.5cm; pointer-events: auto;">
                        <input type="text" name="name" value="{{ $product->name}}"
                            style="width: 60%; padding: 10px; margin-bottom: 10px; background-color: #fafafa; border: 1px solid #ddd; border-radius: 4px; pointer-events: auto;">

                        <input type="number" name="price" value="{{ $product->price }}"
                            style="width: 60%; padding: 10px; margin-bottom: 10px; background-color: #f7f7f7; border: 1px solid #ddd; border-radius: 4px; pointer-events: auto;">

                        <input type="number" name="quantity" value="{{ $product->quantity }}"
                            style="width: 60%; padding: 10px; margin-bottom: 10px; background-color: #f7f7f7; border: 1px solid #ddd; border-radius: 4px; pointer-events: auto;">
                    </div>
                </div>

                <div class="col-md-7" style="margin-top: -3cm;">
                    <input type="file" class="" name="img" style="margin-left: 23cm;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="text-align: center; margin-top: 0cm; margin-left:8cm; background-color: #72DB8F;outline: none; border: none;
        font-size: 18px;">Salvar</button>
        </form>

        <form enctype="multipart/form-data" method="post" action="/admin/product/delete/{{ $product->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary" style="text-align: center; margin-top: 0.5cm; margin-left:7.8cm; background-color: red;outline: none; border: none;
        font-size: 18px;">Remover</button>
        </form>

    </div>
</form>
<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top: 6.5cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>

    @endsection