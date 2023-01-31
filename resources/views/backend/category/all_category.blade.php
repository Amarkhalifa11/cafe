@extends('inc_backend.index')
@section('content')
<h4 class="text-center">THE USER IS : {{Auth::User()->name}}</h4>
<hr>
<h1 class="text-center">ALL CATEGORY</h1>
<br>
<div class="col-lg-12">
    <div class="card card-default">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                        @php
                            $i=1;
                        @endphp


                    @foreach ($categorys as $category) 
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td>{{$category->name}}</td>
                        <td><a href="{{ route('add_category.edit', ['id'=>$category->id]) }}" class="btn btn-primary text-center">edit</a></td>
                        <td><a href="{{ route('add_category.destroy', ['id'=>$category->id]) }}" class="btn btn-danger text-center">delete</a></td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection