@extends('layouts.app')

@section('content')

<div class="contact_section layout_padding">
    <div class="row">
        <div class="col-md-6" style="margin-top: 50px; margin-left:150px;">
            <a href="{{ route('home')}}" class="btn btn-primary" style="margin-left: -70px; text-decoration: none; color: white; background-color:#72DB8F;
                outline: none; border: none;">Voltar</a>
                
            <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Meus Pedidos</b></h1>

        </div>
        <div class="col-md-12">
            <div class="row">
                @foreach($orders as $order)
                <div class="col-md-4" style="margin-top: 2cm; margin-left: 4.5cm;">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">
                                    ID pedido</th>
                                <th style="padding: 10px; text-align: center; border-bottom: 1px solid #ddd; background-color: #f2f2f2; text-decoration: solid;">
                                    Data de criação</th>
                                <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">
                                    Tipo de pagamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ddd;">
                                    {{ $order->id }}
                                </td>
                                <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ddd;">
                                    {{ $order->created_at }}
                                </td>
                                <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ddd; margin-bottom:3cm;">
                                    @if($order->id_payment == 2)
                                    Pix
                                    @elseif($order->id_payment == 3)
                                    Dinheiro
                                    @elseif($order->id_payment == 1)
                                    Cartão
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="button-container" style="margin-top: 10px; text-align: center; margin-right: 1.5cm;">
                        <button class="btn btn-success py-2 px-3 rounded-4 accept-btn" style="font-size: large;background-color: red; border: red;" data-order-id="{{ $order->id }}" onclick="window.location.href = '{{ route('user.order.evaluation') }}'">Avaliar</button>
                        <p class="status-text" style="display: none;">
                            <strong class="accepted-text"></strong>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top:3cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.accept-btn').hide();

        if (localStorage.getItem('orderActions')) {
            var orderActions = JSON.parse(localStorage.getItem('orderActions'));

            orderActions.forEach(function(action) {
                var orderId = action.orderId;
                var accepted = action.accepted;

                var acceptButton = $('.accept-btn[data-order-id="' + orderId + '"]');
                var statusText = acceptButton.closest('.button-container').find('.status-text');
                var acceptedText = statusText.find('.accepted-text');

                acceptButton.hide();

                if (accepted) {
                    acceptedText.text('AVALIADO').addClass('green-text');
                }

                statusText.show();
            });
        }

        $('.order-table').each(function() {
            var statusText = $(this).closest('.col-md-4').find('.status-text');

            if (statusText.css('display') === 'none') {
                var acceptButton = $(this).closest('.col-md-4').find('.accept-btn');

                acceptButton.show();
            }
        });

        $('.accept-btn').click(function() {
            var orderId = $(this).data('order-id');
            var container = $(this).closest('.button-container');
            var acceptButton = container.find('.accept-btn');
            var statusText = container.find('.status-text');
            var acceptedText = statusText.find('.accepted-text');

            acceptButton.hide();
            acceptedText.text('AVALIADO').addClass('green-text');
            statusText.show();

            var orderActions = localStorage.getItem('orderActions') ? JSON.parse(localStorage.getItem(
                'orderActions')) : [];
            var action = {
                orderId: orderId,
                accepted: true
            };
            orderActions.push(action);
            localStorage.setItem('orderActions', JSON.stringify(orderActions));
        });
    });
</script>

<style>
    .hidden {
        display: none;
    }

    .green-text {
        color: green;
    }

    .red-text {
        color: red;
    }
</style>
@endsection