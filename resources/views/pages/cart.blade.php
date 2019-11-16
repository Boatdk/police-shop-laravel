@extends('layouts.default')
@section('content')

@include('includes.cart')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr class="table100-head">
                                    <th></th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="font-size: 12px;">
                               
                                  @foreach($product as $key => $products)
                                <tr>
                                    <td><img src="{{$products[0]->image}}" alt="" width="50px" height="20px"></td>
                                    <td><b>{{$cart[$key]->product_code}}</b></td>
                                    <td>{{$products[0]->name}}</td>
                                    <td><button class="btn m-3" onclick="decCart('{{$products[0]->code}}')"><i class="fa fa-minus-circle" style="color:red"></i></button>{{$cart[$key]->qty}}<button class="btn m-3" onclick="incCart('{{$products[0]->code}}')"><i class="fa fa-plus-circle"style="color:green"></i></button></td>
                                    <td>{{$cart[$key]->price}} ฿</td>
                                </tr>
                                  @endforeach                                 
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>ราคารวมทั้งหมด</td>
                                  <td>{{$sum}} ฿</td>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<script>
  function incCart(itemCode){
    var customerId = '<?= Session::get('id') ?>'
    $.ajax({
      type: 'post',
            dataType: 'json',
            url: 'http://localhost:8000/incCart/',
            data: {
              "_token": "{{ csrf_token() }}",
                itemCode: itemCode,
                customerId: customerId,
            },
            success: function(data, dataType, state){
              if(data.status == 1){
                window.location.href = ''
              }else if(data.status == 2){
                alert('สินค้ามีจำนวนจำกัด')
              }else{
                alert('ไม่สามารถเพิ่มสินค้าได้')
              }
            }          
    })
  }

  function decCart(itemCode){
    var customerId = '<?= Session::get('id') ?>'
    $.ajax({
      type: 'post',
            dataType: 'json',
            url: 'http://localhost:8000/decCart/',
            data: {
              "_token": "{{ csrf_token() }}",
                itemCode: itemCode,
                customerId: customerId,
            },
            success: function(data, dataType, state){
              if(data.status == 1){
                window.location.href = ''
              }
            }
    })
  }
</script>
@stop
