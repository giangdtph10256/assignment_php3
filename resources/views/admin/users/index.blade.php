@extends("layout")

@section('title')
    Quản lý user
@endsection

@section('contents')
    <div class="row mt-4">
        <div class="col-6">
            {{-- <a class="btn btn-success"
                href="{{ route('admin.users.create') }}">Create</a> --}}

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
                <form method="POST" id="form_create" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="mt-3">
                    <label>Name</label>
                    <input class="mt-3 form-control" type="text" name="name"/>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Email</label>
                    <input class="mt-3 form-control" type="email" name="email"/>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Address</label>
                    <input class="mt-3 form-control" type="text" name="address" />
                    @if ($errors->has('address'))
                        <span class="text-danger">{{$errors->first('address')}}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Password</label>
                    <input class="mt-3 form-control" type="password" name="password" />
                    @if ($errors->has('password'))
                    <span class="text-danger">{{$errors->first('password')}}</span>
                @endif
                </div>
            
                <div class="mt-3">
                    <label>Gender</label>
                    <select class="mt-3 form-control" name="gender">
                        <option></option>
                        <option
                            value="{{ config('common.user.gender.male') }}">
                            Male
                        </option>
                        <option
                            value="{{ config('common.user.gender.female') }}">
                            Female
                        </option>
                    </select>
                    @if ($errors->has('gender'))
                    <span class="text-danger">{{$errors->first('gender')}}</span>
                @endif
                </div>
                <div class="mt-3">
                    <label>Role</label>
                    <select class="mt-3 form-control" name="role">
                        <option></option>
                        <option
                            value="{{ config('common.user.role.user') }}">
                            User
                        </option>
                        <option
                            value="{{ config('common.user.role.admin') }}">
                            Admin
                        </option>
                    </select>
                    @if ($errors->has('role'))
                    <span class="text-danger">{{$errors->first('role')}}</span>
                @endif
                </div>
                <br>
                <div style="display: flex">
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
                <form action="{{ route('admin.users.index') }}" method="GET">
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
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Invoice No.</td>
                    <td>Gender</td>
                    <td>Role</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{$user->id }}</td>
                        <td>
                            <a>
                                {{$user->name }}
                            </a>
                        </td>
                        <td>{{$user->email }}</td>
                        <td>{{$user->address }}</td>
                        <td>{{$user->invoices->count() }}</td>
                        <td>{{$user->gender == config('common.user.gender.male') ? "Nam " : "Nữ" }}</td>
                        <td>{{$user->role == config('common.user.role.user') ? "User" : "Admin"}}</td>
                        <td>
                             <a
                                class="btn btn-primary"
                                href="{{ route('admin.users.edit', [ 'user' => $user->id ]) }}">
                                Update
                            </a>
                        
                            <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $user->id }}">Delete</button>

                            <div class="modal fade" id="confirm_delete_{{ $user->id }}" tabindex="-1" role="dialog">
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

                                        <form method="POST" action="{{ route('admin.users.delete', [ 'user' => $user->id ]) }}">
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

                const url = "{ route('admin.users.store')}";

                let name = $("form_create input[name='name']").val();
                let email = $("form_create input[name='email']").val();
                let address = $("form_create input[name='address']").val();
                let password = $("form_create input[name='password']").val();
                let gender= $("form_create select[name='gender']").val();
                let role = $("form_create select[name='role']").val();
                let _token = $("form_create select[name='_token']").val();

                const data = (
                    _token,
                    name,
                    email,
                    address,
                    password,
                    gender,
                    role
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