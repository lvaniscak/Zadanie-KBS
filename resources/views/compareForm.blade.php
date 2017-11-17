@extends('layouts.master')

@section('title', 'Porovnávač')



<style>
.button{
  color:#565656;
  border-radius:25px;
  height:35px;
  padding:6px;
  font-weight:bold;
  font-size:15px;
  background-color:#C09F80;
}

.heading{
  color:#76323F;
  margin-top:50px;
}

}

</style>
@section('content')
  {{ Form::open(array('url' => 'hobbies')) }}
  <h1 class="heading">Porovnávač záľub</h1>
  <p>
    <em>Prosím zadajte emailovú adresu pre porovnanie </em>
  </p>

  @if($errors->has('email'))
    <div class="errors">{{$errors->first('email')}}

    </div>
  @endif
  {{Form::label('email', 'E-mail:',array('class'=>'labels' ))}}
  {{Form::email('email',null,array('class' => 'inputs'))}}


  {{Form::submit('Porovnať',array( 'class' => 'button'))}}


  {{ Form::close() }}

@stop
