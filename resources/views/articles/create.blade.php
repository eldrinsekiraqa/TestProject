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
                        <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="al_desc">Albanian Description</label>
                                <textarea class="form-control"  name="al_desc" rows="2" placeholder="Albanian Description">{{old('al_desc')}}</textarea>
                                @error('al_desc')
                                <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tr_desc">Turkish Description</label>
                                <textarea class="form-control"  name="tr_desc" rows="2" placeholder="Turkish Description">{{old('tr_desc')}}</textarea>
                                @error('tr_desc')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Age</label>
                                <input class="form-control" type="text" name="age" placeholder="Age" value="{{old('age')}}">
                                @error('age')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Stock</label>
                                <input class="form-control" type="number" name="stock"  placeholder="Stock" value="{{old('stock')}}">
                                @error('stock')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="container d-flex justify-content-around">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Purchase Price</label>
                                    <input class="form-control" type="number" step="any" name="pur_price"  placeholder="Purchase Price" value="{{old('pur_price')}}">
                                    @error('pur_price')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Sale Price</label>
                                    <input class="form-control" type="number" step="any" name="sale_price"  placeholder="Sale Price" value="{{old('sale_price')}}">
                                    @error('sale_price')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <strong>Image:</strong>
                                <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
                                @error('image')
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
