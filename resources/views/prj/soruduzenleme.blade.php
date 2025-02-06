<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soru Düzenleme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <form action="{{ route('prjsoruduzenlepost',$veri->soru->id) }}" method="post">
            @csrf
            
            <div class="mb-3">
                <label for="exampleInputEmail1"  class="form-label">Kelime</label>
                <input type="text" class="form-control" name="kelime" value="{{$veri->soru->kelime}}">
            </div>
            <select class="form-select mb-2" name="benzer" aria-label="Default select example">
                <option selected>Benzer Seçiniz</option>
                <option value="-1">Benzeri Yok</option>
                @foreach ($veri->benzerler as $item)
                    <option value="{{$item->id}}">{{$veri->benzerler->where('id',$item->id)->pluck('kelime')->first()}}</option>
                @endforeach
              </select>
            <select class="form-select mb-2" name="seviye" aria-label="Default select example">
                <option selected>Seviye Seçiniz({{$veri->soru->seviye}})</option>
                <option value="0">Kolay</option>
                <option value="1">Orta</option>
                <option value="2">Zor</option>
              </select>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
