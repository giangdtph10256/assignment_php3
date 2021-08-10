@extends("layout")

@section('title', 'Edit Product')
@section('contents')
<form method="POST" action="{{ route('admin.products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" value="{{$product->name}}" type="text" name="name" />
        @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
    </div>
    <div>
        <label>Image</label>
        <input class="mt-3 form-control" value="{{$product->image}}" type="file" name="image" />
        <div >
            @if ($product->image)
            <img src="{{ asset('uploads/' . $product->image) }}" width="100px" height="150px">
            @endif
        </div>
        @if ($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                @endif
    </div>
    <div>
        <label>Price</label>
        <input class="mt-3 form-control" value="{{$product->price}}" type="text" name="price" />
        @if ($errors->has('price'))
                    <span class="text-danger">{{$errors->first('price')}}</span>
                @endif
    </div>
    <div>
        <label>Quantity</label>
        <input class="mt-3 form-control" value="{{$product->quantity}}" type="text" name="quantity" />
        @if ($errors->has('quantity'))
        <span class="text-danger">{{$errors->first('quantity')}}</span>
    @endif
    </div>
    <div>
        <label>Category ID</label>
        <select name="category_id" class="mt-3 form-control">
            @foreach($listCate as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
            @if ($errors->has('category_id'))
                    <span class="text-danger">{{$errors->first('category_id')}}</span>
                @endif
        </select>
    </div>

    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection