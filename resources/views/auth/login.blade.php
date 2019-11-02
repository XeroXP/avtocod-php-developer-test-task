@extends('layouts.app', ['page_title' => 'Авторизация'])

@section('main_content')
	@if(session('status'))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ session('status') }}
		</div>
	@endif

	@if($errors->any())
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<ul>
				@foreach ($errors->all() as $message)
					<li>{{$message}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<h2>Авторизация</h2>
	<?php
	echo Form::open(array('route' => 'auth.login', 'method' => 'post'));
		echo '<div class="form-group">';
		echo Form::label('email', 'Email', array('class' => 'sr-only'));
		echo Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email', 'required', 'autofocus'));
		echo '</div>';
		
		echo '<div class="form-group">';
		echo Form::label('password', 'Пароль', array('class' => 'sr-only'));
		echo Form::password('password', array('class' => 'form-control', 'placeholder' => 'Пароль', 'required', 'autocomplete' => 'on'));
		echo '</div>';
		
		echo Form::submit('Войти', array('class' => 'btn btn-lg btn-primary btn-block'));
	echo Form::close();
	?>
@endsection
