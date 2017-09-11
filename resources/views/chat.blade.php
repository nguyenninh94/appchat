@extends('layouts.app')

@section('content')

   <div class="container">
   	   <div id="app">
	      <div class="panel panel-primary">
	      	 Chatroom
	      	 <span class="badge">@{{usersInRoom.length}}</span>
	      </div>
	      <chat-log :messages="messages"></chat-log>
	      <chat-composer v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-composer>
       </div>
   </div> 

@endsection()