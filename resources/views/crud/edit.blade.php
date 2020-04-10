@extends('layouts.Admin')

@section('header')
    <h1><i class="fas fa-user-shield"></i> Cruds</h1>
@endsection
@section('content')


<div >
    <a href="{{ URL::previous() }}" class="btn btn-default">@lang("Back")</a>
</div>
<br />


<h1><i class="fa fa-edit"> </i>@lang("Edit")</h1>
<br>
<br>




<form method="post" action="{{ route('crud.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')


      <div class="form-group">
        <label class="col-md-4 text-right">@lang("select page")</label>
        <div class="col-md-8">

			<select name="web_page" class="browser-default custom-select" searchable="Search here..">
				<option value="1" @if($data->web_page=='1') selected='selected' @endif>@lang("home")</option>

				<option value="2" @if($data->web_page=='2') selected='selected' @endif>@lang("Kindergarten")</option>
				<option value="3"@if($data->web_page=='3') selected='selected' @endif> @lang("Primary School")</option>
				<option value="4" @if($data->web_page=='4') selected='selected' @endif>@lang("Preparatory School") </option>
				<option value="5" @if($data->web_page=='5') selected='selected' @endif> @lang("High school")</option>
				<option value="6" @if($data->web_page=='6') selected='selected' @endif>@lang("Magazine")</option>
				<option value="7" @if($data->web_page=='7') selected='selected' @endif>@lang("Summer Club")  </option>
				<option value="8" @if($data->web_page=='8') selected='selected' @endif>@lang("Transportation")</option>
				<option value="9" @if($data->web_page=='9') selected='selected' @endif>@lang("interofice")</option>
				<option value="10" @if($data->web_page=='10') selected='selected' @endif>@lang("helpofice")</option>

			  </select>


        </div>
      </div>



	<div class="form-group">
		<label class="col-md-4 text-right">@lang("description")</label>
		<div class="col-md-8">
			<input type="text" name="description" value="{{ $data->description }}" class="form-control input-lg"  />

		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 text-right">@lang("title")</label>
		<div class="col-md-8">
			<input type="text" name="title" value="{{ $data->title }}" class="form-control input-lg"  />
		</div>
	</div>

	<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />

	<div class="form-group">
		<label class="col-md-4 text-right">@lang("Select Image")</label>

		<div class="col-md-8">



			<div class="file btn btn-lg btn-primary">

				<input type="file" name="image" />
			</div>




			<input type="hidden" name="hidden_image" value="{{ $data->image }}" />
		</div>
	</div>
	<br />
	<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
	</div>
</form>




@endsection




