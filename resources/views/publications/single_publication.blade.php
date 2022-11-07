@extends('layouts.main')

@section('title', 'Publications')

@section('content')


<!-- section -->
<div class="innerpage_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Descrição do Item</h2>
            </div>
        </div>
    </div>
</div>
<!-- end section -->



<div class="carousel-inner">
    <div class="carousel-item active text-center">
        <div class="row justify-content-center m-12">
            <div id="desc_wdt" class="col-sm-12 col-xs-12 my-1 text-center">
                <img class="rounded" src="/img/publications/{{$publication->picture}}"
                    alt="Problema com o carregamento da Imagem.." width="100%" onclick="openImage()" title="Clique na imgam para expandir!">

                <script>
                function openImage() {
                    window.open("/img/publications/{{$publication->picture}}");
                }
                </script>
                <small>Clique na imagem para expandir.</small>
            </div>

            <div id="" class="col-sm-12 col-xs-12  p-5 my-1 ">

                <h5 class="h2"><i class="font-weight-bold">Item</i>: {{$publication->item}}</h5>
                <p><span class="font-weight-bold">Referência do item:</span> {{$publication->reference}} (
                    @if($publication->type=='lost')
                    PERDIDO
                    @else
                    ACHADO
                    @endif
                    )
                </p>
                <p><i class="font-weight-bold">Província</i>: {{$publication->province}}</p>
                <p><i class="font-weight-bold">Cidade/Bairro</i>: {{$publication->city}}</p>
                <p><i class="font-weight-bold">Date da Publicação</i>:
                    {{date('d/m/Y -- H:i:s', strtotime($publication->created_at))}}</p>
                <p><i class="font-weight-bold">Data em que o item foi achado/perdido:</i>
                    {{date('d/m/Y -- H:i:s', strtotime($publication->date))}}</p>
                <div class="container">
                    <p class="font-weight-bold">Descrição</p>
                    <p id="desc_text">{{$publication->description}}</p>
                </div>
                <a href="/user/reveal/{{ $publication->id }}" class="btn btn-primary my-3">Revelar</a>
            </div>
        </div>
    </div>
</div>

@include('banermine')


@endsection