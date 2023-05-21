@extends('layouts.app')

@section('content')

<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <a href="{{ route('home') }}" class="btn btn-primary"
            style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>

        <h1>Sacola de Produtos</h1>
        {{ json_encode($productBag) }}
        @foreach($productBag as $products)
            <p>Nome do Produto: {{ $product['name'] }}</p>
            <p>Preço: {{ $product['price'] }}</p>
            <p>Quantidade: {{ $product['quantity'] }}</p>
        @endforeach

    </div>
</div>
</form>
@endsection
