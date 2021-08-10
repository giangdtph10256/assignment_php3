@extends("layout")

@section('title', 'Create Product')
@section('contents')
<h1>Thêm Sản Phẩm</h1>
<form method="POST" action="{{ route('admin.products.store' )}}" enctype="multipart/form-data">
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" />
        @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>
    <div>
        <label>Price</label>
        <input class="mt-3 form-control" type="number" name="price" />
        @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>
    <div>
        <label>Image</label>
        <input class="mt-3 form-control" type="file" name="image" />
        @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>
    <div>
        <label>Quantity</label>
        <input class="mt-3 form-control" type="number" name="quantity" />
        @error('quantity')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>
    <div>
        <label>Category ID</label>
        <select name="category_id" class="mt-3 form-control">
            @foreach($listCate as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        </div>
    

    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection