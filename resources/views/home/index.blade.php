@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h4>{{ __('Articles') }}</h4>
                        </div>
                    </div>

                    <div class="card-body d-flex row justify-content-around">
                        @foreach($articles as $article)
                            <div class="card mt-1" style="width: 20rem;">
                                <img class="card-img-top" style="height: 150px" src="{{ URL::to('/') }}/images/{{ $article->image }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-subtitle mb-4 text-muted"><strong>Pershkrimi ALB:</strong>&nbsp;<br>{{$article->al_desc}}</h5>
                                    <h5 class="card-subtitle mb-4 text-muted"><strong>Pershkrimi TR:</strong>&nbsp;<br>{{$article->tr_desc}}</h5>
                                    <h5 class="card-subtitle mb-4 text-muted"><strong>Mosha:</strong>&nbsp;<br>{{$article->age}}</h5>
                                    <h5 class="card-subtitle mb-4 text-muted"><strong>In Stock:</strong>&nbsp;{{$article->stock}}pcs</h5>
                                    <div class="container d-flex justify-content-around">
                                        <h5 style="color:red;">P.Price: {{ $article->pur_price }}€</h5>
                                        <h5 style="color: green;">S.Price: {{ $article->sale_price }}€</h5>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h6 class="card-subtitle text-muted text-center">Article created by : <strong>{{$article->user->name}}</strong></h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
