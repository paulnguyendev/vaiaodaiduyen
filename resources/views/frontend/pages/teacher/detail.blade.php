@php
    use App\Helpers\Obn;
    use App\Helpers\Package\CoursePackage;
@endphp
@section('body_class','page-teacher')
@extends('frontend.main')
@section('content')
<section id="k-courses-header" class="k-height-header">
    <div class="container">
        <header>
            <img class="img-fluid" src="https://cdn-skill.kynaenglish.vn/uploads/user/325931/img/avatar-1595304153.png" size="120x120" width="120px" height="120px" alt="Trần Duy Thanh, Thạc sỹ Khoa học máy tính" title="Trần Duy Thanh" resizemode="crop" returnmode="img" max-width="100%">            <h1 class="name">Trần Duy Thanh</h1>
            <h2 class="email">Thạc sỹ Khoa học máy tính</h2>
            
        </header>
        <section class="k-courses-header-list">
            <div class="course-summary">
                <ul>
                    <li>
                        <p>Số khóa học</p>
                        <div class="img-count-courses"></div>
                        <span class="course-number">12</span>
                    </li>
                    <li>
                        <p>Giờ giảng</p>
                        <div class="img-hour-courses"></div>
                        <span class="hour-number">38277</span>
                    </li>
                    <li>
                        <p>Câu hỏi</p>
                        <div class="img-question-courses"></div>
                        <span class="question-number">100</span>
                    </li>
                </ul>
            </div>
        </section>
    </div><!--end .container-->
</section>
@endsection
