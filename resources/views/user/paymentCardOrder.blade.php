@extends('layouts.app')

@section('content')

<br>
<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <a href="{{ route('home') }}" class="btn btn-primary"
            style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a><br>

            <form enctype="multipart/form-data" method="post" action="{{ route('admin.product.store') }}">
        @csrf
        <div class="row">

                <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Cadastrar Cartão</b></h1>

                <div class="mail" style="margin-top: 0.5cm; pointer-events: auto;">
                    <input type="text" class="email-bt" placeholder="Nome" name="name" style="width: 60%; padding: 10px; margin-bottom: 10px; background-color: #fafafa; border: 1px solid #ddd; border-radius: 4px; pointer-events: auto;">

                    <input type="number" class="email-bt" placeholder="Valor" name="price" style="width: 60%; padding: 10px; margin-bottom: 10px; background-color: #f7f7f7; border: 1px solid #ddd; border-radius: 4px; pointer-events: auto;">

                    <input type="number" class="email-bt" placeholder="Quantidade" name="quantity" style="width: 60%; padding: 10px; margin-bottom: 10px; background-color: #f7f7f7; border: 1px solid #ddd; border-radius: 4px; pointer-events: auto;">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="text-align: center; margin-top: 0cm; margin-left:8cm; background-color: #72DB8F;outline: none; border: none;
        font-size: 18px;">Confirmar Pedido</button>
    </form>

    </div>
</div>

@endsection