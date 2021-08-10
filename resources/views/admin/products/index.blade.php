@section('title')
    Quản lý products
@endsection
@extends("layout")
@section('contents')
{{-- <a class="btn btn-success"
                href="{{ route('admin.products.create') }}">Create</a> --}}
    <div class="row mt-4">
        <div class="col-6">
                <button class="btn btn-success" role="button" data-toggle="modal" data-target="#modal_create">Create</button>

                <div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" style="color: black" id="exampleModalLabel">Thêm mới người dùng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form method="POST" id="form_create" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Name</label>
                    <input class="mt-3 form-control" placeholder="Nhập tên sản phẩm mới..." type="text" name="name" />
                    @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
                </div>
                <div>
                    <label>Image</label>
                    <input class="mt-3 form-control" type="file" name="image" />
                    @if ($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                @endif
                </div>
                <div>
                    <label>Price</label> 
                    <input class="mt-3 form-control" placeholder="Nhập giá ..." type="text" name="price" />
                    @if ($errors->has('price'))
                    <span class="text-danger">{{$errors->first('price')}}</span>
                @endif
                </div>
                <div>
                    <label>Quantity</label>
                    <input class="mt-3 form-control" placeholder="Nhập số lượng ..." type="text" name="quantity" />
                    @if ($errors->has('quantity'))
            <span class="text-danger">{{$errors->first('quantity')}}</span>
        @endif
                </div>
                <div>
                    <label>Category ID</label>
                    <select name="category_id" class="mt-3 form-control">
                        <option></option>
                        @foreach($listCate as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        @if ($errors->has('category_id'))
            <span class="text-danger">{{$errors->first('category_id')}}</span>
        @endif
                    </select>
                    </div>
                <button class="mt-3 btn btn-primary">Create</button>
                <button type="reset" style="margin-top:16px; margin-left:20px" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
                </form>
                </div>
                <div class="modal-footer">
                </div>
                </div>
                </div>
                </div> 
        </div>

        <div class="col-6"></div>
    </div>
    @if (!empty($data))
        <table class="table table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Image</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Category_id</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{ asset('uploads/' . $item->image) }}" width="70" alt=""></td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->category_id }}</td>
                        <td>
                            <a
                                class="btn btn-primary"
                                href="{{ route('admin.products.edit', [ 'product' => $item->id ]) }}">
                                Update
                            </a>
                    
                            <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id }}">Delete</button>

                            <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Xác nhận xóa bản ghi này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                        <form method="POST" action="{{ route('admin.products.delete', [ 'product' => $item->id ]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Không có dữ liệu</h2>
    @endif
    @endsection
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>