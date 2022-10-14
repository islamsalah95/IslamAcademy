<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


</head>

<body>
    <div class="contai text-align-center">
        <div class="row">
            <div class="col-8">
                <div class="table-responsive-md">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">title</th>
                                <th scope="col">body</th>
                                <th scope="col">created_at</th>
                                <th scope="col">delet</th>
                                <th scope="col">update</th>
                                <th scope="col">file</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td scope="col">{{ $product->title }}</td>
                                    <td scope="col">{{ $product->body }}</td>
                                    <td scope="col">{{ $product->created_at }}</td>

                                    <td scope="col">
                                        <form action="{{ route('delete', ['id' => $product->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm rounded"> Delete </button>
                                        </form>
                                    </td>


                                    <td scope="col">
                                        <a href="{{ route('edit', ['id' => $product->id]) }}"
                                            class="btn btn-outline-primary rounded btn-sm">
                                            edit</a>
                                    </td>

                                    <td scope="col">

                                        {{ $product->image }} </td>

                                    <td scope="col">

                                        {{-- <video width="320" height="240" controls>
                                            <source src="{{ asset('assets/images/1664394138.mp4') }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video> --}}
                                        <img src="{{ asset('assets/images/Capture.JPG.JPG') }}" >
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
