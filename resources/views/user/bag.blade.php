@extends('layouts.app')

@section('content')

    <script>
        function updateQuantity(id_product) {
            $.ajax({
                type: 'POST',
                url: '/bag',
                data: function(){
                    return {
                        '_token' : <?php echo csrf_token() ?>,
                        'id_product' : id_product,
                        'quantity' : id_product
                    };
                },
                success:function(data) {
                    console.log("alou");
                }
            });
        }
    </script>

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
                                    <th scope="col">Produto</th>
                                    <th scope="col" class="text-center">Quantidade</th>
                                    <th scope="col" class="text-center">Valor</th>
                                </thead>
                                <tbody>
                                @php $total = 0 @endphp
                                @foreach($bagItems as $bagItem)
                                    <tr>
                                        <td>{{ $bagItem->product_name }}</td>
                                        <td class="text-center">
                                            <span onclick="updateQuantity({{ $bagItem->id_product }}, 'S')" style="margin-right: 20px"><</span>
                                            <span>{{ $bagItem->quantity }}</span>
                                            <span onclick="updateQuantity({{ $bagItem->id_product }}, 'A')" style="margin-left: 20px">></span>
                                        </td>
                                        <td class="text-center">R$ {{ $bagItem->sub_total }}</td>
                                        @php $total += $bagItem->sub_total @endphp
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
                            <a href="{{ route('user.order') }}"  class="btn btn-primary btn-success btn-outline-light m-0" style=" background-color: #72DB8F; font-size: 18px;">Realizar Pedido</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
