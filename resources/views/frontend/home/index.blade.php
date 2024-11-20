@extends('frontend.layouts.master')

@section('contents')
    <!--==========================
    BANNER PART START
    ===========================-->
    @include('frontend.home.section.banner')
    <!--==========================
    BANNER PART END
    ===========================-->

    <!--==========================
        CATEGORY SLIDER START
    ===========================-->
    @include('frontend.home.section.category-slide')
    <!--==========================
        CATEGORY SLIDER END
    ===========================-->


    <!--==========================
        FEATURES PART START
    ===========================-->
    @include('frontend.home.section.feature')
    <!--==========================
        FEATURES PART END
    ===========================-->


    <!--==========================
        COUNTER PART START
    ===========================-->
    @include('frontend.home.section.counter')
    <!--==========================
        COUNTER PART END
    ===========================-->


    <!--==========================
        OUR CATEGORY START
    ===========================-->
    @include('frontend.home.section.category')
    <!--==========================
        OUR CATEGORY END
    ===========================-->


    <!--==========================
        OUR LOCATION START
    ===========================-->
    @include('frontend.home.section.location')
    <!--==========================
        OUR LOCATION END
    ===========================-->


    <!--==========================
        FEATURED LISTING START
    ===========================-->
    @include('frontend.home.section.featured-listing')
    <!--==========================
        FEATURED LISTING END
    ===========================-->


    <!--==========================
        OUR PACKAGE START
    ===========================-->
    @include('frontend.home.section.pricing')
    <!--==========================
        OUR PACKAGE END
    ===========================-->


    <!--============================
        TESTIMONIAL PART START
    ==============================-->
    @include('frontend.home.section.testimonial')
    <!--============================
        TESTIMONIAL PART END
    ==============================-->


    <!--==========================
        BLOG PART START
    ===========================-->
    @include('frontend.home.section.featured-blog')
    <!--==========================
        BLOG PART END
    ===========================-->
@endsection

