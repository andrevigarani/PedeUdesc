@extends('layouts.app')
@section('content')

    <div class="contact_section layout_padding">
        @csrf
            <a href="{{ route('admin.home')}}" class="btn btn-primary" style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F;
                outline: none; border: none;">Voltar</a>

        <h1>Sacola de Produtos</h1>

       
        <ul>
            @foreach ($products as $product)
                <li>{{ $product['name'] }} - R$ {{ $product['price'] }}</li>
            @endforeach
        </ul>

        <p>A sacola está vazia.</p>

@endsection