@extends('layouts.master')

@section('title', 'Registrácia')


<style>
.heading{
  color:#76323F;
}
</style>

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
    {{Form::label('email', 'E-mail:',array('style' =>'font-weight:bold;' ))}}
    {{Form::email('email',null,array('style' => 'border-radius:5px'))}}
  </p>

  <p>
    <h3 style="color:#565656">{{Form::label('hobbies', 'Záľuby:')}} </h3>

    <em>  Ohodnoťe ako sa vám páčia dané záľuby.</em>
    @foreach ($hobbies as $key => $hobby)

      <p>
        @if($errors->has($key))
          <div class="errors">{{$errors->first($key)}}</div>
        @endif
        <strong>{{Form::label($key, $hobby.':')}}</strong>
      </p>
      <p>
        <em style="color:#76323F">Najmenej</em>
        @for($i =1;$i<=5;$i++)
          {{Form::radio($key, $i)}}
        @endfor
        <em style="color:#76323F">Najviac</em>
      </p>
    @endforeach

  </p>
  <p >
    {{Form::submit('Registrovať',array('style' => 'color:#565656; border-radius:25px; height:55px; padding:8px; font-weight:bold; font-size:20px; background-color:#C09F80;', 'class' => 'button'))}}

  </p>
  {{ Form::close() }}
@stop
