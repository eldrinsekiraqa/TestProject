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
                                <h5 class="card-title">{{$myarticle->title}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$myarticle->excerpt}}</h6>
                                <p class="card-text">{{$myarticle->content}}</p>
                                <a href="{{ route('articles.edit', $myarticle -> id)}}">Edit Article </a>
                            </div>
                        </div>
                        @endforeach
                    </div>                  
                </div>
            </div>
        </div>
    </div>
@endsection
