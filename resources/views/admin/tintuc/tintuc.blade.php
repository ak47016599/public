
@extends('admin.layout.index')
@section('NoiDung')
<style>
        .pagination a {
            text-decoration: none;
            text-transform: none; 
            font-size : 18px;
            color : black;
            position: relative;
            top : 5px;
        }
        .pagination li{
            float : left;
            text-decoration: none;
            text-transform: none; 
            background: white ;
            list-style: none; 
            border : 1px solid silver;
            width : 40px;
            height : 40px;
            text-align: center;
        }
        .active{
            background: blue !important;
            color : white;
        }
        .pagination {
          z-index : 999 !important;
        }
        .alert-error {
    background: pink;
    width: 100%;
    height : 40px;
    text-align: center;
    padding-top: 8px;
    color : red;
  }
    </style>
<h1> Danh Sách Tin Tức </h1>
    <a href="them"> <button type="button" class="btn btn-success">Thêm Tin Tức</button> </a>
    
    <div class="search-product">
       <form method="GET" action="">
           <center><h5> Tìm Kiếm Tin Tức</h5></center>
           <input value="" name="search_id" type="number" class="form-control" placeholder="Enter Your Key Search Id product" id="id_seach">
           <input value="" name="search_name" type="text" class="form-control" placeholder="Enter Your Key Search Name product" id="name_searche">
            <div style="clear : both"></div>
            <span> </span><br/>
           <button type="submit" class="btn btn-dark">Tìm Kiếm</button>
           <div style="float:right; margin : 12px 12px 0px 0px" class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
       Phân Loại Tin Tức
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="product_edit.php?action=1">Sản phẩm bán chạy</a>
      <a class="dropdown-item" href="product_edit.php?action=2">Sản phẩm mua nhiều nhất</a>
    </div>
</div>
           </form>
    </div>
 
    @if(session('thongbao'))
 <div style="background : greenyellow" class="alert-error">
              <span> 
                    {{session('thongbao')}}
              </span>
         </div>
 @endif
  <table class="table table-bordered">
    <thead>
      <tr style="text-align : center">
         <th> Id<Dth>
        <th>Ảnh</th>
        <th>Tiêu Đề</th>
      
        <th>Loại Tin</th>
        <th>Thể Loại</th>
        <th>Nổi bật</th>
        <th>Lượt xem</th>
        <th>Copy</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
     
    <!--  <tr>
      <td> 1</td>
        <td><img src="" width="120" height="80"/></td>
        <td>hfhfhf</td>
      
        <td>hfhfhf</td>
        <td><center><a href="product.php?id="><button type="button" class="btn btn-primary">Copy</button> </a></center></td>
        <td> <center><a href="sua"><button type="button" class="btn btn-warning">Sửa</button> </a> </center></td>
        <td> <center> <button onclick="deleteStudent()" type="button" class="btn btn-danger">Xóa</button></center></td>
      </tr> -->
      @foreach($tintuc as $value)
      <tr>
      <td> {{$value->id}}</td>
        <td><img src="{{ asset($value->Hinh) }}" width="120" height="80"/></td>
        <td>{{$value->TieuDe}}</td>
        <td>{{$value->loaitinFunction->Ten}}</td>
        <td>{{$value->loaitinFunction->theloaiFunction->Ten}}</td>
        <td>@if($value->NoiBat == 1) 
             Đáng chú ý
            @endif
            @if($value->NoiBat == 2) 
            Tin Hót
           @endif</td>
            </td>
        <td>{{$value->SoLuotXem}} Lượt</td>
        <td><center><a href="product.php?id="><button type="button" class="btn btn-primary">Copy</button> </a></center></td>
        <td> <center><a href="sua/{{$value->id}}"><button type="button" class="btn btn-warning">Sửa</button> </a> </center></td>
        <td> <center> <a href="xoa/{{$value->id}}"> <button  type="button" class="btn btn-danger">Xóa</button></a></center></td>
      </tr>
      @endforeach
      {!! $tintuc->links()!!}
       <h6 style="float: right;
         margin-right : 12px "> Có tất cả <i>000</i> Sản Phẩm trên <i>000</i> trang</h6>
    </tbody>
  </table>
 
@endsection