@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/custom-carousel.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="height: 100px;">
                <img src="images/alunos_index.png" alt="Alunos na cantina UDESC" style="width: 100%;">
                <div class="sobre" style="position: absolute; margin-top:100px; margin-left: 25px;">
                    <img src="images/descricao_sobre.png.jpeg">
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

    <div style="margin-top: 450px; text-align: center;">
        <h1 class="our_text" style="font-size: 40px;">LANCHES</h1>
        <p class="ipsum_text" style="font-size: 20px;">Satisfaça seu paladar com o melhor</p>
    </div>

    <div class="food-carousel">
        @foreach ($products as $product)
        <div style="text-align: center;">
            <img src="data:image/png;base64, {{ $product->img }}" alt="{{ $product->name }}" style="height: 300px;">
            <h4 style="font-size: 25px;">{{ $product->name }}</h4>
            <p style="font-size: 18px;">R$ {{ $product->price }}</p>
        </div>
        @endforeach
    </div>

    <div style="margin-top: 200px; text-align: center;">
        <h1 class="our_text" style="font-size: 40px;">BEBIDAS</h1>
        <p class="ipsum_text" style="font-size: 20px;">Desfrute as diferentes opções</p>
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
                arrows: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 7,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 5,
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