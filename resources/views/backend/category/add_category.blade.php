@extends('inc_backend.index')
@section('content')
<h4 class="text-center">THE USER IS : {{Auth::User()->name}}</h4>
<hr>
<h1 class="text-center">ADD CATEGORY</h1>
<br>

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
        </div>
        <div class="card-body">
            <form action="{{ route('add_category.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">name</label>
                        <input type="text" name="name" class="form-control" id="validationServer01" placeholder="category name" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>

                <button class="btn btn-primary" type="submit">add category</button>
            </form>
        </div>
    </div>
</div>

@endsection