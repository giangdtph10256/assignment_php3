@section('title')
    Quản lí category
@endsection
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@extends("layout")

@section('contents')

    <div class="row mt-4">
        <div class="col-6">
             {{-- <a class="btn btn-success"
                href="{{ route('admin.categories.create') }}">Create</a> --}}
                <!-- Button trigger modal -->
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
                <form method="POST" id="form_create" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="mt-3">
                <label>Name</label>
                <input class="mt-3 form-control" placeholder="Nhập danh mục mới ..." type="text" name="name"  />
                @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
              </div>
                <div class="mt-3">
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
    <div class="col-6">
        <div class="container" style="float: right">
            <form action="{{ route('admin.categories.index') }}" method="GET">
                <div style="display: flex">                
                            <input class="form-control d-inline" placeholder="Nhập từ khóa ..." type="text" name="keyword" value="{{ old('keyword') }}" />
                            <button class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
</div>
    @if (!empty($data))
    <table class="table table-striped mt-4">
      <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Danh mục</th>
        <th scope="col" colspan="2">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>
          <a
              class="btn btn-primary"
              href="{{ route('admin.categories.edit', [ 'cate' => $item->id ]) }}">
              Cập nhật
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

                      <form method="POST" action="{{ route('admin.categories.delete', [ 'cate' => $item->id ]) }}">
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
@push('script')
        <script>
            $("#form_create").on('submit', function (event){
                event.prevenDefault();

                const url = "{ route('admin.categories.store')}";

                let name = $("form_create input[name='name']").val();
               
                let _token = $("form_create select[name='_token']").val();

                const data = (
                    _token,
                    name
                   
                );
                
                fetch(url, {
                    method: "POST",
                    body: json.stringify(data),
                    headers: {
                        "X-XSRF-TOKEN": _token,
                        "Content-Type": "application/json",
                         "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                    }
                })
                .then(Response => Response.json())
                .then(data => {
                    Console.log(data);
                    if (data.status == 200) {
                        window.location.reload()
                    }
                })
            })
        </script>
    @endpush