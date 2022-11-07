@extends('layouts.main')

@section('title', 'Revelando')

@section('content')


<!-- section -->
<div class="innerpage_banner background_titles my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Escolha o Método de Pagamento</h2>
            </div>
        </div>
    </div>
</div>
<!-- end section -->


<div class="innerpage_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="theme_color bluetitle text-center">Método de Pagamento</h2>
            </div>
        </div>
    </div>
</div>

<div class="row layout_padding">

    <div class="col-lg-12 text-center">
        <form action="{{url('charge')}}" method="post">
            <input type="text" name="amount" value="{{$price}}" id="paypal_form">
            <input type="text" name="publication_id" value="{{$publication_id}} " style="display: none;" />
            {{csrf_field()}}
            <div class="form-group">
                <img src="/img/paypal_btn.png" alt="Check out with PayPal" alt="Check out with PayPal">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Pay with PayPal" class="btn btn-primary m-t-3">
            </div>

    </div>
    </form>
</div>

</div>

@include('banermine')


@endsection