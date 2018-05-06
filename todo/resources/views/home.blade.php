
<div class="container">

  <h2>내 할 일 목록</h2>
  <a href="/task" class="btn btn-primary">할일 추가</a>
  <table class='table'>
    {{user->tasks as task}}
    <tr>
      <td>{{ task.description }}</td>
      <!-- {!! nl2br(e($task->description)) !!} -->
      <td nowrap>
        <form action="/task/{{task.id}}" method="post">
          <a href="/task/{{task.id}}" class="btn btn-warning">수정</a>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" name="button" class="btn btn-danger">삭제</button>
          {{ csrf_field() }}
        </form>
      </td>
    </tr>

  </table>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
<script type="text/javascript">

</script>
