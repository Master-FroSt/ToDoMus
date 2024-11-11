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
        <form method="POST" action="/addtodo">
            @csrf
            <div class="form-group mb-2">
                <label>Kegiatan</label>
                <input type="text" class="form-control" name="kegiatan" placeholder="Masukkan kegiatan">
            </div>
            <div class="form-group mb-2">
                <label>Deadline</label>
                <input type="datetime-local" class="form-control" name="deadline" placeholder="Masukkan deadline">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        <table class="table mt-5">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Kegiatan</th>
                    <th class="text-center" scope="col">Deadline</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @if (count($toDoLists) > 0)
                    @foreach ($toDoLists as $toDoList)
                        <tr>
                            <th class="text-center">{{ $toDoList->kegiatan }}</th>
                            <th class="text-center">{{ $toDoList->deadline }}</th>
                            <th class="text-center">
                                @if ($toDoList->status)
                                    <input type="checkbox" checked disabled>
                                @else
                                    <input type="checkbox" disabled>
                                @endif
                            </th>
                            <th class="text-center"><a href="/edit/{{ $toDoList->id }}" class="btn btn-primary">Edit</a>
                                <a href="/delete/{{ $toDoList->id }}" class="btn btn-danger">Delete</a>
                            </th>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th class="text-center" colspan="4">No Data</th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>