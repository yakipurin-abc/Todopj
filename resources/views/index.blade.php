<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>COACHTECH</title>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1 class="ttl">Todo List</h1>
      @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
      @endif
      <form action='/' method="post" class="content-form">
        @csrf
        <input type="text" name="content" class="input-add">
        <button type="submit" class="btn btn-add">追加</button>
      </form>
      <table>
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach ($todos as $todo)
        <tr>
          <td>
            {{ $todo->created_at }}
          </td>
          <form action='/' method="patch">
            <td>
              @csrf
              @method('patch')
              <input type="text" name="content" class="task-name" value="{{ $todo->content }}">
            </td>
            <td>
              <button type="submit" class="btn btn-update">更新</button>
            </td>
          </form>
          <td>
            <form action="/" method="delete">
              @csrf
              @method("delete")
              <input type="hidden" name="id" value="{{$todo->id}}">
              <button type="submit" class="btn btn-delete">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</body>