@extends('layouts.app')

@section('content')

<br>
<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <div class="container container-sm pt-5">
        <a href="{{ route('user.order.done')}}" class="btn btn-primary" style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>

            <form enctype="multipart/form-data" method="post" action="{{ route('user.order.evaluation.store') }}">
                @csrf
                <div class="row">

                <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Avaliar Pedido</b></h1>
                    <center>
                        <label> O que achou do pedido?</label><br><br>
                        <a href="javascript:void(0)" onclick="Avaliar(1)">
                            <img src="{{ asset('images/star0.png')}}" id="s1">
                            <input type="hidden" name="score" value="1">
                        </a>

                        <a href="javascript:void(0)" onclick="Avaliar(2)">
                            <img src="{{ asset('images/star0.png')}}" id="s2">
                            <input type="hidden" name="score" value="2">
                        </a>

                        <a href="javascript:void(0)" onclick="Avaliar(3)">
                            <img src="{{ asset('images/star0.png')}}" id="s3">
                            <input type="hidden" name="score" value="3">
                        </a>

                        <a href="javascript:void(0)" onclick="Avaliar(4)">
                            <img src="{{ asset('images/star0.png')}}" id="s4">
                            <input type="hidden" name="score" value="4">
                        </a>

                        <a href="javascript:void(0)" onclick="Avaliar(5)">
                            <img src="{{ asset('images/star0.png')}}" id="s5">
                            <input type="hidden" name="score" value="5">
                        </a>

                        <p id="score">0</p><br>

                        <input type="text" placeholder="Comentário" name="comment" style="width: 40%; padding: 10px; margin-bottom: 10px; background-color: #fafafa; border: 1px solid #ddd; border-radius: 4px;"><br><br>
                        
                        <button type="submit" class="btn btn-primary" style="text-align: center; background-color: #72DB8F;outline: none; border: none;
            font-size: 18px;">Salvar</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top:3cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>
</div>

@endsection

@section('star')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function Avaliar(estrela) {
    var url = window.location;
    url = url.toString()
    url = url.split("index.html");
    url = url[0];

    var s1 = document.getElementById("s1").src;
    var s2 = document.getElementById("s2").src;
    var s3 = document.getElementById("s3").src;
    var s4 = document.getElementById("s4").src;
    var s5 = document.getElementById("s5").src;
    var avaliacao = 0;

    if (estrela == 5){ 
    document.getElementById("s1").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s2").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s3").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s4").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s5").src = "{{ asset('images/star1.png')}}";
    avaliacao = 5;
    }
    //ESTRELA 4
    if (estrela == 4){ 
    document.getElementById("s1").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s2").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s3").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s4").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s5").src = "{{ asset('images/star0.png')}}";
    avaliacao = 4;
    } 

    //ESTRELA 3
    if (estrela == 3){ 
    document.getElementById("s1").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s2").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s3").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s4").src = "{{ asset('images/star0.png')}}";
    document.getElementById("s5").src = "{{ asset('images/star0.png')}}";
    avaliacao = 3;
    } 
    
    //ESTRELA 2
    if (estrela == 2){ 
    document.getElementById("s1").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s2").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s3").src = "{{ asset('images/star0.png')}}";
    document.getElementById("s4").src = "{{ asset('images/star0.png')}}";
    document.getElementById("s5").src = "{{ asset('images/star0.png')}}";
    avaliacao = 2;
    } 
    
    //ESTRELA 1
    if (estrela == 1){ 
    document.getElementById("s1").src = "{{ asset('images/star1.png')}}";
    document.getElementById("s2").src = "{{ asset('images/star0.png')}}";
    document.getElementById("s3").src = "{{ asset('images/star0.png')}}";
    document.getElementById("s4").src = "{{ asset('images/star0.png')}}";
    document.getElementById("s5").src = "{{ asset('images/star0.png')}}";
    avaliacao = 1;
    } 
    document.getElementById('score').innerHTML = avaliacao;
    
}
</script>

@endsection