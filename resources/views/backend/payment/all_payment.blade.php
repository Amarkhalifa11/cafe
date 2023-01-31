@extends('inc_backend.index')
@section('content')
<h4 class="text-center">THE USER IS : {{Auth::User()->name}}</h4>
<hr>
<h1 class="text-center">ALL PAYMENT</h1>
<br>
<div class="col-lg-12">
    <div class="card card-default">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">order_id</th>
                        <th scope="col">trasaction_id</th>
                        <th scope="col">date</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                        @php
                            $i=1;
                        @endphp


                    @foreach ($payments as $payment) 
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td>{{$payment->order_id}}</td>
                        <td>{{$payment->trasaction_id}}</td>
                        <td>{{$payment->date}}</td>
                        <td><a href="{{ route('all_payment.destroy', ['id'=>$payment->id]) }}" class="btn btn-danger text-center">delete</a></td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection