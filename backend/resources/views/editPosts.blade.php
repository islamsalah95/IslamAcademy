<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Blog</title>

</head>
<body>

    <div class="container text-center">
        <div class="row justify-content-center">
    <div class="col-8">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


@if (session('success'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
</div>
@endif

</div>

            <div class="cols-8">
                <form action="{{ route('update',['id'=>$posts->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">title</label>
                        <input type="title" class="form-control" name="title" id="title"  value="{{$posts->title}}">
                      </div>


            <div class="mb-3">
                <label for="body" class="form-label">body</label>
                <input type="body" class="form-control" name="body" id="body"  value="{{$posts->body}}">
              </div>

              <div class="d-grid gap-2">
                <button class="btn btn-outline-primary rounded btn-sm"> update </button>
            </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>



