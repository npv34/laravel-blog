@extends('admin.master')
@section('page-title',' Sua thong tin nguoi dung')
@section('content')
    <div class="col-12 col-md-12 mt-4">
        <div class="card">
            <h5 class="card-header">Sua thong tin người dùng</h5>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên</label>
                        <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" disabled value="{{ $user->username }}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input name="email" value="{{ $user->email }}" type="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >Phone</label>
                        <input name="phone" value="{{ $user->phone }}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        <a href="{{ route('users.index') }}" class="btn btn-info">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
