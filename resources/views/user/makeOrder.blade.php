@extends('layouts.app')

@section('content')

    <div class="contact_section layout_padding">
        <div class="contact_section layout_padding">
            <div class="container container-sm pt-5">
                <div class="row">
                    <div>
                        <a href="{{ route('user.show.bag') }}" class="btn btn-primary"
                           style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>


                        <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Sacola de Produtos</b></h1>

                        @if($bagItems->isEmpty())
                            <p>Sua sacola de compras está vazia.</p>

                        @else
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Produto</th>
                                    <th scope="col" class="text-center">Quantidade</th>
                                    <th scope="col" class="text-center">Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($total = 0)
                                @foreach($bagItems as $bagItem)
                                    <tr>
                                        <td>{{ $bagItem->product_name }}</td>
                                        <td class="text-center">{{ $bagItem->quantity }}</td>
                                        <td class="text-center">R$ {{ $bagItem->sub_total }}</td>
                                        @php($total += $bagItem->sub_total)
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="bg-secondary bg-opacity-50">
                                    <td>Total</td>
                                    <td class="text-center" colspan="2">R$ {{ $total }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact_section layout_padding">
        <div class="container container-sm pt-5">
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


                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-success btn-outline-light m-0" style=" background-color: #72DB8F; font-size: 18px;">Confirmar Pedido</button>
                </div>
            </form>
        </div>
    </div>

    <div class="copyright_section">
        <div class="container" style="text-align: center; margin-top:3cm;">
            <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
        </div>
    </div>
@endsection
