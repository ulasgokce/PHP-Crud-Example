@extends('master')

@section('content')
    <h1 class="text-center text-danger">
        Add Product
        @if($message = Session::get('success'))
        <div class ='alert alert-success'>
        <p> {{$message}}</p>
        </div>
        @endif
    </h1>
    <br/>
    <form action='{{ route('products.store') }}' method='POST' enctype='application/x-www-form-urlencoded'>
    @csrf
    <div class="row">
        <div class="col-md-12 ">
            <div>
                <div class="form-group">
                    <label class="inputPassword">Product Name</label>
                    <input type="text" name="name" class="form-control input-lg"
                           placeholder="Sample Product Name">
                </div>
                <div class="form-group">
                    <label class="inputPassword">SKU</label>
                    <input type="text" name="sku" class="form-control input-lg" placeholder="THX-1138">
                </div>
                <div class="form-group">
                    <label class="inputPassword">Price</label>
                    <input type="number" name="price" class="form-control input-lg" placeholder="TL 35">
                </div>
                 <div class="form-group">
                      <label for="Categories">Categories</label>
                       <select class="js-example-basic-multiple " style="width: 100%" id="categories" multiple name="categories[]">
                       @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{$category['name']}}</option>
                       @endforeach
                      </select>
                   </div>
                 <div class="form-group">
                       <label class="inputPassword">Weight</label>
                       <input type="number" name="weight" class="form-control input-lg" placeholder="kg 1">
                 </div>
                 <div class="form-group">
                        <label class="inputPassword">Type</label>
                        <input type="text" name="type" class="form-control input-lg" placeholder="physical">
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
