<!--footer-->
<div class="main-footer mg-t-auto">
    <div class="container-fluid">
        @if(\App\Models\Setting::get()->count() > 0)
        <span>Copyright &copy; 2020 <a href="#">{{ App\Models\Setting::first()->title }}</a>. Designed by <a href="">Qsindo</a> All rights reserved.</span>
        @else
        <span>Copyright &copy; 2020 <a href="#">{{ config('app.name') }}</a>. Designed by <a href="">Qsindo</a> All rights reserved.</span>
        @endif
    </div>
</div>
<!--/footer-->