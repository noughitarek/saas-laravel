@extends('layouts.dashboard')
@section('title', "Help")
@section('content')
<div class="content content--top-nav">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            FAQ Layout
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @foreach($faqs_categories as $category)
        <div class="intro-y col-span-{{$category->width}} lg:col-span-{{$category->width_lg}}">
            <div class="box">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        {{$category->title}}
                    </h2>
                </div>
                <div id="faq-accordion-{{$category->id}}" class="accordion p-5">
                    @foreach($category->FAQ_admins() as $faq)
                    <div class="accordion-item">
                        <div id="faq-accordion-content-{{$faq->id}}" class="accordion-header">
                            <button class="accordion-button" type="button" data-tw-toggle="collapse" data-tw-target="#faq-accordion-collapse-{{$faq->id}}" aria-expanded="true" aria-controls="faq-accordion-collapse-{{$faq->id}}"> {{$faq->title}} </button>
                        </div>
                        <div id="faq-accordion-collapse-{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-{{$faq->id}}" data-tw-parent="#faq-accordion-{{$category->id}}">
                            <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed"> {{$faq->content}} </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection