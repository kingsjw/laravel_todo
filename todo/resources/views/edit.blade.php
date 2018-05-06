@extends('layouts.app')
@section('content')
<div class="container">
  <form class="" action="/task/{{$task->id}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <textarea name="description" class="form-control">{{$task->description}}</textarea>
      <div class="form-group">
        <button type="submit" class="btn-prymary">수정하기</button>
      </div>
    </div>
  </form>
</div>
@endsection();
