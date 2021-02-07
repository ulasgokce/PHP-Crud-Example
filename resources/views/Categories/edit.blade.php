@extends('master')

@section('content')
    <h1 class="text-center text-danger">
        Edit Category
    </h1>
    <br/>
    <form action='{{ route('categories.update', $category['id']) }}' method='POST' enctype='multipart/from-data'>
        @csrf
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <div>
                    <div class="form-group">
                        <label class="inputPassword">Category Name</label>
                        <input type="text" name="name" class="form-control input-lg"
                               placeholder="Bath" value="{{$category['name']}}">
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">Description</label>
                        <input type="text" name="description" class="form-control input-lg" placeholder="This is a bath"
                               value="{{$category['description']}}">
                    </div>
                    <div class="form-group" id="categories-group">
                        <label for="parent_id">Select a parent category</label>
                        <select class="js-example-basic-single " style="width: 100%" id="parent_id" name="parent_id">
                            <option value=0>It doesn't have any parent category</option>
                            @foreach($categories as $cat)
                                <option
                                    value="{{ $cat['id'] }}" {{$category['parent_id'] === $cat['id'] ? 'selected' : "" }}>{{$cat['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info form-control input-lg" id="save">Save</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
