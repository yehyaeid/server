@extends('layouts.app')
@section('title','Edit Todo')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Todo</h1>
                </div>
                <div class="card-body">
           <!--      @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                            @endforeach
                 </ul>
                </div>
                @endif -->
                    <form action="/todos/{{$todo->id}}" method="post">
                        @csrf
                        <div class="form-group">
                        <input type='text' name="todoTitle" 
                        class="form-control @error('todoTitle') is-invalid @enderror"
                        value='{{$todo->title}}'
                        placeholder='Enter Todo Title...'>
                        @error('todoTitle')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror    
                    </div>
                        <div class="form-group">
                        <textarea  name="todoDescription"
                        class="form-control
                         @error('todoDescription') is-invalid @enderror" 
                         
                         rows="3">{{$todo->description}}</textarea>
                        @error('todoDescription')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror     
                    </div>
                        <div class="form-group text-center">
                            <button type='submit' class="btn btn-success" style="width:40%">Update Todo</button>
                        </div>
                       

                    </form>
                </div>
            </div>
        </div>
</div>
</div>

@endsection