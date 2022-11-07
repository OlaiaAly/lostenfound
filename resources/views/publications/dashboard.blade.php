@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')




<!-- section -->
<div class="innerpage_banner background_titles">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Minhas publicações</h2>
            </div>
        </div>
    </div>
</div>
<!-- end section -->

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <div class="m-y-5">
        <a class="btn btn-info my-3" style="float:right;" target="_self" role="button" href="/payment/historic">Historico de
            pagamentos</a>
    </div>

    <p id="msgId" class="alert alert-info" style="display:none;"></p>

    @if(count($publications) > 0)
    
    <table class="table bg-light m-y-3 table-hover table-condensed" style="overflow-x: scroll;">

        <thead>
            <tr>
                <th scope="col-sm">#</th>
                <th scope="col-sm-6">Nome</th>
                <th scope="col-sm-4">Referencia</th>
                <th scope="col-sm" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $publications as $publication)
            <tr>
                <td scropt="row"> {{$loop->index+1}}</td>
                <td><a href="/publication/{{ $publication->id }}">{{ $publication->item}}</a></td>
                <td>{{$publication->reference}}</td>
                <td class="text-center">
                    <a class="btn btn-info" href="/publication/edit/{{ $publication->id }}">
                        <ion-icon icon name="create-outline"></ion-icon> Editar
                    </a>

                    <form action="/publication/remove/{{ $publication->id }}" style="display: inline;" id="frm_del"
                        method="post">
                        @csrf
                        @method('DELETE')
                    </form>

                    <button class="btn btn-danger" id="#{{$loop->index+1}}">
                        <ion-icon name="trash_outline"></ion-icon>Delete
                    </button>
                    <script>
                    x = document.getElementById("msgId");
                    document.getElementById("#{{$loop->index+1}}").addEventListener("click", function() {

                        var txt;

                        if (confirm("Tem certeza que deseja eleminar? \n\t{{$publication->item}}")) {
                            document.getElementById('frm_del').submit();
                            txt = "You pressed OK!";
                        } else {
                            txt = "You pressed Cancel!";

                        }
                        x.innerHTML = txt;
                        x.style.display = "block";
                    });
                    </script>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    @else
        
    <div class="section layout_padding">
        <div class="center alert alert-info">Você ainda não tem pagamentos realizados!</div>
    </div>
    @endif
</div>

<!-- INCLUINDO BANNER -->
@include('banermine')

@endsection