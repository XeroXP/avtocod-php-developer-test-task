@extends('layouts.app', ['page_title' => 'Регистрация'])

@section('main_content')
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

	<h2>Регистрация</h2>
	<?php
	echo Form::open(array('route' => 'auth.register', 'method' => 'post'));
		echo '<div class="form-group">';
		echo Form::label('email', 'Email', array('class' => 'sr-only'));
		echo Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email', 'required', 'autofocus'));
		echo '</div>';
		
		echo '<div class="form-group">';
		echo Form::label('name', 'Ник', array('class' => 'sr-only'));
		echo Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Ник', 'required'));
		echo '</div>';
		
		echo '<div class="form-group">';
		echo Form::label('password', 'Пароль', array('class' => 'sr-only'));
		echo Form::password('password', array('class' => 'form-control', 'placeholder' => 'Пароль', 'required', 'autocomplete' => 'off'));
		echo '</div>';
		
		echo '<div class="form-group">';
		echo Form::label('password_confirmation', 'Повторите пароль', array('class' => 'sr-only'));
		echo Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Повторите пароль', 'required', 'autocomplete' => 'off'));
		echo '</div>';
		
		echo Form::submit('Зарегистрироваться', array('class' => 'btn btn-lg btn-primary btn-block'));
	echo Form::close();
	?>
@endsection
