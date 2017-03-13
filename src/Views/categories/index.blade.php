@extends('laralum::layouts.master')
@section('icon', 'ion-grid')
@section('title', __('laralum_blog::general.category_list'))
@section('subtitle', __('laralum_blog::general.categories_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_blog::general.home')</a></li>
        <li><span>@lang('laralum_blog::general.category_list')</span></li>
    </ul>
@endsection
@section('content')
<div class="uk-container uk-container-large">
    <div class="uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-1@s uk-grid-match" uk-grid>
        @foreach ($categories as $category)
            <div>
                <a href="{{ route('laralum::blog.categories.show', ['category' => $category->id]) }}" class="uk-link-reset">
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">{{ $category->title }}</h3>
                        <p>{!! str_limit(\GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($category->description), $limit = 80, $end = '...') !!}</p>
                        <div class="uk-align-right">
                            <a class="uk-link-reset" href="{{ route('laralum::blog.categories.edit', ['id' => $category->id]) }}">
                                <i style="font-size:20px;" class="icon ion-edit"></i>
                            </a>
                            &nbsp;
                            <a class="uk-link-reset" href="{{ route('laralum::blog.categories.destroy.confirm', ['id' => $category->id]) }}">
                                <i style="font-size:20px;" class="icon ion-trash-b"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection