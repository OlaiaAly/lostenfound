@extends('layouts.main')

@section('title', 'User Publisher')

@section('content')


<!-- section -->
<div class="innerpage_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Detais do Publicador</h2>
            </div>
        </div>
    </div>
</div>
<!-- end section -->


<div class="container">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="row mx-auto">
                <div id="" class="col-lg-3 col-md-6 col-sm-12 m-5">
                    <img class="rounded" src="/img/" alt="Problema com o carregamento da Imagem..">
                </div>

                <div id="" class="col-lg-3 col-md-6 col-sm-12 m-5">
                    <legend>Descrição do Item</legend>
                    <p>Name: {{$user['name']}}</p>
                    <p>Email: {{$user['email']}}</p>

                </div>
            </div>
        </div>
    </div>

</div>

@include('banermine')

@endsection