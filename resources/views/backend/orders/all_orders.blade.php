@extends('inc_backend.index')
@section('content')
<h4 class="text-center">THE USER IS : {{Auth::User()->name}}</h4>
<hr>
<h1 class="text-center">ALL ORDERS</h1>
<br>
<div class="col-lg-12">
    <div class="card card-default">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">city</th>
                        <th scope="col">address</th>
                        <th scope="col">date</th>
                        <th scope="col">cost</th>
                        <th scope="col">status</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                        @php
                            $i=1;
                        @endphp


                    @foreach ($orders as $order) 
                    <tr>
                        <td scope="row">{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->cost}}</td>
                        <td>{{$order->status}}</td>
                        <td><a href="{{ route('all_orders.destroy', ['id'=>$order->id]) }}" class="btn btn-danger text-center">delete</a></td>
                    </tr>

                    @endforeach 

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection