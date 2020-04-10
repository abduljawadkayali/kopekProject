@extends('layouts.Admin')

@section('header')
    <h1><i class="fas fa-user-shield"></i> Cruds</h1>
@endsection
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<br>
<br>
<div class="container">
	<div class="row">
	  <div class="col">

	  </div>
	  <div class="col">
	  </div>
	</div>
	<br>
	<br>
<div>

</div>


<table class="table table-bordered table-striped">
	<tr>
		<th>@lang("Image")</th>
	<!--	<th >@lang("web_page Name")</th>-->
		<th>@lang("description")</th>
		<th>@lang("title")</th>
		<th>@lang("Action")</th>
	</tr>


	@foreach($data as $row)

		<tr>
			<td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="150" /></td>
			<!--	<td>{{ $row->web_page }}</td>-->
			<td>{!! $row->description !!}</td>
			<td>{!! $row->title !!}</td>
			<td>

				<form action="{{ route('crud.destroy', $row->id) }}" method="post">
					<a href="{{ route('crud.show', $row->id) }}" class="btn btn-primary">@lang("Show")</a>
					<a href="{{ route('crud.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>



@endsection
