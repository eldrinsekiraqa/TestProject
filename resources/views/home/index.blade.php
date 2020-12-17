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
                    </div>

                    <div class="card-body d-flex row">
                        @foreach($articles as $article)
                        <div class="card ml-2 mt-1" style="width: 14rem;">
                            <div class="card-body ">
                                <a href="{{route('home.show',$article->id)}}"><h5 class="card-title">{{$article->title}}</h5></a>
                                <h6 class="card-subtitle mb-2 text-muted">{{$article->excerpt}}</h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

