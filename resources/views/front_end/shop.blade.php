<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
<style>
.productbox {
    background-color:#ffffff;
	padding:10px;
	margin-bottom:10px;
	-webkit-box-shadow: 0 8px 6px -6px  #999;
	   -moz-box-shadow: 0 8px 6px -6px  #999;
	        box-shadow: 0 8px 6px -6px #999;
}

.producttitle {
    font-weight:bold;
	padding:5px 0 5px 0;
}

.productprice {
	border-top:1px solid #dadada;
	padding-top:5px;
}

.pricetext {
	font-weight:bold;
	font-size:1.4em;
}
  </style>
@include('front_end/navbar')
<br>
<div class="row">
    <div class="col-md-3">
      <ul class="list-group">
        <li class="list-group-item active" aria-current="true">Danh mục</li>
        @foreach ($category as $item)
        <li class="list-group-item"><li class="list-group-item"><a href="{{ route('cate-pro', ['id'=>$item->id])}}">{{$item->name}}</a></li>
      </li>
        @endforeach
      </ul>
      <ul>
        <li><a href="{{route('fillter')}}?price=1">Giá từ 1.000.000đ</a></li>
        <li><a href="{{route('fillter')}}?price=2">Giá từ 1.000.000đ đến 2.000.000đ</a></li>
      </ul>
      <ul>
        <form action="">
          <div id="slider-range"></div>
        </form>
      </ul>
    </div>
  
    <div class="col-md-9">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <!------ Include the above in your HEAD tag ---------->
      @foreach ($product as $item)
      <div class="col-md-2 column productbox">
          <img src="{{ asset('uploads/' . $item->image) }}" class="img-responsive">
          <div class="producttitle">{{$item->name}}</div>
          <div class="productprice"><div class="pull-right"><a href="{{route('detail', ['id'=>$item->id])}}" class="btn btn-danger btn-sm" role="button">Chi tiết</a></div><div class="pricetext">{{$item->price}}</div></div>
      </div>
      @endforeach
    </div>
</div>
<br>

@include('front_end/footer')
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
