@extends('master')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-danger text-center">Category</h1>
        </div>
        <hr/>
        <div class="col-12">
            <div class="row">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif
                <div class="col-md-12">
                    <br/>
                    <br/>
                    <table class="table table-striped table-bordered col-12">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Parent Category</th>
                            <th>Description</th>

                        </tr>
                        </thead>
                        @foreach($categories as $row)
                            <tr>
                                <td>{{$row['name']}}</td>
                                @foreach($categories as $parent)
                                @if($parent['id'] === $row['parent_id'])
                                <td >{{$parent['name']}}</td>
                                    @endif
                                @endforeach
                                @if( $row['parent_id']=== 0)
                                    <td>N/A</td>
                                @endif
                                <td>{{$row['description']}}</td>
                                <td><a href="categories/{{$row['id']}}/edit">Edit</a>/<a
                                        href="categories/{{$row['id']}}/destroy">delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
