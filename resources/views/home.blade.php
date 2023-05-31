@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/custom-carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.scss') }}">
<link rel="stylesheet" href="{{ asset('css/custom-styles.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="height: 100px; margin-top: 50px;">
                <img src="images/alunos_index.png" alt="Alunos na cantina UDESC" style="width: 100%;">
                <div class="sobre" style="position: absolute; margin-top:100px; margin-left: 25px;">
                    <img src="{{ asset('images/descricao_sobre.png.jpeg')}}">
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div style="margin-top: 450px; margin-bottom: 50px;text-align: center;">
        <h1 class="our_text" style="font-size: 40px;">LANCHES</h1>
        <p class="ipsum_text" style="font-size: 20px;">Satisfaça seu paladar com o melhor</p>
    </div>

    <div class="food-carousel">
        @foreach ($foods as $food)
        <div style="text-align: center;">
            <img src="data:image/png;base64, {{ $food->img }}" alt="{{ $food->name }}"
                style="width: 100%;">

            <a href="{{ route('user.add.bag', ['id' => $food['id']]) }}" class="btn btn-primary" style="color:
            white;text-align: center; margin-top: 5px; background-color: #72DB8F;outline: none; border: none; position:
            absolute; margin-top:-310px; margin-left: -145px;
            height:28px; font-size: 13px;">Adicionar à sacola</a>

            <h4 style="font-size: 25px;">{{ $food->name }}</h4>
            <p
                style="font-size: 18px;background-color: #72DB8F; padding: 5px; display: inline-block; border-radius: 50px;">
                R${{ $food->price }}
            </p>
        </div>
        @endforeach
    </div>

    <div style="margin-top: 200px; text-align: center;">
        <h1 class="our_text" style="font-size: 40px;">BEBIDAS</h1>
        <p class="ipsum_text" style="font-size: 20px;">Desfrute as diferentes opções</p>
    </div>

    <div class="food-carousel">
        @foreach ($drinks as $drink)
        <div style="text-align: center;">
            <img src="data:image/png;base64, {{ $drink->img }}" alt="{{ $drink->name }}"
                style="width: 100%;">

            <a href="{{ route('user.add.bag', ['id' => $drink['id']]) }}" class="btn btn-primary" style="color:
            white;text-align: center; margin-top: 5px; background-color: #72DB8F;outline: none; border: none; position:
            absolute; margin-top:-310px; margin-left: -145px;
            height:28px; font-size: 13px;">Adicionar à sacola</a>

            <h4 style="font-size: 25px;">{{ $drink->name }}</h4>
            <p
                style="font-size: 18px;background-color: #72DB8F; padding: 5px; display: inline-block; border-radius: 50px;">
                R${{ $drink->price }}
            </p>
        </div>
        @endforeach
    </div>

</div>

<div class="copyright_section">
    <div class="container" style="text-align: center;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>

    @endsection

    @push('other-scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('.food-carousel').slick({
            dots: true,
            autoplay: true,
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
    </script>
    @endpush
