@extends('frontend.main')
@section('title', 'Đặt hàng thành công')
@section('navbar_title', 'Đặt hàng thành công')
@section('content')
    <div class="page-order">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-body text-center">
                    <h2>Đặt hàng thành công</h2>
                    <p> Cảm ơn quý khách {{$info_order['fullname'] ?? ""}} đã đặt hàng tại Website.</p>
                   <p> Đơn hàng của quý khách đã được tiếp nhận, chúng tôi sẽ xử lý trong khoảng thời gian sớm nhất.</p>
                   <a href="{{route('home/index')}}" class="btn btn-primary"> Về trang chủ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
