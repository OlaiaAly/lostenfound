@extends('layouts.main')

@section('title', 'Historico de pagamentos')

@section('content')


<!-- section -->
<div class="innerpage_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Historico de Pagamentos</h2>
            </div>
        </div>
    </div>
</div>
<!-- end section -->

<div class="col-md-10 offset-md-1 dashboard-title-container">

    <div class="m-y-5">
        <a class="btn btn-info my-3" style="float:right;" target="_self" role="button" href="/dashboard">Voltar</a>
    </div>

    <p id="msgId" class="alert alert-info" style="display:none;"></p>

    @if(count($payments) > 0)

    <table class="table bg-light m-y-3 table-hover table-condensed" style="overflow-x: scroll;">

        <thead>
            <tr>
                <th scope="col-sm-1">#</th>
                <th scope="col-sm-6">Id</th>
                <th scope="col-sm-4">Amount (USD)</th>
                <th scope="col-sm">Post ID</th>
                <th scope="col-sm">Status</th>
                <th scope="col-sm">Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $payments as $payment)
            <tr>
                <td scropt="row"> {{$loop->index+1}}</td>
                <td><a href="/publication/{{$payment->payment_id}}"> {{App\Models\Publication::findOrFail($payment->payment_id)->item}}</a></td>
                <td>{{$payment->amount}}</td>
                <td>{{ Publication::where($payment->post_id)}}</td>
                <td>{{$payment->payment_status}}</td>
                <td>{{$payment->created_at}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

    @else
        
    <div class="section layout_padding">
        <div class="center alert alert-info">Você ainda não tem pagamentos feitos!</div>
    </div>
    
    @endif
</div>


@include('banermine')

@endsection