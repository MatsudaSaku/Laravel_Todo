<div class="container">
  <h1>タスクの追加</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{ route('todos.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="タスクを入力する">
    <input type="submit" value="保存する">
  </form>
</div>