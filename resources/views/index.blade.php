@extends('layouts.app', ['page_title' => 'Главная страница'])

@section('main_content')
    <div class="page-header">
        <h1>Сообщения от всех пользователей</h1>
    </div>
    @if(Auth::check())
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
		<?php
		echo Form::open(array('route' => 'messages.add', 'method' => 'post'));
			echo '<div class="form-group">';
			echo Form::label('content', 'Текст сообщения', array('class' => 'sr-only'));
			echo Form::textarea('content', '', array('class' => 'form-control', 'placeholder' => 'Текст сообщения', 'rows' => '4', 'required'));
			echo '</div>';
			
			echo Form::submit('Отправить сообщение', array('class' => 'btn btn-lg btn-success btn-block'));
		echo Form::close();
		?>
		<hr>
    @endif
    @if($messages)
        @foreach ($messages as $message)
            <div class="row" style="display:flex;">
                <div style="flex: 0 0 auto;width: auto;max-width: none;padding-right: 15px;padding-left: 15px;">
                    <img src="https://www.gravatar.com/avatar/{{md5($message->user->email)}}" />
                </div>
                <div class="col-md-11 col-xs-9">
                    <div class="row" style="display:flex;">
                        <div class="col-md-11 col-xs-9">
                            <p>
                                <strong>{{$message->user->name}}:</strong>
                            </p>
                        </div>
                        <div style="flex: 0 0 auto;width: auto;max-width: none;padding-right: 15px;padding-left: 15px;">
							<?php
							if(Auth::check() && ($message->user->id==Auth::user()->id || Auth::user()->is_admin))
							{
								echo Form::open(array('route' => 'messages.remove', 'method' => 'post'));
									echo Form::hidden('id', $message->id);
									
									echo Form::button('<span class="glyphicon glyphicon-trash glyphicon"></span>', array('type' => 'submit', 'class' => 'btn btn-link', 'style' => 'outline: none !important;box-shadow: none !important;'));
								echo Form::close();
							}
							?>
                        </div>
                    </div>


                    <blockquote>
                        {{$message->content}}
                    </blockquote>
                </div>
            </div>
        @endforeach
        {{ $messages->links() }}
    @endif
    

@endsection
