@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{__('Edit')}}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('articles.update',$article->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="al_desc">Albanian Description</label>
                                <textarea class="form-control"  name="al_desc" rows="2" placeholder="Albanian Description">{{$article->al_desc}}</textarea>
                                @error('al_desc')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tr_desc">Turkish Description</label>
                                <textarea class="form-control"  name="tr_desc" rows="2" placeholder="Turkish Description">{{$article->tr_desc}}</textarea>
                                @error('tr_desc')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Age</label>
                                <input class="form-control" type="text" name="age" placeholder="Age" value="{{$article->age}}">
                                @error('age')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Stock</label>
                                <input class="form-control" type="number" name="stock"  placeholder="Stock" value="{{$article->stock}}">
                                @error('stock')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="container d-flex justify-content-around">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Purchase Price</label>
                                    <input class="form-control" type="number" step="any" name="pur_price"  placeholder="Purchase Price" value="{{$article->pur_price}}">
                                    @error('pur_price')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Sale Price</label>
                                    <input class="form-control" type="number" step="any" name="sale_price"  placeholder="Sale Price" value="{{$article->sale_price}}">
                                    @error('sale_price')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <strong>Image:</strong>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div>
                                <button class="btn-lg btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
