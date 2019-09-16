@extends('layouts.default')
@section('content')

<div class="container">
    <div>
      <h4>Product management</h4>
    </div>
    <div class="form-control" style="margin: 10 10 10 10">
        <form method="post" action="{{url('addProduct')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>name</label>
                <input type="text" name="product_name" class="form-control">
            </div>
            <div class="form-group">
                <label>type</label>
                <input type="text" name="product_type" class="form-control">
            </div>
            <div class="form-group">
                <label>color</label>
                <input type="text" name="product_color" class="form-control">
            </div>
            <div class="form-group">
                <label>brand</label>
                <input type="text" name="product_brand" class="form-control">
            </div>
            <div class="form-group">
                <label>size</label>
                <input type="text" name="product_size" class="form-control">
            </div class="form-group">
            <div>
                <label>volume</label>
                <input type="text" name="product_volume" class="form-control">
            </div>
            <div class="form-group">
                <label>price</label>
                <input type="text" name="product_price" class="form-control">
            </div>
            <div class="form-group">
                <label>image</label>
                <input type="text" name="product_image" class="form-control">
            </div>
            <div class="form-group">
                <label>code</label>
                <input type="text" name="product_code" class="form-control">
            </div>
            <div class="from-group">
                <input type="submit" class="btn btn-primary" value="save">
            </div>
        </form>
    </div>
</div>
@stop
