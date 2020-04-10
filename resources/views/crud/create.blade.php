@extends('layouts.Admin')

@section('header')
    <h1><i class="fas fa-user-shield"></i> Cruds</h1>
@endsection
@section('content')
  

<div class="container">
	<div class="row">
		<div class="col">

		</div>
		<div class="col">

	  </div>

	</div>
     <div class="row">

      <div class="col-sm">
        <div class='col-lg-12 col-lg-offset-12' >

            <h1>

				<i class="fa fa-picture-o" aria-hidden="true"></i>
				@lang("Add Picture")
				</h1>
			<hr>
			 {{ Form::open(array('url' => 'crud', 'method' => 'POST', 'files' => true))}}
			 @lang("page")
			<br>
			<br>
			<div class="form-group " >

			{{Form::select('web_page', ['1' => 'الرئيسية',
			 '2' => 'الروضة',
			 '3' => 'المدرسة الابتدائية',
			 '4' =>  'المدرسة الاعدادية',
			 '5' =>  'المدرسة الثاثوية',
			 '6' => 'المجلة',
			 '7' => 'النادي الصيفي',
			 '8' => 'المواصلات',
			 '9' => 'المكتب الاعلامي',
			 '10' => 'المكتب الخدمي'
			],null ,['class' => 'browser-default custom-select'])}}
		</div>
            <div class="form-group">
                 @lang("description")
				 <br>

				{{ Form::textarea('description', null, array('class' => 'form-control', 'id'=>'summary-ckeditor')) }}

			</div>

			<div class="form-group">
				@lang("title")
				<br>

			   {{ Form::text('title', null, array('class' => 'form-control')) }}

		   </div>


				{{ Form::file('image') }}

			</div>
            {{Form::submit('Add', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
    </div>
</div>



@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

@endsection


