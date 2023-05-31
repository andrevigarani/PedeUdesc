@extends('layouts.app')

@section('content')

    <div class="contact_section layout_padding">
        <div class="contact_section layout_padding">
            <div class="row">
                <div class="col-md-6" style="margin-top: 50px; margin-left:150px;">
                    <a href="{{ route('home') }}" class="btn btn-primary"
                       style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>


                    <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Sacola de Produtos</b></h1>

                    @if($stockItems->isEmpty())
                        <p>Sua sacola de compras está vazia.</p>

                    @else
                        <table>
                            <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stockItems as $stockItem)
                                <tr>
                                    <td>{{ $stockItem->product->name }}</td>
                                    <td>{{ $stockItem->quantity }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    <center><a href="{{ route('user.order') }}" class="btn btn-primary"
                               style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Realizar Pedido</a></center>
                </div>
            </div>
        </div>
    </div>
@endsection
