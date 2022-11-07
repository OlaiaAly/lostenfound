@extends('layouts.main')

@section('title', 'Publications')

@section('content')

<!-- section -->
<div class="innerpage_banner background_titles">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> PUBLICAÇÕES</h2>
            </div>
        </div>
    </div>
</div>
<!-- end section -->



<div class="row ">
    <div class="col-lg-12  my-3">
        <form action="/publication" id="frm1" method="get">
            <div class="form-group text-center">
                <input type="text" name="seach" id="search" class="form-control p-3 d-inline font-weight-bold"
                    placeholder='Procurar...' value="{{$search}}" />
                <button type="submit" id="btn_search" class="btn btn-primary d-inline p-3"><i
                        class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<!-- end section -->


@if($search)
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full center">
                    <div class="heading_main text_align_center">
                        <h2><span class="h3">Buscando por: </span>{{$search}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- end section -->







<div id="card_box" class="row">
    <div class="col-lg-12 col-xm-12 ">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- The slideshow  -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        @foreach($publications as $publication )
                        <div id="demo-card" class="col-lg-3 col-md-4 col-sm-12 my-1">
                            <a href="/publication/{{$publication->id}}">
                                <div class="card">
                                    <img clas="card-img-top img-responsive"
                                        src="/img/publications/{{$publication->picture}}" alt="#">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$publication->item}}</h5>
                                        <p class="card-text">
                                            <small>
                                                {{ date('d/m/Y', strtotime($publication->created_at))}}
                                                <br>{{$publication->city}}
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>{{--ROW--}}
                </div>
            </div>
        </div>


        @if(count($publications) == 0 && $search == '' )
        <div class="section layout_padding">
            <div class="center alert alert-info">Não há publicaçães por exibir!</div>
        </div>
        @elseif(count($publications) == 0)
        <div class="section layout_padding">
            <div class="center alert alert-info">Nao foi possivel achar publicaçães com a referencia '{{$search}}'!
            </div>
        </div>
        @endif
    </div>
</div>
@endsection