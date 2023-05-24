@extends('layouts.app')

@section('content')

<br>
<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <a href="{{ route('home') }}" class="btn btn-primary"
            style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a><br>

            <form enctype="multipart/form-data" method="post" action="{{ route('user.order.payment.card') }}">
        @csrf
        <div class="row">

            <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Cadastrar Cartão</b></h1>
                <center>
                    <input type="hidden" name="c" value="c">

                    <input type="text" placeholder="Número Cartão" name="card_number" style="width: 40%; padding: 10px; margin-bottom: 10px; background-color: #fafafa; border: 1px solid #ddd; border-radius: 4px;"><br>

                    <input type="text" placeholder="CPF Cartão" name="cpf_client" style="width: 40%; padding: 10px; margin-bottom: 10px; background-color: #fafafa; border: 1px solid #ddd; border-radius: 4px;"><br>

                    <input type="date" placeholder="Data de Expiração" name="card_expire_date" style="width: 40%; padding: 10px; margin-bottom: 10px; background-color: #fafafa; border: 1px solid #ddd; border-radius: 4px;"><br>

                    <input type="text" placeholder="CVV" name="cvv_card" style="width: 40%; padding: 10px; margin-bottom: 10px; background-color: #fafafa; border: 1px solid #ddd; border-radius: 4px;"><br>

                    <button type="submit" class="btn btn-primary" style="text-align: center; background-color: #72DB8F;outline: none; border: none;
        font-size: 18px;">Confirmar Pedido</button>
            </center>
        </div>
    </form>

    </div>
</div>

@endsection