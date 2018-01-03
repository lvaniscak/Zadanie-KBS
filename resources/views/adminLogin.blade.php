@extends('layouts.master')

@section('title', 'Administracia')




@section('content')
    {{ Form::open(array('url' => 'admin')) }}
    <h1 class="heading">Admin Login</h1>
    <em>Vyplňťe nasledujúce údaje. </em>



    <p>
    @if($errors->has('email'))
        <div class="errors">{{$errors->first('email')}}
        </div>
        @endif
        {{Form::label('email', 'E-mail:',array('class' =>'labels' ))}}
        {{Form::email('email',null,array('class' => 'inputs'))}}
        </p>

        <p>
        @if($errors->has('password'))
            <div class="errors">{{$errors->first('password')}}
            </div>
            @endif
            {{Form::label('password', 'Heslo:',array('class' =>'labels' ))}}
            {{Form::password('password',null,array('class' => 'inputs'))}}
            </p>



            <p>
                {{Form::submit('Prihlásiť',array( 'class' => 'button'))}}

            </p>
            {{ Form::close() }}
@stop
