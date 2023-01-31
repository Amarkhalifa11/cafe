@extends('inc_backend.index')
@section('content')
<h4 class="text-center">THE USER IS : {{Auth::User()->name}}</h4>
<h4 class="text-center">COUNT USER IS : {{count($users)}}</h4>
<hr>
<h1 class="text-center">ALL USERS</h1>
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
                        <th scope="col">created at</th>
                    </tr>
                </thead>
                <tbody>
                        @php
                            $i=1;
                        @endphp


                    @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection