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
            <a href="{{route('prjsoruekleme')}}" class="btn btn-primary">Yeni Soru</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kelime</th>
                    <th scope="col">İlişik Kelime</th>
                    <th scope="col">Seviye</th>
                    <th scope="col">Düzenleme</th>
                    <th scope="col">Silme</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($veri->sorular as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        
                        <td>{{ $item->kelime }}</td>
                        <td>
                            @php
                                $data = $veri->sorular->where('id',$item->benzer_id )->pluck('kelime')->first();
                                if ($data == null) {
                                    echo 'Benzeri YOK';
                                }else{
                                    echo $data;
                                }
                            @endphp
                        </td>
                        <td>{{ $item->seviye }}</td>
                        <td>
                            <a href="{{route('prjsoruduzenle',$item->id)}}" class="btn btn-warning">Kelimeyi Düzenle</a>
                        </td>
                        <td>
                            <a href="{{route('prjsorusil',$item->id)}}" class="btn btn-danger">Kelimeyi Silme</a>
                        </td>
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
