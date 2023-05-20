@extends('layouts.app')
@section('content')

<form enctype="multipart/form-data" method="post" action="/bag/{{ $client->id }}'">
    @csrf
    @method('POST')

    <div class="contact_section layout_padding">
        <form enctype="multipart/form-data" method="get" action="{{ route('product.bag') }}">
            @csrf
            <a href="{{ route('admin.home')}}" class="btn btn-primary" style="margin-left: -70px; text-decoration: none; color: white; background-color:#72DB8F;
                outline: none; border: none;">Voltar</a>
            <h1>{{ $client->id }}</h1>
        </form>
</form>

@endsection