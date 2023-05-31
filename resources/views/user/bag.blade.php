@extends('layouts.app')

@section('content')

    <div class="contact_section layout_padding">
        <div class="contact_section layout_padding">
            <div class="container container-sm pt-5">
                <div class="row">
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-primary"
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
                        <div class="text-center">
                            <a href="{{ route('user.order') }}" class="btn btn-success btn-outline-light m-0">Realizar Pedido</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
