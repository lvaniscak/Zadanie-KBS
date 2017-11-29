@extends('layouts.master')

@section('title', 'Registrácia')




@section('content')
  {{ Form::open(array('url' => 'user')) }}
  <h1 class="heading">Registračný formulár</h1>
  <em>Vyplňťe nasledujúce údaje. </em>

  <p>
    @if($errors->has('name'))
      <div class="errors">{{$errors->first('name')}}</div>
    @endif
    {{Form::label('name', 'Meno:', array('class' =>'labels' ))}}
    {{Form::text('name',null,array('class' => 'inputs'))}}

  </p>

  <p>
    @if($errors->has('email'))
      <div class="errors">{{$errors->first('email')}}
      </div>
    @endif
    {{Form::label('email', 'E-mail:',array('class' =>'labels' ))}}
    {{Form::email('email',null,array('class' => 'inputs'))}}
  </p>

  <p>
    <h3 class="description">{{Form::label('hobbies', 'Záľuby:')}} </h3>

    <em>  Ohodnoťe ako sa vám páčia dané záľuby.</em>
    @foreach ($hobbies as $key => $hobby)

      <p>
        @if($errors->has($key))
          <div class="errors">{{$errors->first($key)}}</div>
        @endif
        <strong>{{Form::label($key, $hobby.':')}}</strong>
      </p>
      <p>
        <em >Najmenej</em>
        @for($i =1;$i<=5;$i++)
          {{Form::radio($key, $i)}}
        @endfor
        <em>Najviac</em>
      </p>
    @endforeach

  </p>
  <p >
    {{Form::submit('Registrovať',array( 'class' => 'registration-button'))}}

  </p>
  {{ Form::close() }}
@stop
