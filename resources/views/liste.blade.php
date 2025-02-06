<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <div class="my-3">
            <a href="{{route('testekleme')}}" class="btn btn-success">Yeni Test</a>
            <a href="{{route('soruekleme')}}" class="btn btn-primary">Yeni Soru</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Test Adı</th>
                    <th scope="col">Soru</th>
                    <th scope="col">Cevap A</th>
                    <th scope="col">Cevap B</th>
                    <th scope="col">Cevap C</th>
                    <th scope="col">Cevap D</th>
                    <th scope="col">Doğru</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($veri->sorular as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>
                            @php
                                foreach ($veri->testler as $itemtest) {
                                    if ($itemtest->id == $item->testid) {
                                        echo $itemtest->baslik;
                                    }
                                }
                            @endphp
                        </td>
                        <td>{{ $item->soru }}</td>
                        <td>{{ $item->sikA }}</td>
                        <td>{{ $item->sikB }}</td>
                        <td>{{ $item->sikC }}</td>
                        <td>{{ $item->sikD }}</td>
                        <td>{{ $item->cevap }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
