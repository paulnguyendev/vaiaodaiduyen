<div class="header">
    <div class="hcontent">
        <div>
            <a class="logo" href="{{route('home/index')}}" title="vaiaodaiduyen.com">
                <img src="{{asset('imgroup')}}/upload/images/logo.png" title="vaiaodaiduyen.com" height="100" style="margin-top:10px"
                    alt="vaiaodaiduyen.com" />
            </a>
        </div>
        <div class="right-top-box">
            <div class="top-cart">
                <a title="Xem giỏ hàng" href="/xem-gio-hang.html">[0] Sản phẩm</a>
            </div>
            <p class="cl"></p>
            <div class="top-search">
                <form onsubmit="return SearchGoogle();" action="#">
                    <input type="text" id="search-key" value="Từ khoá"
                        onfocus="if (this.value == 'Từ khoá') {this.value = '';}"
                        onblur="if (this.value == '') {this.value = 'Từ khoá';}" />
                    <input type="submit" id="search-button" value="" />
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var touch = $('#touch-menu');
            var menu = $('.navi');
            $(touch).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
            $(window).resize(function() {
                var w = $(window).width();
                if (w > 768 && menu.is(':hidden')) {
                    menu.removeAttr('style');
                }
            });
        });
    </script>
    <div id="ddsmoothmenu" class="ddsmoothmenu">
        <!-- <a id="touch-menu" class="mobile-menu" href="#"><i class="icon-reorder"></i>Menu</a> -->
        <ul class="navi hiddenmobile">
            <li class="first"><a class="active" href="/" title="TRANG CHỦ">TRANG CHỦ</a></li>
            <li><a href="/vai-ao-dai/" title="VẢI ÁO DÀI ĐẸP">VẢI ÁO DÀI ĐẸP</a>
                <ul>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-3d-dat-in/" title="VẢI ÁO DÀI 3D ĐẶT IN">VẢI ÁO DÀI
                            3D ĐẶT IN</a>
                    </li>
                    <li> <a href="/vai-ao-dai/ao-dai-cuoi-hoi-da-hoi/" title="VẢI ÁO DÀI CƯỚI HỎI, DẠ HỘI">VẢI
                            ÁO DÀI CƯỚI HỎI, DẠ HỘI</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-theu/" title="VẢI ÁO DÀI THÊU">VẢI ÁO DÀI
                            THÊU</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-ve/" title="VẢI ÁO DÀI VẼ">VẢI ÁO DÀI VẼ</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-dinh-da-ket-cuom/"
                            title="VẢI ÁO DÀI ĐÍNH ĐÁ, KẾT CƯỜM">VẢI ÁO DÀI ĐÍNH ĐÁ, KẾT
                            CƯỜM</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-lua/" title="VẢI ÁO DÀI LỤA">VẢI ÁO DÀI
                            LỤA</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-lua-tron/" title="VẢI ÁO DÀI LỤA TRƠN">VẢI ÁO
                            DÀI LỤA TRƠN</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-lua-thun/" title="VẢI ÁO DÀI LỤA THUN">VẢI ÁO
                            DÀI LỤA THUN</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-nhung-dap-nhung/" title="VẢI ÁO DÀI ĐẮP NHUNG">VẢI ÁO
                            DÀI ĐẮP NHUNG</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-gam/" title="VẢI ÁO DÀI GẤM">VẢI ÁO DÀI
                            GẤM</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-cach-tan/" title="VẢI ÁO DÀI CÁCH TÂN">VẢI ÁO DÀI
                            CÁCH TÂN</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-ao-dai-me-va-be/" title="VẢI ÁO DÀI MẸ VÀ BÉ">VẢI ÁO DÀI
                            MẸ VÀ BÉ</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-quan-ao-dai/" title="VẢI QUẦN ÁO DÀI">VẢI QUẦN ÁO
                            DÀI</a>
                    </li>
                    <li> <a href="/vai-ao-dai/vai-vay-ao-dam-186/" title="VẢI VÁY, ÁO, ĐẦM">VẢI VÁY, ÁO,
                            ĐẦM</a>
                    </li>
                </ul>
            </li>
            <li><a href="/ao-dai-may-san/" title="ÁO DÀI MAY SẴN">ÁO DÀI MAY SẴN</a>
                <ul>
                    <li> <a href="/ao-dai-may-san/ao-dai-in-3d-may-san/" title="ÁO DÀI IN 3D MAY SẴN">ÁO DÀI
                            IN 3D MAY SẴN</a>
                    </li>
                    <li> <a href="/ao-dai-may-san/ao-dai-mau-tron-may-san/" title="ÁO DÀI MÀU TRƠN MAY SẴN">ÁO DÀI MÀU
                            TRƠN MAY SẴN</a>
                    </li>
                    <li> <a href="/ao-dai-may-san/ao-dai-cach-tan-may-san/" title="ÁO DÀI CÁCH TÂN MAY SẴN">ÁO DÀI CÁCH
                            TÂN MAY SẴN</a>
                    </li>
                </ul>
            </li>
            <li><a href="/chon-vai-ao-dai/" title="CÁCH CHỌN VẢI ÁO DÀI">CÁCH CHỌN VẢI ÁO DÀI</a>
            </li>
            <li><a href="/chia-se-lam-dep/" title="LÀM ĐẸP">LÀM ĐẸP</a>
            </li>
            <li><a href="/tin-tuc-su-kien/" title="SỰ KIỆN">SỰ KIỆN</a>
            </li>
            <li><a href="/dich-vu-cat-may-ao-dai/" title="HỖ TRỢ">HỖ TRỢ</a>
            </li>
            <li><a href="/lien-he/" title="LIÊN HỆ">LIÊN HỆ</a>
            </li>
        </ul>
    </div>
    <div class="column">
        <div id="dl-menu" class="dl-menuwrapper">
            <button class="dl-trigger" style="text-align: right;font-size: 19px; color: #FFF;padding-right: 15px;">
                Menu</button>
            <ul class="dl-menu">
                <li class="first"><a class="active" href="/" title="TRANG CHỦ">TRANG CHỦ</a>
                </li>
                <li><a href="/vai-ao-dai/" title="VẢI ÁO DÀI ĐẸP">VẢI ÁO DÀI ĐẸP</a>
                    <ul class="dl-submenu">
                        <li> <a href="/vai-ao-dai/vai-ao-dai-3d-dat-in/" title="VẢI ÁO DÀI 3D ĐẶT IN">VẢI ÁO
                                DÀI 3D ĐẶT IN</a>
                        </li>
                        <li> <a href="/vai-ao-dai/ao-dai-cuoi-hoi-da-hoi/"
                                title="VẢI ÁO DÀI CƯỚI HỎI, DẠ HỘI">VẢI ÁO DÀI CƯỚI HỎI, DẠ
                                HỘI</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-theu/" title="VẢI ÁO DÀI THÊU">VẢI ÁO DÀI
                                THÊU</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-ve/" title="VẢI ÁO DÀI VẼ">VẢI ÁO DÀI VẼ</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-dinh-da-ket-cuom/"
                                title="VẢI ÁO DÀI ĐÍNH ĐÁ, KẾT CƯỜM">VẢI ÁO DÀI ĐÍNH ĐÁ, KẾT
                                CƯỜM</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-lua/" title="VẢI ÁO DÀI LỤA">VẢI ÁO DÀI
                                LỤA</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-lua-tron/" title="VẢI ÁO DÀI LỤA TRƠN">VẢI
                                ÁO DÀI LỤA TRƠN</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-lua-thun/" title="VẢI ÁO DÀI LỤA THUN">VẢI
                                ÁO DÀI LỤA THUN</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-nhung-dap-nhung/" title="VẢI ÁO DÀI ĐẮP NHUNG">VẢI
                                ÁO DÀI ĐẮP NHUNG</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-gam/" title="VẢI ÁO DÀI GẤM">VẢI ÁO DÀI
                                GẤM</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-cach-tan/" title="VẢI ÁO DÀI CÁCH TÂN">VẢI ÁO
                                DÀI CÁCH TÂN</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-ao-dai-me-va-be/" title="VẢI ÁO DÀI MẸ VÀ BÉ">VẢI ÁO
                                DÀI MẸ VÀ BÉ</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-quan-ao-dai/" title="VẢI QUẦN ÁO DÀI">VẢI QUẦN
                                ÁO DÀI</a>
                        </li>
                        <li> <a href="/vai-ao-dai/vai-vay-ao-dam-186/" title="VẢI VÁY, ÁO, ĐẦM">VẢI VÁY, ÁO,
                                ĐẦM</a>
                        </li>
                    </ul>
                </li>
                <li><a href="/ao-dai-may-san/" title="ÁO DÀI MAY SẴN">ÁO DÀI MAY SẴN</a>
                    <ul class="dl-submenu">
                        <li> <a href="/ao-dai-may-san/ao-dai-in-3d-may-san/" title="ÁO DÀI IN 3D MAY SẴN">ÁO
                                DÀI IN 3D MAY SẴN</a>
                        </li>
                        <li> <a href="/ao-dai-may-san/ao-dai-mau-tron-may-san/" title="ÁO DÀI MÀU TRƠN MAY SẴN">ÁO DÀI
                                MÀU TRƠN MAY SẴN</a>
                        </li>
                        <li> <a href="/ao-dai-may-san/ao-dai-cach-tan-may-san/" title="ÁO DÀI CÁCH TÂN MAY SẴN">ÁO DÀI
                                CÁCH TÂN MAY SẴN</a>
                        </li>
                    </ul>
                </li>
                <li><a href="/chon-vai-ao-dai/" title="CÁCH CHỌN VẢI ÁO DÀI">CÁCH CHỌN VẢI ÁO
                        DÀI</a>
                </li>
                <li><a href="/chia-se-lam-dep/" title="LÀM ĐẸP">LÀM ĐẸP</a>
                </li>
                <li><a href="/tin-tuc-su-kien/" title="SỰ KIỆN">SỰ KIỆN</a>
                </li>
                <li><a href="/dich-vu-cat-may-ao-dai/" title="HỖ TRỢ">HỖ TRỢ</a>
                </li>
                <li><a href="/lien-he/" title="LIÊN HỆ">LIÊN HỆ</a>
                </li>
            </ul>
        </div><!-- /dl-menuwrapper -->
    </div>
    <div style="clear: both;"></div>
    
    @if (Route::currentRouteName() == 'home/index')
        <div class="slider-wrapper theme-default" style="margin-top: 10px;">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">
                <a href="" target="_blank" title="Vải áo dài Duyên"> <img class="img-fix-slider"
                        src="{{asset('imgroup')}}/upload/images/vải-áo-dài-dính-dá-két-cuòm.jpg" title="Vải áo dài Duyên"
                        alt="Vải áo dài Duyên" /> </a>
            </div>
        </div>
    @endif

</div>
