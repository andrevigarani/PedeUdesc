@extends('layouts.app')
@section('content')

    <div class="contact_section layout_padding">
        @csrf
        <a href="{{ route('home')}}" class="btn btn-primary" style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F;
                outline: none; border: none;">Voltar</a>

<h1>Sacola de Produtos</h1>

    @foreach ($productBag as $item)
        <div class="product">
            dd($productBag);
            </div>
        </div>
    @endforeach

    @if (empty($productBag))
        <p>A sacola está vazia.</p>
    @endif

    </div>

@endsection
