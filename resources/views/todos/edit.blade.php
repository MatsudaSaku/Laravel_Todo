<div class="container">
  <h1>タスクの編集</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{ route('todos.update', $todo->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text"  name="title" value="{{ $todo->title }}"placeholder="タスクを入力する">
    <input type="submit" value="保存する">
  </form>
</div>