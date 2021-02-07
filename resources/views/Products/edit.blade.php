@extends('master')

@section('content')
    <h1 class="text-center text-danger">
        Edit Product
    </h1>
    <br/>
    <form action='{{ route('products.update', $products['id']) }}' method='POST' enctype='multipart/from-data'>
        @csrf
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <div>
                    <div class="form-group">
                        <label class="inputPassword">Product Name</label>
                        <input type="text" name="name" class="form-control input-lg" placeholder="Sample Product Name"
                               value="{{$products['name']}}">
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">SKU</label>
                        <input type="text" name="sku" class="form-control input-lg" placeholder="THX-1138"
                               value="{{$products['sku']}}">
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">Price</label>
                        <input type="number" name="price" class="form-control input-lg" placeholder="35"
                               value="{{$products['price']}}">
                    </div>
                    <div class="form-group">
                        <label for="Categories">Categories</label>
                        <select class="js-example-basic-multiple " style="width: 100%" id="categories" multiple name="categories[]">
                            @foreach($products['categories'] as $category)
                                @foreach($categories as $cat)
                                   <option value="{{ $cat['id'] }}" {{$category === $cat['id'] ? 'selected' : "" }}>{{$cat['name']}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">Weight</label>
                        <input type="number" name="weight" class="form-control input-lg" placeholder="kg 1"
                               value="{{$products['weight']}}">
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">Type</label>
                        <input type="text" name="type" class="form-control input-lg" placeholder="physical"
                               value="{{$products['type']}}">
                    </div>
                    <button type="submit" class="btn btn-info form-control input-lg" id="save">Save</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
