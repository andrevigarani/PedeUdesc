@extends('layouts.app')

@section('content')

<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <a href="{{ route('home') }}" class="btn btn-primary"
            style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>

        <h1>Sacola de Produtos</h1>
        @foreach ($product as $clientId => $productBag)
        @foreach ($product as $p)
        <h2>Produto: {{ $p['id'] }}</h2>
        <!-- Exibir outras informações do produto -->
        @endforeach
        @endforeach
    </div>
</div>
</form>
@endsection