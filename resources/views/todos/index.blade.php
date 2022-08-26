@extends('layouts.app')

@section('title','All Todos')

@section('content')

  <div class="container">
    <div class="row pt-3 justify-content-center">
        <div class="card" style="width:50%">
        <div class="card-header text-center">
            <h1>All Todos </h1>

        </div>
        @if (session()->has('success'))
        <div class="atert alert-success text-center">
            {{session()->get('success')}}
        </div>
            
        @endif
        <div class="card-body">
     
            <ul class="list-group">
              
            @forelse ($todos as $t)
            <li class="list-group-item text-muted">
                {{$t->title}}
                <span class="float-right">
                    <a href="/todos/{{$t->id}}/delete" style="color:red">
                    <i class="fa-solid fa-trash-can"></i>
                    </a>
                </span>
                <span class="float-right mr-4">
                    <a href="/todos/{{$t->id}}/edit" style="color:green">
                    <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </span>
                <span class="float-right mr-4">
                    <a href="/todos/{{$t->id}}">
                    <i class="fa-solid fa-eye"></i>
                    </a>
                </span>
                @if (! $t->compleated)
                <span class="float-right mr-4">
                    <a href="/todos/{{$t->id}}/compleate">

                        <i class="fa-solid fa-circle-check"></i>
                        
                        
                    </a>
                </span>
                @endif
            </li>
            @empty
            <p class="text-center">No Todos</p>
                
            
            @endforelse
            </ul>

        </div>

        </div>

    </div>
  </div>
@endsection