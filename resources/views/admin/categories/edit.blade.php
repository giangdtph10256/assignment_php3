@extends("layout")

@section('title', 'Edit Category')
@section('contents')
<form method="POST" action="{{ route('admin.categories.update',  ['cate' => $cate]) }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" value="{{$cate->name}}" type="text" name="name" />
        @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
    </div>
    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection