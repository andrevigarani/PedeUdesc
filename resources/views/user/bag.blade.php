@extends('layouts.app')

@section('content')

    @push('other-scripts')
        <script>

            let updateQuantity = function(idProduct, dir){
                let quantityProduct = parseInt($("#bagItems #quantityProduct"+idProduct).text());
                quantityProduct = (dir == 'A') ? ++quantityProduct : --quantityProduct;
                quantityProduct = (quantityProduct >= 0) ? quantityProduct : 0;
                $("#bagItems #quantityProduct"+idProduct).text(quantityProduct);
                $("#bagItems #formQuantityProduct"+idProduct).val(quantityProduct);

                $("#btnSubmit").prop('disabled', false);
            }


        </script>
    @endpush

    <div class="contact_section layout_padding">
        <div class="contact_section layout_padding">
            <div class="container container-sm pt-5">
                <div class="row">
                    <div id="bagItems" >
                        <a href="{{ route('home') }}" class="btn btn-primary" style="margin-left: 0px; text-decoration: none; color: white; background-color:#72DB8F; outline: none; border: none;">Voltar</a>


                        <form enctype="multipart/form-data" method="post" action="{{ route('user.update.bag') }}" style="float: right;">
                            @csrf

                            <table style="display: none;">
                                <tr>
                                    @foreach($bagItems as $bagItem)
                                        <td><input type="number" id="formQuantityProduct{{$bagItem->product_id}}" name="formQuantityProduct{{$bagItem->product_id}}" value={{ $bagItem->quantity }}></td>
                                    @endforeach
                                </tr>
                            </table>

                            <button id="btnSubmit" disabled type="submit" class="btn btn-primary" style="text-align: center; background-color: #72DB8F;outline: none; border: none; ;">Salvar Alterações</button>
                        </form>

                        <h1 class="contact_text" style="color: black; margin-top:30px;"><b>Sacola de Produtos</b></h1>

                        @if($bagItems->isEmpty())
                            <p>Sua sacola de compras está vazia.</p>

                        @else
                            <table class="table table-striped">
                                <thead class="text-center">
                                <th></th>
                                <th scope="col">Produto</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor</th>
                                </thead>
                                <tbody>
                                @php $total = 0 @endphp
                                @foreach($bagItems as $bagItem)
                                    <tr style="vertical-align: middle" class="text-center">
                                        <td style="width: 300px">
                                            <img src="data:image/png;base64, {{ $bagItem->product_image }}" alt="{{ $bagItem->product_name }}" style="width: 100%;">
                                        </td>
                                        <td>{{ $bagItem->product_name }}</td>
                                        <td>
                                            <span onclick="updateQuantity({{$bagItem->product_id}}, 'S')" style="margin-right: 20px; cursor: pointer;"><</span>
                                            <span id="quantityProduct{{$bagItem->product_id}}">{{ $bagItem->quantity }}</span>
                                            <span onclick="updateQuantity({{$bagItem->product_id}}, 'A')" style="margin-left: 20px; cursor: pointer;">></span>
                                        </td>
                                        <td>R$ {{ number_format($bagItem->sub_total,2) }}</td>
                                        @php $total += $bagItem->sub_total @endphp
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="bg-secondary bg-opacity-50">
                                    <td colspan="3">Total</td>
                                    <td class="text-center">R$ {{ number_format($total,2) }}</td>
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

<div class="copyright_section">
    <div class="container" style="text-align: center; margin-top: 6.5cm;">
        <p class="copyright_text">2023 All Rights Reserved. Design by MN Sistemas</a></p>
    </div>
</div>
@endsection
