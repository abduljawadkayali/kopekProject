@extends('layouts.Admin')

@section('header')
    <h1><i class="fas fa-user-shield"></i> Cruds</h1>
@endsection
@section('content')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ URL::previous() }}" class="btn btn-default">@lang("Back")</a>
	</div>
	<br />
	<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />

	<h3>@lang('description')- {!! $data->description !!}</h3>

	<h3>@lang('title')- {!! $data->title !!}</h3>
</div>
@endsection
