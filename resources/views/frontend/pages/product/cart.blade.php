@extends('frontend.main')

@section('content')
   
        <h3 class="title-h3 cart-title">Giỏ hàng [1]</h3>
        <div class="cart-container">
            <table class="gio-hang" style="border-collapse:collapse;">
                <tbody>
                    <tr class="cart-header">
                        <td>Stt</td>
                        <td>Hình</td>
                        <td>Sản Phẩm</td>
                        <td>Số Lượng</td>
                        <td>Giá bán</td>
                        <td>Thành Tiền</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><img src="/upload/images/vai-ao-dai-3d-dat-in-1619746868.jpg" width="100"
                                alt="Vải áo dài 3D đặt in"></td>
                        <td>
                            <p>Vải áo dài 3D đặt in</p>
                            <p><strong>Mã SP:</strong> A27706-0B50-977</p>
                            <p style="margin-top:15px;"><a title="Xoá" href="/index.php?do=cart&amp;act=del&amp;id=12462"
                                    style="color:#999; font-weight:normal;"
                                    onclick="return confirm('Bạn có chắc muốn xoá?')"><img
                                        src="/images/site/xoasanpham.png">Xoá</a></p>
                        </td>
                        <td id="qtt0">
                            <input type="text" onkeypress="return OnlyNumber(event)" value="1" name="qt[]"
                                onchange="return ValidateQty('qtt0', 0)" style="width:30px; text-align:center;">
                            <input type="hidden" class="proId" value="12462">
                            <input type="hidden" class="proPri" value="195000">
                        </td>
                        <td>195,000 vnđ</td>
                        <td><strong id="subtotal0" style="color:#FF0000;">195,000 vnđ</strong></td>
                    </tr>
                    <tr class="cart-header">
                        <td colspan="5" style="text-align:right;">Tổng Cộng</td>
                        <td>
                            <span id="totalMoney" style="color:#FF0000;">195,000 vnđ</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">
                            <div> <a style="margin-left:10px;" class="chitiet-sp fr" href="/thanh-toan.html">Đặt Hàng</a><a
                                    class="chitiet-sp fr" href="http://vaiaodaiduyen.com/">Chọn Tiếp</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

@endsection
