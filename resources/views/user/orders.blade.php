@extends('layouts.app')

@section('content')

    <div class="contact_section layout_padding">
        <div class="contact_section layout_padding">
            <div class="container container-sm pt-5">
                <div class="row">
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-primary" style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>


                        <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Meus Pedidos</b></h1>

                        @if($orders->isEmpty())
                            <p>Nenhum pedido efetuado.</p>

                        @else
                            <table class="table table-striped">
                                <thead class="text-center">
                                <th scope="col">ID Pedido</th>
                                <th scope="col">Data Pedido</th>
                                <th scope="col">Tipo Pagamento</th>
                                </thead>
                                <tbody>
                                
                                @foreach($orders as $order)
                                    <tr style="vertical-align: middle" class="text-center">
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                        @if($order->id_payment == 2)
                                        Pix
                                        @elseif($order->id_payment == 3)
                                        Dinheiro
                                        @elseif($order->id_payment == 1)
                                        Cartão
                                        @endif
                                        </td>
                                        <td class="bg-secondary bg-opacity-50 text-center"> Avaliar</td>
                                </tbody>
                                @endforeach
                                
                                
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top: 6.5cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>
</div>
@endsection
