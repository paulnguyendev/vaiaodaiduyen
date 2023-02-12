@php
    use App\Helpers\Obn;
    $social = Obn::getSetting('social');
    $social = json_decode($social, true);
@endphp
<div id="k-footer">
    <div class="box container clearfix">
        <div class="hotline">
            <h4 class="text-transform title">Kết nối với RPA</h4>
            <ul class="bottom">
                <li>
                    <first><i class="fas fa-phone-alt"></i> Hotline</first>
                    <second>{{ Obn::getSetting('phone') }}</second>
                </li>
                <li>
                    <first><i class="fas fa-envelope"></i> Email</first>
                    <second>{{ Obn::getSetting('email') }}</second>
                </li>
            </ul>
            <!--end .bottom-->
            <div class="social">
                <a href="{{$social['facebook'] ?? ""}}" target="_blank">
                    <img class="img-lazy" data-src="https://cdn-skill.kynaenglish.vn/img/fb_icon_footer.png"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                        alt="facebook" width="44" height="44">
                </a>
                <a href="{{$social['youtube'] ?? ""}}" target="_blank" style="margin:0 5px">
                    <img class="img-lazy" data-src="https://cdn-skill.kynaenglish.vn/img/youtube_icon_footer.png"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                        alt="youtube" width="44" height="44">
                </a>
                <!--<a href="https://zalo.me/1985686830006307471" target="_blank">
    <img class="img-lazy" data-src="/img/zalo_icon_footer.png"
         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
         alt="zalo" width="44" height="44">
  </a>-->
            </div>
            <!--end .social-->
        </div>
        <!--end .hotline -->
        <div class="info">
            <h4 class="title">Thông tin RPA</h4>
            <ul>
                <li><a href="{{ route('home/index') }}">Danh sách khóa học</a></li>
                <li><a href="{{ route('home/index') }}">Câu hỏi thường gặp</a></li>
                <li><a href="{{ route('home/index') }}">Cách thanh toán học
                        phí</a>
                </li>
                <li><a href="{{ route('home/index') }}" target="_blank">Thông tin hữu ích</a></li>
            </ul>
            <!--end .top-->
        </div>
        <!--end .info-->
        <div class="about ">
            <h4 class="text-transform title">Về RPA</h4>
            <ul>
                <li><a href="{{ route('home/index') }}" class="hover-color-green">Quy chế hoạt động
                        Sàn
                        GDTMĐT</a></li>
                <li><a href="{{ route('home/index') }}" class="hover-color-green">Đào tạo doanh nghiệp</a></li>
            </ul>
            <!--end .top-->
        </div>
        <!--end .about-->
        <div class="app-col" style="opacity: 0;pointer-events: none">
            <h4 class="bold title">TẢI ỨNG DỤNG MOBILE</h4>
            <div class="icon-app">
                <a href="https://play.google.com/store/apps/details?id=com.navikyna" target="_blank" title="Android">
                    <img class="img-lazy" data-src="https://cdn-skill.kynaenglish.vn/img/playstore_icon.png"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                        alt="android-app-icon">
                </a>
                <img class="img-lazy" data-src="https://cdn-skill.kynaenglish.vn/img/QR-code.png"
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                    alt="qr-code">
            </div>
        </div>
        <div class="fanpage ">
            <div class="face-content">
                <iframe
                    src="//www.facebook.com/plugins/likebox.php?href={{$social['facebook'] ?? ""}}&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=350&amp;width=255"
                    scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:220px;"
                    allowTransparency="false"></iframe>
            </div>
        </div>
        <!--end .fanpage-->
    </div>
    <!--end .container-->
</div>
<!--    Copyright   -->
<div id="k-footer-copyright">
    <div class="container">
        <!-- Start Anchor Text -->
        <!-- End Anchor Text -->
        <div class="col-lg-8 col-xs-12 address ">
            <div class="text">
                <p class="text-copyright">© 2022 - Bản quyền thuộc về CÔNG TY TNHH TƯ VẤN VÀ ĐÀO TẠO RPA
                </p>
                <p>
                    {!! Obn::getSetting('address') !!}
                    {!! Obn::getSetting('office') !!}
                </p>

            </div>
            <!--end col-xs-8 text-->
        </div>
        <!--end .col-sm-7 col-xs-12 left-->
        <!--end .col-sm-5 col-xs-12 right-->
    </div>
    <!--end .container-->
</div>
<!--end #wrap-copyright-->
<div id="k-footer-mb">
    <ul class="k-footer-mb-contact">
        <li>
            <a href="tel:0917304188" target="_blank"><i class="fas fa-phone-alt"></i> 0917.304.188</a>
        </li>
        <li>
            <a href="mailto:support@rpagroup.vn" target="_blank"><i class="fas fa-envelope"></i></i>
                support@rpagroup.vn</a>
        </li>
    </ul>
    <div class="link">

        <a href="{{ route('home/index') }}" class="link-text" target="_blank" title="">CÂU HỎI
            THƯỜNG GẶP</a>
        <a href="{{ route('home/index') }}" target="_blank" class="link-text" title="">THÔNG TIN HỮU ÍCH</a>

    </div>
    <div class="social">
        <a href="{{ route('home/index') }}" target="_blank">
            <img class="img-lazy" data-src="https://cdn-skill.kynaenglish.vn/img/fb_icon_footer.png"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                alt="facebook">
        </a>
        <a href="{{ route('home/index') }}" target="_blank" style="margin:0 5px">
            <img class="img-lazy" data-src="https://cdn-skill.kynaenglish.vn/img/youtube_icon_footer.png"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                alt="youtube">
        </a>
    </div>
    <p class="copyright">© 2022 - Bản quyền của <br> CÔNG TY TNHH TƯ VẤN VÀ ĐÀO TẠO RPA</p>

</div>
<!--end #k-footer-mb-->
