@extends('frontend.layout.default')
@stop

@section('block-var')

    @if ($block == 1)
        <style>
            :root {
                --gradient-start: #03499a;
                --gradient-start-90: rgba(3,73,154, 0.9);
                --gradient-end: #0072bc;
                --gradient-end-75: rgba(0,114,188, 0.75);
                --gradient-end-90: rgba(0,114,188, 0.9);
                --main-color: #0089cf;
                --main-color-75: rgba(0,137,207, 0.75);
                --main-color-90: rgba(0,137,207, 0.90);
                --main-hover: #0072bc;
            }
        </style>
    @elseif ($block >= '2')
        <style>
            :root {
                --gradient-start: #01a350;
                --gradient-start-90: rgba(3,73,154, 0.9);
                --gradient-end: #137b4f;
                --gradient-end-75: rgba(0,114,188, 0.75);
                --gradient-end-90: rgba(0,114,188, 0.9);
                --main-color: #72bf44;
                --main-color-75: #91cb70;
                --main-color-90: rgba(0,137,207, 0.90);
                --main-hover: #127b4f;
            }
        </style>
    @endif
@stop
@section('content')
    @include('frontend.block.menu', array('menu' => $menu, 'block' => $block))
    @include('frontend.block.mainslider', array('slides' => $slides))
    @if ($block == 1)
        @include('frontend.common.steps')
        @include('frontend.block.teachers')
        @include('frontend.block.choosecourse', array('class' => $class))
        @include('frontend.block.news', array('block' => $block))
        @include('frontend.block.homelinks', array('listLink' => $listLink))
        @include('frontend.block.review')
        @include('frontend.block.choosecoursesecond', array('classList' => $classList))
        
    @elseif ($block >= 2)
        @include('frontend.block.program')
        @include('frontend.block.advantage')
        @include('frontend.block.choosecoursethird', array('classList' => $classList))
        @include('frontend.block.review')
        @include('frontend.block.news', array('block' => $block))
    @endif

@stop