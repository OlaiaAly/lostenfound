@extends('layouts.main')

@section('title', 'HOME')

@section('content')

@include('carousel')


<div class="section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full center">
                    <div class="heading_main text_align_center">
                        <h2><span class="theme_color">NÓS PODEMOS </span> AJUDAR VOCÊ A RECUPERAR O ITEM PERDIDO </h2>
                        <p class="large">Crie a sua conta já!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- section -->
<div id="TnC" class="section layout_padding theme_bg">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-12 white_fonts">
                <h3 class="small_heading">Lostenfound</h3>
                <p>Ache o que procura!</p>
                <p class="text-justify ">
                    O primeiro produto que a Lostenfound oferece a Lostenfound Virtual Plataform,
                    plataforma virtual
                    que permite ue “perdedores” recuperem o item perdido através da plataforma, que possibilitará
                    contacto com os
                    “apanhadores” ambos tendo como ponte a plataforma. Tendo como plano de consistência o modelo de
                    negocia – comércio
                    virtual puro – e o modelo de renda – venda. No tipo de negócio enquadra-se na categoria e-commerce –
                    B2C.
                </p>


                <p class="text-justify">
                    A ideia da aplicação é prover uma plataforma virtual na qual os usuarios da
                    mesma podem publicar o
                    item perdido,
                    permitido deste modo a sua recuperação pelo legitimo proprietário. Criando analogia com a caixa de
                    achados e
                    perdidos normalmente disponibilizada em unidades publicas, como por exemplo, hospitais, Igrejas,
                    etc.
                </p>

                <p><a href="/AboutUs" class="hvr-radial-out button-theme">Sobre nós</a></p>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 white_fonts">
                <h3 class="small_heading">Termos de serviço</h3>
                <p>Os usuarios do site devem preecher corretamente os dados no formulário, em caso de dúvida, podem optar por meios disponibilizados no site para o contacoto.</p>
                <p>De frisar qu</p>

                <h3 class="small_heading">Privacidade</h3>
                <p> Todos os dados publicadaos nessa plataforma são protegidos e não serão divulgados ou partilhados em nunhuma outra plataforma, nem empresas de terceiros. </p>
            </div>



            
        </div>
    </div>
</div>


<!-- INCLUINDO BANNER -->
@include('banermine')

@endsection