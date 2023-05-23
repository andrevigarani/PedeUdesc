@extends('layouts.app')

@section('content')

<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <a href="{{ route('home') }}" class="btn btn-primary"
            style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>

            <h1>Detalhes do pagamento</h1>

            <p>Valor: R$ {{ $totalPrice }}</p>

            <h2>QR Code PIX</h2>
            <img src="{{ $qrcode }}">

    </div>
</div>

@endsection