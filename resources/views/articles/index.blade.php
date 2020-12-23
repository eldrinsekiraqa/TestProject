@extends('layouts.app')

@section('content')

    <div class="container">
        @include('toasts.toasts')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h4>{{ __('Products') }}</h4>
                        </div>
                        <div class="float-right">
                            <a href="{{route('articles.create')}}">Create Product</a>
                        </div>

                        <div class="mx-auto pull-right">
                            <div class="">
                                <form action="{{ route('articles.index') }}" method="GET" role="search">

                                    <div class="input-group">
                        <span class="input-group-btn mr-2">
                            <button class="btn btn-info" type="submit" title="Search projects">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                                        <input type="text" class="form-control mr-2" name="term" placeholder="Search articles" id="al_desc">
                                        <a href="{{ route('articles.index') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body d-flex row justify-content-around">
                        @foreach($myarticles as $myarticle)
                        <div class="card mt-1" style="width: 20rem;">
                            <img class="card-img-top" style="height: 150px" src="{{ URL::to('/') }}/images/{{ $myarticle->image }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-subtitle mb-4 text-muted"><strong>Pershkrimi ALB:</strong>&nbsp;<br>{{$myarticle->al_desc}}</h5>
                                <hr>
                                <h5 class="card-subtitle mb-4 text-muted"><strong>Pershkrimi TR:</strong>&nbsp;<br>{{$myarticle->tr_desc}}</h5>
                                <hr>
                                <h5 class="card-subtitle mb-4 text-muted"><strong>Mosha:</strong>&nbsp;<br>{{$myarticle->age}}</h5>
                                <hr>
                                <h5 class="card-subtitle mb-4 text-muted"><strong>In Stock:</strong>&nbsp;{{$myarticle->stock}}pcs</h5>
                                <hr>
                                <div class="container d-flex justify-content-around">
                                    <h4 style="color:red;">{{ $myarticle->pur_price }}€</h4>
                                    <h4 style="color: green;">{{ $myarticle->sale_price }}€</h4>
                                </div>
                                <div class="container d-flex justify-content-between mt-3">
                                    <a href="{{ route('articles.edit', $myarticle -> id)}}" class="btn btn-primary far fa-edit"></a>
                                    <form action="{{ route('articles.destroy',  $myarticle->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-danger">
                                            <span class="fas fa-trash-alt"></span>
                                         </button>
                                        </span>
                                    </form>
                                    <form method="POST" action="{{route('articles.reduceStock',$myarticle->id)}}">
                                        @csrf
                                        @method('PUT')
                                        @if($myarticle->stock == 0)
                                            <h5 style="margin-top: 5px; color: red;">Out of Stock</h5>
                                        @else
                                            <span class="input-group-btn">
                                        <button class="btn btn-success">
                                            <span class="fas fa-minus-circle"></span>
                                         </button>
                                        </span>
                                        @endif
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <h6 class="card-subtitle text-muted text-center">Article created by : <strong>{{$myarticle->user->name}}</strong></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
