@extends('layouts.app')

@section('content')

    <div class="container">
        @include('toasts.toasts')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h4>{{ __('Articles') }}</h4>
                        </div>
                        <div class="float-right">
                            <a href="{{route('articles.create')}}">Create Article</a>
                        </div>
                    </div>

                    <div class="card-body d-flex row">
                        @foreach($myarticles as $myarticle)
                        <div class="card ml-2 mt-1" style="width: 14rem;">
                            <img class="card-img-top" style="height: 150px" src="{{ URL::to('/') }}/images/{{ $myarticle->image }}" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">{{$myarticle->tr_desc}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">{{$myarticle->stock}}</h6>
                                <div class="container d-flex justify-content-around">
                                    <a href="{{ route('articles.edit', $myarticle -> id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('articles.destroy',  $myarticle->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <form method="POST" action="{{route('articles.reduceStock',$myarticle->id)}}">
                                        @csrf
                                        @method('PUT')
                                    <button class="btn btn-primary">Sold</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <h6 class="card-subtitle mb-2 text-muted">Created By : {{$myarticle->user->name}}</h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
