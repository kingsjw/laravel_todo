@extends('layouts.app')
@section('content')
<div class="container">
  @if(Auth::check())
  <h2>내 할 일 목록</h2>
  <a href="/task" class="btn btn-primary">할일 추가</a>
  <table class='table'>
    @foreach($user->tasks as $task)
    <tr>
      <td>{{ $task->description }}</td>
      <!-- {!! nl2br(e($task->description)) !!} -->
      <td nowrap>
        <form action="/task/{{$task->id}}" method="post">
          <a href="/task/{{$task->id}}" class="btn btn-warning">수정</a>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" name="button" class="btn btn-danger">삭제</button>
          {{ csrf_field() }}
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  @else
  <h3><a href="/login">로그인이 필요합니다</a></h3>
  @endif
</div>
@endsection
