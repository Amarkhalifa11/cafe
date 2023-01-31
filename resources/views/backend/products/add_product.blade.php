@extends('inc_backend.index')
@section('content')
<h4 class="text-center">THE USER IS : {{Auth::User()->name}}</h4>
<hr>
<h1 class="text-center">ADD PRODUCT</h1>
<br>

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
        </div>
        <div class="card-body">
            <form action="{{ route('all_product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">name</label>
                        <input type="text" name="name" class="form-control" id="validationServer01" placeholder="name" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">image</label>
                        <input type="file" name="image" class="form-control" id="validationServer01"  value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>


                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">category</label>
                        
                        <select class="form-control" name="category" id="validationServer01" value="" aria-label="Default select example" required>
                            <option selected>select one</option>
                            <option value="drink">drink</option>
                            <option value="cake">cake</option>
                          </select>


                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>






                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">type</label>
                        
                        <select class="form-control" name="type" id="validationServer01" value="" aria-label="Default select example" required>
                            <option selected>select one</option>
                            <option value="cofee">cofee</option>
                            <option value="juice">juice</option>
                            <option value="shoclate cake">shoclate cake</option>
                            <option value="white cake">white cake</option>
                          </select>

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">category id </label>
                        
                        <select class="form-control" name="category_id" id="validationServer01" value="" aria-label="Default select example" required>
                            <option selected>select one</option>
                            @foreach ($categorys as $category)
                            
                            <option value="{{$category->id}}">{{$category->id}}</option>

                            @endforeach
                          </select>
                        
                        
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">price </label>
                        <input type="text" name="price" class="form-control" id="validationServer01" placeholder="price" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">sale price </label>
                        <input type="text" name="sale_price" class="form-control" id="validationServer01" placeholder="sale_price" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>

                
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">quantity</label>
                        <input type="text" name="quantity" class="form-control" id="validationServer01" placeholder="quantity" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">description</label>
                        <textarea name="description" class="form-control" id="validationServer01" placeholder="description" value="" required></textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>




                <button class="btn btn-primary" type="submit">add product</button>
            </form>
        </div>
    </div>
</div>

@endsection