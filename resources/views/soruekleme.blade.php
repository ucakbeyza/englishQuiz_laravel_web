<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soru Ekleme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <form action="{{ route('sorueklepost') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Soru</label>
                <input type="text" class="form-control" name="soru">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cevap A</label>
                <input type="text" class="form-control" name="cevapa">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cevap B</label>
                <input type="text" class="form-control" name="cevapb">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cevap C</label>
                <input type="text" class="form-control" name="cevapc">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cevap D</label>
                <input type="text" class="form-control" name="cevapd">
            </div>
            <select class="form-select" name="dogru" aria-label="Default select example">
                <option selected>Doğru Cevabı Seçiniz</option>
                <option value="0">A</option>
                <option value="1">B</option>
                <option value="2">C</option>
                <option value="3">D</option>
              </select>
            <select class="form-select" name="testno" aria-label="Default select example">
                <option selected>Bir Test Seçiniz</option>
                @foreach ($veri->testler as $item)
                <option value="{{$item->id}}">{{$item->baslik}}</option>
                    
                @endforeach
              </select>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
