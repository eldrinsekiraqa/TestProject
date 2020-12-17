@extends('layouts.app')

@section('content')
    <div class="container">
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
                            <div class="card-body ">
                                <a href="{{route('articles.show', $myarticle->id)}}"><h5 class="card-title">{{$myarticle->title}}</h5></a>
                                <h6 class="card-subtitle mb-2 text-muted">{{$myarticle->excerpt}}</h6>

                                <div class="container d-flex justify-content-around">
                                     <a href="{{ route('articles.edit', $myarticle -> id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('articles.destroy',  $myarticle->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
