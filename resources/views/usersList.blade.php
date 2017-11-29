@extends('layouts.master')

@section('title', 'Zoznam uzivatelov')


@section('content')

    <h1 class="heading">Zoznam užívateľov</h1>
    <table>
        <tr>
            <th>Meno s emailom</th>

        </tr>
    @foreach ($users as $user)
            <tr>
                <td>{{$user->present()->nameWithEmail}}</td>
            </tr>
        @endforeach
    </table>
@stop
