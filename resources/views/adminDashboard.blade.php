@extends('layouts.master')

@section('title', 'Uprava uzivatelov')


@section('content')
    <h1 class="heading">Zoznam užívateľov</h1>
    <table>
        <tr>
            <th>Meno</th>
            <th>Akcia</th>

        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>
                    <button onclick="edit({{$user->id}})" class="btn btn-warning btn-detail edit" value="{{$user->id}}">
                        Edit
                    </button>
                </td>
            </tr>
        @endforeach
    </table>


    <!-- Edit Item Modal -->
    <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                </div>
                <div class="modal-body" id="user-detail">


                </div>
            </div>
        </div>
    </div>


@stop
