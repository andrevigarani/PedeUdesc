@extends('layouts.app')

@section('content')

<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <a href="{{ route('home') }}" class="btn btn-primary"
            style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>

                @foreach($stockItems as $stockItem)
                    <tr>
                        <td>{{ $stockItem->product->name }}</td>
                        <td>{{ $stockItem->product->quantity }}</td>
                        <td>{{ $stockItem->product->price }}</td>
                    </tr>
                @endforeach

                <p>Preço Total: {{ $totalPrice }}</p>
    </div>
    <div class="contact_section layout_padding">
        <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Forma de Pagamento</b></h1>

        
        <form enctype="multipart/form-data" method="post" action="/order/payment">
            @csrf
            @method('POST')

        <div>
            <input type="radio" id="payment_pix" name="payment_method" value="p">
            <label for="payment_pix">Pix</label>
        </div>

        <div>
            <input type="radio" id="payment_card" name="payment_method" value="c">
            <label for="payment_card">Cartão</label>
        </div>

        <div>
            <input type="radio" id="payment_money" name="payment_method" value="m">
            <label for="payment_pickup">Dinheiro</label>
        </div>

            <button type="submit" class="btn btn-primary" style="text-align: center; margin-top: 0cm; margin-left:8cm; background-color: #72DB8F;outline: none; border: none;
            font-size: 18px;">Confirmar Pedido</button>
        </form>
    </div>
</div>



@endsection