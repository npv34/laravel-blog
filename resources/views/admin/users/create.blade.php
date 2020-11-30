@extends('admin.master')
@section('page-title',' Them moi nguoi dung')
@section('content')
    <div class="col-12 col-md-12 mt-4">
        <div class="card">
            <h5 class="card-header">Thêm mới người dùng</h5>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input name="email" type="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >Phone</label>
                        <input name="phone" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                        <a href="{{ route('users.index') }}" class="btn btn-info">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
