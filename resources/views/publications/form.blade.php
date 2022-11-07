@extends('layouts.main')

@section('title', 'Publication Form')

@section('content')


	<!-- section --> 
    <div class="innerpage_banner background_titles">
	      <div class="container">
		     <div class="row"> 
			    <div class="col-md-12">
				   <h2>Preenchimento do Formulário</h2>
				</div>
			 </div>
		  </div>
	   </div>
	<!-- end section -->



<div class="publication_form col-md-6 offset-md-3">
    <h2><span class="theme_color bluetitle"></span></h2>
    <form action="/publication/store/" method="post" enctype="multipart/form-data">
        @csrf
        <fieldset class="m-3">
            <caption>Formulario do Item</caption>

            <div class="form-gruop form-control">
                <p>Tipo de publição<br /> <small>Voce perdeu ou achou o item...<br/>Eu ...</small></p>
                <label for="found" class="form-control">
                    <input id="found" type="radio" name="type" value="found" checked > Achei o item
                </label>

                <label for="lost" class="form-control">
                    <input id="lost" type="radio" name="type" value="lost" style="font-weight: normal;"> Perdi o item
                </label>

            </div>

            <div class="form-group">
                <label for="item">Item</label>
                <input type="text" class="form-control" name="item" id="item" max="10" />
            </div>

            <div class="form-group">
                <label for="date">Data em que o item foi achado</label>
                <input type="date" name="date" id="date" max="10" class="form-control" />
            </div>

            <div class="form-group">
                <label for="province">Provincia</label>
                <input type="text" name="province" id="province" max="10" class="form-control" />
            </div>

            <div class="form-group">
                <label for="desc_id">Cidade/Bairro</label>
                <input type="text" name="city" id="city" class="form-control" />
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="picture">Image: </label>
                <p>Carregue a Imagem...</p>
                <input type="file" name="picture" id="picture" class="form-control-file" required />
            </div>
            <button class="m-y-3 btn btn-primary">Save</button>
        </fieldset>
    </form>
</div>

@include('banermine')

@endsection