@extends('layouts.app')

@section('content')

<div class="contact_section layout_padding">
    <div class="contact_section layout_padding">
        <a href="{{ route('home') }}" class="btn btn-primary"
            style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a><br>
        <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Realizar Pedido</b></h1>

        <center>
            <table class="order-table">
                <thead>
                    <tr>
                        <th
                            style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">
                            Nome</th>
                        <th
                            style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">
                            Quantidade</th>
                        <th
                            style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">
                            Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stockItems as $stockItem)
                    <tr>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd;">
                            {{ $stockItem->product->name }}
                        </td>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd;">
                            {{ $stockItem->product->quantity }}
                        </td>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd;">
                            {{ $stockItem->product->price }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <p><b>Preço Total:</b> {{ $totalPrice }}</p>
        </center>

    </div>
    <div class="contact_section layout_padding">
        <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Forma de Pagamento</b></h1>


        <form enctype="multipart/form-data" method="get" action="{{ route('user.order.payment') }}">
            @csrf
            @method('POST')

            <div>
                <input type="radio" id="payment_pix" name="payment_method" value="2">
                <label for="payment_pix">Pix</label>
            </div>

            <div>
                <input type="radio" id="payment_card" name="payment_method" value="1">
                <label for="payment_card">Cartão</label>
            </div>

            <div>
                <input type="radio" id="payment_money" name="payment_method" value="3">
                <label for="payment_pickup">Dinheiro</label>
            </div>

            <center><button type="submit" class="btn btn-primary" style="text-align: center; background-color: #72DB8F;outline: none; border: none;
            font-size: 18px;">Confirmar Pedido</button></center>
        </form>
    </div>
</div>

<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top:3cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>
</div>
@endsection