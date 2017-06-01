@foreach($freeLearn as $vFreeLearn)
<li class="clearfix" id ="coursefree">
    <a href="{{ $vFreeLearn->link }}" class="main-color-2">
        <div class="lc-item clearfix">
            <div class="lc-item-left">
                <div class="lc-cover"><img src="{{ url(IMAGECOURSETEACHER . $vFreeLearn->image_url ) }}"></div>
            </div>
            <div class="lc-item-right ">
                <div class="lc-item-title">
                    {{ $vFreeLearn->name }}
                </div>
                <div class="lc-item-short">
                    {{ $vFreeLearn->sapo }}
                </div>
            </div>
        </div>
        <div class="lc-item clearfix">
            <div class="lc-item-left">
                <div class="lc-info">
                    <p>Giáo viên</p>
                    @if(Teacher::find($vFreeLearn->teacher_id))
                    <p><b>{{ Teacher::find($vFreeLearn->teacher_id)->hoten }}</b></p>
                    @endif
                </div>
            </div>
            <div class="lc-item-right">
                <div class="lc-info">
                    <p>Khoá: </p>
                     @if(PackageGroup::find($vFreeLearn->groupid))
                    <p><b>{{ PackageGroup::find($vFreeLearn->groupid)->name }}</b></p>
                    @endif
                </div>
            </div>
        </div>
    </a>
</li>
@endforeach