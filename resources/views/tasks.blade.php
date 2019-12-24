<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <title>Tasks</title>
</head>

<body>
<div class="container">
    <h2 class="mt-5">Add task</h2>
    <form method="post" action="/tasks">
        @csrf
        <div class="form-group">
            <label for="url">Url</label>
            <input type="text" name="url" class="form-control" id="url" placeholder="Enter url">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" name="button" class="btn btn-primary">Add</button>
        </div>
    </form>
    <h2 class="mt-5">Tasks</h2>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Url</th>
            <th scope="col">Status</th>
            <th scope="col">Download</th>
        </tr>
        </thead>
        <tbody>

        @forelse($tasks as $task)
            <tr>
                <th scope="row">{{$task->id}}</th>
                <td><span class="small">{{$task->url}}</span></td>
                <td><span class="badge badge-primary">{{$task->status}}</span></td>
                <td>
                    @if ($task->status === 'completed')
                    <a href="{{$task->filepath}}"><span class="badge badge-primary">Download</span></a>
                    @endif
                </td>
            </tr>
        @empty
            <p>No tasks</p>
        @endforelse

        </tbody>
    </table>
</div>

</body>
</html>
