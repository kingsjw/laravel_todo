@extends('layouts.app')
@section('content')
<div class="container">
  <form class="" action="/task" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <textarea name="description" class="form-control"></textarea>
      <div class="form-group">
        <button type="submit" class="btn-prymary">할 일 추가</button>
      </div>
    </div>
  </form>
</div>
@endsection();
