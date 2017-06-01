@extends('frontend.layout.default', array('block' => 1))

@stop

@section('content')
    @include('frontend.block.homemenu')
    @include('frontend.block.mainslider')
    @include('frontend.common.block')
    @include('frontend.block.banner')
    @if($newFirstHome)
        @include('frontend.block.homenews')
    @endif
    @include('frontend.block.homelinks')


    <div class="second-wrapper">
        @include('frontend.common.statistics')
        @include('frontend.block.secondslider')
    </div>
    @include('frontend.block.review', array('block' => THPT_BLOCK))
@stop
