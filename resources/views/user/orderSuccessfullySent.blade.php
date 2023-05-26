@extends('layouts.app')

@section('content')

<br>
<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <center>
            <h1>Seu pedido foi enviado com sucesso!</h1>

            <img style="width:200px;" src="{{ asset('images/check.png')}}"><br><br>

            <a href="{{ route('home') }}" class="btn btn-primary"
                style="text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Home</a><br>

        </center>
    </div>
</div>

<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top:3cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>
</div>

@endsection