@extends('inc_backend.index')
@section('content')
<h4 class="text-center">THE USER IS : {{Auth::User()->name}}</h4>
<hr>
<h1 class="text-center">ALL PRODUCTS</h1>
<br>
<div class="col-lg-12">
    <div class="card card-default">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">image</th>
                        <th scope="col">category</th>
                        <th scope="col">type</th>
                        <th scope="col">category_id </th>
                        <th scope="col">price</th>
                        <th scope="col">sale_price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">description</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                        @php
                            $i=1;
                        @endphp


                    @foreach ($products as $product) 
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td>{{$product->name}}</td>
                        <td><img src="{{ asset('frontend/images/' . $product->image) }}" width="50" alt=""></td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->type}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->sale_price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->description}}</td>
                        <td><a href="{{ route('all_product.edit', ['id'=>$product->id]) }}" class="btn btn-primary text-center">edit</a></td>
                        <td><a href="{{ route('all_product.destroy', ['id'=>$product->id]) }}" class="btn btn-danger text-center">delete</a></td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection