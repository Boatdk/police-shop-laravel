@extends('layouts.table')
@section('content')

@include('includes.cart')
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">รหัสสินค้า</th>
                            <th class="column2">ชื่อสินค้า</th>
                            <th class="column3">ประเภท</th>
                            <th class="column2">ไซส์</th>
                            <th class="column4">ราคา</th>
                            <th class="column5">จำนวน</th>
                            <th class="column6">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $products)
                        <tr>
                            <td class="column1">{{$products->code}}</td>
                            <td class="column2">{{$products->name}}</td>
                            @if($products->type == 1)
                            <td class="column3">เสื้อ</td>
                            @elseif($products->type == 2)
                            <td class="column3">กางเกง</td>
                            @elseif($products->type == 3)
                            <td class="column3">รองเท้า</td>
                            @elseif($products->type == 4)
                            <td class="column3">อุปกรณ์</td>
                            @endif
                            <td class="column2">{{$products->size}}</td>
                            <td class="column4">{{$products->price}}</td>
                            <td class="column5">{{$products->volume}}</td>
                            <td class="column6">
                              <button class="btn btn-sm btn-primary">แก้ไข</button>
                              <button class="btn btn-sm btn-danger">ลบ</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('table/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('table/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('table/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('table/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('table/js/main.js')}}"></script>
