@extends('layouts.appAdmin')
@section('content')

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
                        <input type="radio" id="comida" name="type" value="c">
                        <label for="comida" style="margin-left: 5px; font-size: 15px;">Comida</label>

                        <input type="radio" id="bebida" name="type" value="b" style="margin-left: 5px;">
                        <label for="bebida" style="margin-left: 5px; font-size: 15px;">Bebida</label>
                    </div>
                </div>

                <div class="mail" style="margin-top: 0.5cm; pointer-events: auto;">
                    <input type="text" class="email-bt" placeholder="Nome" name="name" style="width: 60%; padding: 10px; margin-bottom: 10px; background-color: #fafafa; border: 1px solid #ddd; border-radius: 4px; pointer-events: auto;">

                    <input type="number" class="email-bt" placeholder="Valor" name="price" style="width: 60%; padding: 10px; margin-bottom: 10px; background-color: #f7f7f7; border: 1px solid #ddd; border-radius: 4px; pointer-events: auto;">

                    <input type="number" class="email-bt" placeholder="Quantidade" name="quantity" style="width: 60%; padding: 10px; margin-bottom: 10px; background-color: #f7f7f7; border: 1px solid #ddd; border-radius: 4px; pointer-events: auto;">
                </div>
            </div>

            <div class="col-md-7" style="margin-top: -3cm;">
                <input type="file" class="" name="img" style="margin-left: 23cm;">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="text-align: center; margin-top: 0cm; margin-left:8cm; background-color: #72DB8F;outline: none; border: none;
        font-size: 18px;">Cadastrar</button>
    </form>


</div>

<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top: 6.5cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>

    @endsection