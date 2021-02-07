@extends('master')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-danger text-center">Product</h1>
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
                            <th>ID</th>
                            <th>Product SKU</th>
                            <th>Stock Level</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($products as $row)
                            <tr>
                                <td>{{$row['id']}}</td>
                                <td>{{$row['sku']}}</td>
                                <td>@if($row['inventory_level'] < 0 )
                                        Stock is Available
                                    @elseif($row['inventory_level'] === 0)
                                        N/A
                                    @else
                                        {{$row['inventory_level']}}
                                    @endif
                                </td>
                                <td>{{$row['name']}}</td>
                                <td>{{$row['price']}}</td>
                                <td><a href="products/{{$row['id']}}/edit">Edit</a>/<a
                                        href="products/{{$row['id']}}/destroy">delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                     <div class="pagination">
                         <a href="?page={{1}}">&laquo;</a>
                         @for($i=1; $i<=$totalPages;$i++)
                                 <a href="?page={{$i}}">{{$i}}  </a>
                         @endfor
                         <a href="?page={{$totalPages-1}}">&raquo;</a>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection
