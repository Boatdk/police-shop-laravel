@extends('layouts.default')
@section('content')
<div class="blank" style="text-align: center">
    <h3>จัดการสินค้า</h3>
</div>
<div class="container blank" style="margin-top:10px;">
    <div class="form-control" style="margin: 10 10 10 10">
        <div style="text-align:center;">
            <h4>เพิ่มสินค้า</h4>
        </div>
        <form method="post" action="{{url('addProduct')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>ชื่อสินค้า</label>
                <input type="text" name="product_name" class="form-control">
            </div>
            <div class="form-group">
                <div>
                    <label>ประเภทสินค้า</label>
                </div>
                <select name="product_type">
                    <option value="0">กรุณาเลือกประเภท</option>
                    <option value="1">เสื้อ</option>
                    <option value="2">กางเกง</option>
                    <option value="3">รองเท้า</option>
                    <option value="4">อุปกรณ์</option>
                </select>
            </div>
            <div class="form-group">
                <div><label>สี</label></div>

                <select name="product_color">
                    <option value="0">กรุณาเลือกสี</option>
                    <option value="1">ดำ</option>
                    <option value="2">กรม</option>
                    <option value="3">ทราย</option>
                    <option value="4">เขียว</option>
                    <option value="5">เทา</option>
                </select>
            </div>
            <div class="form-group">
                <label>แบรนด์</label>
                <input type="text" name="product_brand" class="form-control">
            </div>
            <div class="form-group">
                <label>ขนาด</label>
                <input type="text" name="product_size" class="form-control">
            </div class="form-group">
            <div>
                <label>จำนวน</label>
                <input type="text" name="product_volume" class="form-control">
            </div>
            <div class="form-group">
                <label>ราคา</label>
                <input type="text" name="product_price" class="form-control">
            </div>
            <div class="form-group">
                <div>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
            <div class="from-group">
                <input type="submit" class="btn btn-primary" value="save">
            </div>

        </form>
        {{-- <div class="form-group" style="margin-top:10px;">
            <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">อัพโหลด</button>
            </div>
        </div>

        </form>
    </div> --}}

</div>
</div>
@stop
