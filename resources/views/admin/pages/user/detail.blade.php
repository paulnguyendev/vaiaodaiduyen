@extends('admin.admin')
@section('navbar_title', 'Thông tin tài khoản')
@section('navbar-right')
    <li>
        <a href="{{ route("{$controllerName}/index") }}" style="padding:5px 0px 5px 5px">
            <button class="btn btn-default heading-btn" type="button">Hủy</button>
        </a>
    </li>
   
@endsection
@section('content')
    <form role="form">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default" id="affiliateBox">
                    <div class="panel-heading">
                        <h6 class="panel-title">Thông tin affiliate</h6>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">Tổng hoa hồng:</label>
                            <b>{{$total_balance}}</b>
                        </div>
                        <div class="form-group">
                            <label for="">Số dư hiện tại:</label>
                            <b>{{$available_balance}}</b>
                        </div>

                        <div class="form-group">
                            <label>Link Affiliate:</label>
                            <a target="_blank"
                                href="{{$aff_link}}">{{$aff_link}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" id="userBox">
                    <div class="panel-heading">
                        <h6 class="panel-title">Thông tin khách hàng</h6>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Họ tên:</label>
                                <input type="text" disabled="" value="{{$user->name ?? ""}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại:</label>
                                <input type="text" disabled="" value="{{$user->phone ?? ""}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="text" disabled="" value="{{$user->email ?? ""}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Ngày đăng ký:</label>
                                <input type="text" disabled="" value="{{$user->created_at ?? ""}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default" id="affiliateBank">
                    <div class="panel-heading">
                        <h6 class="panel-title">Thông tin ngân hàng</h6>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">Ngân hàng:</label>
                        </div>
                        <div class="form-group">
                            <label for="">Chi nhánh:</label>
                        </div>
                        <div class="form-group">
                            <label for="">Chủ tài khoản:</label>
                        </div>
                        <div class="form-group">
                            <label for="">Số tài khoản:</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#orderBonusTab" data-toggle="tab">Danh sách đơn hàng đã giới
                                        thiệu</a></li>

                                <li><a href="#withdrawlTab" data-toggle="tab">Lịch sử rút tiền</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="orderBonusTab">
                                    <table class="table table-hover" data-source="http://anhnnd.s1.loveitop.com/admin/affiliate/users/6/orders/datatable" id="orderProfit">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Người mua</th>
                                                <th>Ngày đặt hàng</th>
                                                <th>Giá trị đơn hàng</th>
                                                <th>Hoa hồng</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="tab-pane" id="withdrawlTab">
                                    <table class="table table-hover" data-source="http://anhnnd.s1.loveitop.com/admin/affiliate/users/6/transactions/datatable" id="transactionHistory">
                                        <thead>
                                            <tr>
                                                <th>Ngày giờ</th>
                                                <th>Loại giao dịch</th>
                                                <th>Số tiền</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
