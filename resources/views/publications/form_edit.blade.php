@extends('layouts.main')

@section('title', 'Editando: '.$publication->item)

@section('content')

<div class="publication_form col-md-6 offset-md-3 my-3" >
    <h2><span class="theme_color bluetitle">Editando a publição: </span> <span
            class="bluetitle">{{$publication->item}}</span></h2>

    <form action="/publication/update/{{$publication->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group form-control ">
            <label for="picture" class="">Image:
                <p>Carregue a Imagem...</p>
                <input type="file" name="picture" id="picture" class="form-control-file" />
            </label>
            <img src="/img/publications/{{$publication->picture}}" alt="{{$publication->item}}" class="img-preview">
        </div>


        <div class="form-gruop form-control">
            <p>Voce acheu ou perdeu o item?</p>
            <p><small>Eu...</small></p>
            <label for="found" class="form-control">
                <input id="found" type="radio" name="type" value="found" checked>Achei o item
            </label>

            <label for="lost" class="form-control">
                <input id="lost" type="radio" name="type" value="lost" checked>Perdi o item
            </label>

        </div>

        <div class="form-group">
            <label for="item">Item</label>
            <input type="text" name="item" id="item" max="10" value="{{$publication->item}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="date">Data em que o item foi achado</label>
            <!--$publication->date->date('Y-m-d') -->
            <input type="date" name="date" id="date" max="10" value="" required class="form-control" />
        </div>

        <div class="form-group">
            <label for="province">Provincia</label>
            <input type="text" name="province" id="province" max="10" value="{{$publication->province}}"
                class="form-control" />
        </div>

        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" name="city" id="city" value="{{$publication->city}}" class="form-control"/>
        </div>



        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" cols="30" rows="6"
                class="form-control">{{$publication->description}}</textarea>
        </div>

        <button class="btn btn-primary w-35 mx-auto">Save</button>
    </form>
</div>

@include('banermine')


@endsection