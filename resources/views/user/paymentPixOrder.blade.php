@extends('layouts.app')

@section('content')

<br>
<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <a href="{{ route('home') }}" class="btn btn-primary" style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a><br>
        <form enctype="multipart/form-data" method="post" action="{{ route('user.order.payment.pix')  }}">
            @csrf
            <h1>Detalhes do Pagamento</h1>

            <p>Valor: R$ {{ $totalPrice }}</p>

            <center>
                <h2>Chave PIX</h2>
                <p>{{ $pixKey }}</p>
                <h2>QR Code PIX</h2>
                <img style="width:100px;" src="{{ asset('images/qrcode.png')}}"><br><br>

                <button type="submit" class="btn btn-primary" style="text-align: center; background-color: #72DB8F;outline: none; border: none;
            font-size: 18px;">Confirmar Pagamento</button>
            </center>
        </form>

    </div>
</div>

@endsection