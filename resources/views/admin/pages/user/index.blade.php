@extends('admin.admin')
@section('navbar_title', 'Danh sách tài khoản')
@section('navbar-right')
    {{-- <li>
        <a href="{{ route('admin_teacher/form') }}" style="padding:5px 5px">
            <button class="btn bg-info heading-btn" type="button">Tạo tài khoản</button>
        </a>
    </li> --}}
@endsection
@section('content')
    <div class="panel panel-flat">
        <table class="table table-hover" data-source="{{ route("{$controllerName}/dataList") }}" id="affiliateUsersDatatable"   >
            <thead>
               <tr>
                    <th>Thông tin</th>
                    <th class="d-none">Tên</th>
                    <th class="d-none">Email</th>
                    <th>Số điện thoại</th>
                    <th>Tổng hoa hồng</th>
                    <th>Số dư có thể rút</th>
                    <th>Trạng thái tài khoản</th>
                    <th></th>
                    <th class="d-none"></th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
@section('script_table')
@endsection
