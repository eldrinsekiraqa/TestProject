@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h4>{{ __('Create Article') }}</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('articles.store')}}">
                            @csrf

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{old('title')}}">
                                @error('title')
                                <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Excerpt</label>
                                <textarea class="form-control"  name="excerpt" rows="1" placeholder="Excerpt">{{old('excerpt')}}</textarea>
                                @error('excerpt')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Content</label>
                                <textarea class="form-control" name="content" rows="3" placeholder="Content">{{old('content')}}</textarea>
                                @error('content')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <button class="btn-lg btn-primary" type="submit">Submit</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
