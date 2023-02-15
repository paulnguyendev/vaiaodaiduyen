<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VẢI ÁO DÀI DUYÊN - Shop vải áo dài luôn được yêu thích</title>
    <meta name="description"
        content="Chuyên các loại vải áo dài đẹp trong và ngoài nước: vải áo dài lụa, lụa thun, lụa Hàn Quốc, thêu, vẽ, cưới hỏi dạ hội, đính đá kết cườm, gấm, nhung, ren, lưới" />
    <meta name="keywords" content="áo dài, ao dai, vải áo dài duyên, vai ao dai duyen" />
    <meta name="WT.ti" content="VẢI ÁO DÀI DUYÊN - Shop vải áo dài luôn được yêu thích" />
    <meta name="generator" content="imgroup.vn" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="2m_uLzBDLTcnc69ZQ1GSU-QG1mIbRJG1QvzVH_q3zKU" />
    <meta name="p:domain_verify" content="8467651e06d34eb393975dec322a51a1" />
    <meta name="robots" content="NOODP" />
    <link rel="shortcut icon" href="/upload/images/favicon.jpg" type="image/x-icon" />
    <link href="{{asset('imgroup')}}/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('imgroup')}}/css/custom_style.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('imgroup')}}/css/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" />
    <script src="{{asset('imgroup')}}/js/jquery-1.8.2.min.js"></script>
    <script src="{{asset('imgroup')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('imgroup')}}/plugins/forms/jquery.validationEngine-vn.js"></script>
    <script src="{{asset('imgroup')}}/plugins/forms/jquery.validationEngine.js"></script>
    <script src="{{asset('imgroup')}}/js/jquery.nivo.slider.js"></script>
    <script src="{{asset('imgroup')}}/js/jquery.easing.1.3.js"></script>
    <script src="{{asset('imgroup')}}/js/jquery.form-defaults.js"></script>
    <script src="{{asset('imgroup')}}/js/ddsmoothmenu.js"></script>
    <script src="{{asset('imgroup')}}/js/modernizr.custom.js"></script>
    <script src="{{asset('imgroup')}}/js/jquery.dlmenu.js"></script>
    <script src="{{asset('imgroup')}}/js/ajax.js"></script>
   
    <style>
        body {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
    </style>
    <script type="text/JavaScript">
        function killCopy(e){
        return true
        }
        function reEnable(){
        return true
        }
        document.onselectstart=new Function ("return false")
        if (window.sidebar){
        document.onmousedown=killCopy
        document.onclick=reEnable
        }
        </script>
</head>

<body>
    <div class="container {{(Route::currentRouteName() == 'home/index') ? 'mainbody' : ''}}">
        
        <div class="wrapper">
            <div class="right_content">
                @yield('content')
            </div>
            @include('frontend.elements.left_content')
        </div>
       @include('frontend.elements.header')
       @include('frontend.elements.footer')
       
    </div>
    <script>
        function FloatTopDiv() {
            startLX = ((document.body.clientWidth - MainContentW) / 2) - LeftBannerW - LeftAdjust, startLY = TopAdjust + 80;
            //alert(startLX);
            startRX = ((document.body.clientWidth - MainContentW) / 2) + MainContentW + RightAdjust, startRY = TopAdjust +
                80;
            var d = document;

            function ml(id) {
                var el = d.getElementById ? d.getElementById(id) : d.all ? d.all[id] : d.layers[id];
                el.sP = function(x, y) {
                    this.style.left = x + 'px';
                    this.style.top = y + 'px';
                };
                el.x = startRX;
                el.y = startRY;
                return el;
            }

            function m2(id) {
                var e2 = d.getElementById ? d.getElementById(id) : d.all ? d.all[id] : d.layers[id];
                e2.sP = function(x, y) {
                    this.style.left = x + 'px';
                    this.style.top = y + 'px';
                };
                e2.x = startLX;
                e2.y = startLY;
                return e2;
            }
            window.stayTopLeft = function() {
                if (document.documentElement && document.documentElement.scrollTop)
                    var pY = document.documentElement;
                else if (document.body)
                    var pY = document.body;
                if (document.body.scrollTop > 30) {
                    startLY = 3;
                    startRY = 3;
                } else {
                    startLY = TopAdjust;
                    startRY = TopAdjust;
                };
                ftlObj.y += (pY + startRY - ftlObj.y) / 16;
                ftlObj.sP(ftlObj.x, ftlObj.y);
                ftlObj2.y += (pY + startLY - ftlObj2.y) / 16;
                ftlObj2.sP(ftlObj2.x, ftlObj2.y);
                setTimeout("stayTopLeft()", 1);
            }
            ftlObj = ml("divAdRight");
            //stayTopLeft();
            ftlObj2 = m2("divAdLeft");
            stayTopLeft();
        }

        function ShowAdDiv() {
            var objAdDivRight = document.getElementById("divAdRight");
            var objAdDivLeft = document.getElementById("divAdLeft");
            if (document.body.clientWidth < 1000) {
                objAdDivRight.style.display = "none";
                objAdDivLeft.style.display = "none";
            } else {
                objAdDivRight.style.display = "block";
                objAdDivLeft.style.display = "block";
                FloatTopDiv();
            }
        }
    </script>
    <script type='text/javascript' language='javascript'>
        MainContentW = $(".container").width();
        LeftBannerW = $("#divAdLeft").width();
        RightBannerW = $("#divAdRight").width();
        LeftAdjust = 5;
        RightAdjust = 5;
        TopAdjust = 10;
        ShowAdDiv();
        window.onresize = ShowAdDiv;;
    </script>
    <div class="uDialog">
        <div id="dialog-message" title="Thông báo">
        </div>
        <div id="loading-dialog-message" title="Thông báo">
        </div>
    </div>
    <div id="back_to_top" title="Go top"></div>
    <div id="fb-root"></div>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/socials.js"></script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i["GoogleAnalyticsObject"] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, "script", "//www.google-analytics.com/analytics.js", "ga");
        ga("create", "UA-59046071-1", "auto");
        ga("send", "pageview");
    </script>
    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-T6W2GL" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src =
                "//www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-T6W2GL");
    </script>
    <!-- End Google Tag Manager -->
    <script>
        (function() {
            var _fbq = window._fbq || (window._fbq = []);
            if (!_fbq.loaded) {
                var fbds = document.createElement("script");
                fbds.async = true;
                fbds.src = "//connect.facebook.net/en_US/fbds.js";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(fbds, s);
                _fbq.loaded = true;
            }
            _fbq.push(["addPixelId", "1583746501874767"]);
        })();
        window._fbq = window._fbq || [];
        window._fbq.push(["track", "PixelInitialized", {}]);
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none"
            src="https://www.facebook.com/tr?id=1583746501874767&ev=PixelInitialized" /></noscript>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = "2.0";
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, "script", "https://connect.facebook.net/en_US/fbevents.js");
        fbq("init", "994153397322050");
        fbq("track", "PageView");
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=994153397322050&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <script type="text/javascript">
        var gr_goal_params = {
            param_0: "",
            param_1: "",
            param_2: "",
            param_3: "",
            param_4: "",
            param_5: ""
        };
    </script>
    <script type="text/javascript" src="https://app.getresponse.com/goals_log.js?p=813204&u=BnfmJ"></script>
    <meta name="p:domain_verify" content="8467651e06d34eb393975dec322a51a1" />
    <meta name="p:domain_verify" content="8467651e06d34eb393975dec322a51a1" />
    <a class="iconzalo" href="https://zalo.me/3326574015399495624">
        Zalo
    </a>
    <style>
        .iconzalo {
            position: fixed;
            bottom: 170px;
            right: 27px;
            padding: 10px;
            background: #0084ff;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #FFF;
        }

        .fb-livechat,
        .fb-widget {
            display: none
        }

        .ctrlq.fb-button,
        .ctrlq.fb-close {
            position: fixed;
            right: 24px;
            cursor: pointer
        }

        .ctrlq.fb-button {
            z-index: 999;
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
            width: 60px;
            height: 60px;
            text-align: center;
            bottom: 100px;
            border: 0;
            outline: 0;
            border-radius: 60px;
            -webkit-border-radius: 60px;
            -moz-border-radius: 60px;
            -ms-border-radius: 60px;
            -o-border-radius: 60px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
            -webkit-transition: box-shadow .2s ease;
            background-size: 80%;
            transition: all .2s ease-in-out
        }

        .ctrlq.fb-button:focus,
        .ctrlq.fb-button:hover {
            transform: scale(1.1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)
        }

        .fb-widget {
            background: #fff;
            z-index: 1000;
            position: fixed;
            width: 360px;
            height: 435px;
            overflow: hidden;
            opacity: 0;
            bottom: 0;
            right: 24px;
            border-radius: 6px;
            -o-border-radius: 6px;
            -webkit-border-radius: 6px;
            box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
            -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
            -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
            -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
        }

        .fb-credit {
            text-align: center;
            margin-top: 8px
        }

        .fb-credit a {
            transition: none;
            color: #bec2c9;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 12px;
            text-decoration: none;
            border: 0;
            font-weight: 400
        }

        .ctrlq.fb-overlay {
            z-index: 0;
            position: fixed;
            height: 100vh;
            width: 100vw;
            -webkit-transition: opacity .4s, visibility .4s;
            transition: opacity .4s, visibility .4s;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, .05);
            display: none
        }

        .ctrlq.fb-close {
            z-index: 4;
            padding: 0 6px;
            background: #365899;
            font-weight: 700;
            font-size: 11px;
            color: #fff;
            margin: 8px;
            border-radius: 3px
        }

        .ctrlq.fb-close::after {
            content: "X";
            font-family: sans-serif
        }

        .bubble {
            width: 20px;
            height: 20px;
            background: #c00;
            color: #fff;
            position: absolute;
            z-index: 999999999;
            text-align: center;
            vertical-align: middle;
            top: -2px;
            left: -5px;
            border-radius: 50%;
        }

        .bubble-msg {
            width: 120px;
            left: -140px;
            top: 5px;
            position: relative;
            background: rgba(59, 89, 152, .8);
            color: #fff;
            padding: 5px 8px;
            border-radius: 8px;
            text-align: center;
            font-size: 13px;
        }
    </style>
    <div class="fb-livechat">
        <div class="ctrlq fb-overlay"></div>
        <div class="fb-widget">
            <div class="ctrlq fb-close"></div>
            <div class="fb-page" data-href="https://www.facebook.com/vaiaodaiduyen1" data-tabs="messages"
                data-width="360" data-height="400" data-small-header="true" data-hide-cover="true"
                data-show-facepile="false"> </div>
            <div class="fb-credit"> </div>
            <div id="fb-root"></div>
        </div><a href="https://m.me/vaiaodaiduyen1" title="Gửi tin nhắn cho chúng tôi qua Facebook"
            class="ctrlq fb-button"> </a>
    </div>
    <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <script>
        $(document).ready(function() {
            function detectmob() {
                if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator
                    .userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(
                        /iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(
                        /Windows Phone/i)) {
                    return true;
                } else {
                    return false;
                }
            }
            var t = {
                delay: 125,
                overlay: $(".fb-overlay"),
                widget: $(".fb-widget"),
                button: $(".fb-button")
            };
            setTimeout(function() {
                $("div.fb-livechat").fadeIn()
            }, 8 * t.delay);
            if (!detectmob()) {
                $(".ctrlq").on("click", function(e) {
                    e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget
                        .stop().animate({
                            bottom: 0,
                            opacity: 0
                        }, 2 * t.delay, function() {
                            $(this).hide("slow"), t.button.show()
                        })) : t.button.fadeOut("medium", function() {
                        t.widget.stop().show().animate({
                            bottom: "30px",
                            opacity: 1
                        }, 2 * t.delay), t.overlay.fadeIn(t.delay)
                    })
                })
            }
        });
    </script>
</body>

</html>
