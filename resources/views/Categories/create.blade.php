@extends('master')

@section('content')
    <h1 class="text-center text-danger">
        Add Category
        @if($message = Session::get('success'))
        <div class ='alert alert-success'>
        <p> {{$message}}</p>
        </div>
        @endif
    </h1>
    <br/>
    <form action='{{ route('categories.store') }}' method='POST' enctype='application/x-www-form-urlencoded'>
    @csrf
    <div class="row">
        <div class="col-md-12 ">
            <div>
                <div class="form-group">
                    <label class="inputPassword">Category Name</label>
                    <input type="text" name="name" class="form-control input-lg"
                           placeholder="Bath">
                </div>
                <div class="form-group">
                    <label class="inputPassword">Description</label>
                    <input type="text" name="description" class="form-control input-lg" placeholder="This is a bath">
                </div>
               <input id="toggle-event" default="false" type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger"> Is it a child Category ?</input>
                 <div class="form-group" id="categories-group">
                      <label for="parent_id">Select a parent category</label>
                       <select class="js-example-basic-single" style="width: 100%" id="parent_id"  name="parent_id">
                            <option selected value="{{0}}"></option>
                       @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{$category['name']}}</option>
                       @endforeach
                      </select>
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
            $(document).ready(function() {
                   $('#toggle-event').change(function() {
                       $('#categories-group').toggle()
                   });
            });
        </script>
@endsection
