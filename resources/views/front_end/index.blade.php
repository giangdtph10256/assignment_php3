<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GClothes - Trang chủ</title>
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
<!-- CSS only -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> --}}
<style type="text/css">body{   
  font-family:Arial, Helvetica, sans-serif;   
  font-size:12px;
  }
  .glyphicon {    
  margin-right:5px;
  }
  .thumbnail {    
  margin-bottom: 20px;    
  padding: 0px;   
  -webkit-border-radius: 0px; 
  -moz-border-radius: 0px;    
  border-radius: 0px;
  }
  .item.list-group-item { 
  float: left;   
  width: 100%;    
  background-color: #fff; 
  margin-bottom: 10px;
    
  }
  .item.list-group-item:nth-of-type(odd):hover, .item.list-group-item:hover { 
  background: #428bca;
  }
  .item.list-group-item .list-group-image {   
  margin-right: 10px;
  }
  .item.list-group-item .thumbnail {  
  margin-bottom: 0px;
  }
  .item.list-group-item .caption {    
  padding: 9px 9px 0px 9px;
  }
  .item.list-group-item:nth-of-type(odd) { 
  background: #eeeeee;
  }
  .item.list-group-item:before, .item.list-group-item:after { 
  display: table; content:"";
  }
  .item.list-group-item img { 
  float: left;
  }
  .item.list-group-item:after {   
  clear: both;
  }
  .list-group-item-text { 
  margin: 0 0 11px;
  }
  .container.aaa{
    display: flex;
  }
  </style>
</head>
<body>
 @include('front_end/navbar')

@include('front_end/home')

<div class="container"> 
  <h3> Sản phẩm mới</h3> 
  <div class="well well-sm text-right"> <strong>Chọn kiểu hiển thị</strong> 
   <div class="btn-group"> <a href="" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"> </span>Dạng danh sách</a> <a href="" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Dạng lưới</a> 
   </div> 
  </div> 
  @foreach ($product as $item)
  <div id="products" class="aaa" class="row list-group"> 
   <div class="item  col-xs-3 col-lg-3"> 
    <div class="thumbnail"> <img class="group list-group-image" src="{{$item->image}}" alt="Sản phẩm {{$item->id}}" width="300"> 
     <div class="caption"> 
      <h4 class="group inner list-group-item-heading">{{$item->name}}</h4> 
      <div class="row"> 
       <div class="col-xs-12 col-md-6"> 
        <p class="lead">{{$item->price}} đ</p> 
       </div> 
       <div class="col-xs-12 col-md-6"> <a class="btn btn-success" href="http://hocwebgiare.com/">Chi tiết</a> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div>
  @endforeach
 </div>
@include('front_end/footer')
<script type="text/javascript">
  $(document).ready(function(){
 
$('#itemslider').carousel({ interval: 3000 });
 
$('.carousel-showmanymoveone .item').each(function(){
var itemToClone = $(this);
 
for (var i=1;i<6;i++) {
itemToClone = itemToClone.next();
 
if (!itemToClone.length) {
itemToClone = $(this).siblings(':first');
}
 
itemToClone.children(':first-child').clone()
.addClass("cloneditem-"+(i))
.appendTo($(this));
}
});
});
 
  </script>
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- JavaScript Bundle with Popper -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
 <script type="text/javascript">
$(document).ready(function() {    
$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});    
$('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');
$('#products .item').addClass('grid-group-item');
});
});</script>
</body>
</html>



