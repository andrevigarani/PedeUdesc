@extends('layouts.app')

@section('content')

<br>
<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <div class="container container-sm pt-5">
            <a href="{{ route('home') }}" class="btn btn-primary" style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>
            <form enctype="multipart/form-data" method="post" action="{{ route('user.order.payment.pix')  }}">
                @csrf
                <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Detalhes do Pagamento</b></h1>

                <center>
                    <h2>Valor</h2>
                    <p> R$ {{ $totalPrice }}</p>
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
</div>
<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top: 2.5cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>
</div>
@endsection