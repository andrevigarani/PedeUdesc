@extends('layouts.appAdmin')
@section('content')

<div class="contact_section layout_padding">
    <div class="row">
        <div class="col-md-6" style="margin-top: 50px; margin-left:150px;">
            <a href="{{ route('admin.home')}}" class="btn btn-primary" style="margin-left: -70px; text-decoration: none; color: white; background-color:#72DB8F;
                outline: none; border: none;">Voltar</a>
        </div>
        <center>
            <table class="order-table">
                <thead>
                    <tr>
                        <th
                            style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">
                            ID pedido</th>
                        <th
                            style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">
                            Data de criação</th>
                        <th
                            style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">
                            Tipo de pagamento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd;">
                            {{ $order->id }}
                        </td>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd;">
                            {{ $order->created_at }}
                        </td>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd;">
                            @if($order->id_payment == 2)
                            Pix
                            @elseif($order->id_payment == 3)
                            Dinheiro
                            @elseif($order->id_payment == 1)
                            Cartão
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </center>
    </div>
</div>

<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top:13cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>
    </form>
    @endsection