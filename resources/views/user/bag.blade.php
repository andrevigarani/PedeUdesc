@extends('layouts.app')

@section('content')

<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <a href="{{ route('home') }}" class="btn btn-primary"
            style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>

        <h1>Sacola de Produtos</h1>
        @foreach($productBag as $clientId => $products)
            <h3>Cliente: {{ $clientId }}</h3>
                @foreach($products as $product)
                    <p>Nome do Produto: {{ $product['name'] }}</p>
                    <p>Preço: {{ $product['price'] }}</p>
                    <p>Quantidade: {{ $product['quantity'] }}</p>
                @endforeach
        @endforeach

    </div>
</div>
</form>
@endsection