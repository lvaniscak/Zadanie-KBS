@extends('layouts.master')

@section('title', 'Zoznam zhod')


@section('content')
  {{ Form::open(array('url' => 'hobbies')) }}
  <h1 class="heading">Zoznam porovnaných užívateľov</h1>
  <p>Pre email {{$email}} sú hodnoty zhody nasledovné: </p>
  <table>
    <tr>
      <th>Meno</th>
      <th>Zhoda záľub (%)</th>
    </tr>
  
    @foreach ($list as $key => $value)
      <tr>
        <td>{{$key}}</td>
        <td>{{$value}}</td>
      </tr>
    @endforeach
  </table>
@stop
