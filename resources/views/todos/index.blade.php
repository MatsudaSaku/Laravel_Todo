<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div class="container">
  <h1>Todo List</h1>

  <a class="new-task" href="/todos/new">タスクを追加する</a>

  <table>
    <thead>
      <tr>
        <th>タスク</th>
        <th>アクション</th>
      </tr>
    </thead>
    <tbody>
    @foreach($todos as $todo)
      <tr>
        <td>{{ $todo->title }}</td>
        <td>
          <a class="edit" href="{{ route('todos.edit', $todo->id)}}">編集</a>
          <a class="delete" href=
          "#" 
          onclick="event.preventDefault(); 
          if(confirm('本当に削除してもよろしいですか？')) 
          { document.getElementById('delete-form-{{ $todo->id }}').submit(); }">削除</a>
          <form id="delete-form-{{ $todo->id }}" action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display: none;">
          @csrf
          @method('DELETE')
          </form>
        </td>
      </tr>
      @endforeach
      @if (session('success'))
    <div id="alert.alert-success">
        {{ session('success') }}
    </div>
@endif
    </tbody>
  </table>
</div>

<script>
    // ページ読み込み後にメッセージを非表示にする
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var successMessage = document.getElementById('alert.alert-success');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000); // 5秒後に非表示にする
    });

</script>