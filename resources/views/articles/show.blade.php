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
                            <a href="{{route('articles.index')}}">Back to Articles</a>
                        </div>
                    </div>

                    <div class="card-body d-flex row">
                            <div class="card ml-2 mt-1" style="width: 14rem;">
                                <div class="card-body ">
                                    <h5 class="card-title">{{$article->title}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$article->excerpt}}</h6>
                                    <p class="card-text">{{$article->content}}</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
