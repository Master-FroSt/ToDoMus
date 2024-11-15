<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>
<body>
    @include('header')
    <div class="container mt-5">
        <form method="POST" action="/edit/{{$toDoList->id}}">
            @csrf
            <div class="form-group mb-2">
                <label>Kegiatan</label>
                <input type="text" class="form-control" name="kegiatan" placeholder="Masukkan kegiatan" value="{{$toDoList->kegiatan}}">
            </div>
            <div class="form-group mb-2">
                <label>Deadline</label>
                <input type="datetime-local" class="form-control" name="deadline" placeholder="Masukkan Deadline" value="{{$toDoList->deadline}}">
                
            </div>
            <div class="form-group mb-2">
                <label>Status</label>
                <input type="checkbox" name="status" @if($toDoList->status) checked @endif>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>