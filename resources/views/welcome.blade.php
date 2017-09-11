@extends('layouts.app')

@section('content')
        <div id="app">
            <div class="container">
                <list-online :user="usersInRoom"></list-online>
            </div>
        </div>
@endsection()
