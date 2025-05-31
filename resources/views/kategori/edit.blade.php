<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 50px 60px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        h1 {
            margin-bottom: 15px;
            color: #333;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.8;
        }
        .btn-back {
            background-color: #007bff;
            text-decoration: none;
            display: inline-block;
            padding: 10px;
            color: white;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Kategori</h1>
        <form action="{{route('kategori.update', $data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="nama" value="{{$data->nama}}" required>
            <button type="submit">Simpan</button>
        </form>
        <a href="{{route('kategori.index')}}" class="btn-back">Kembali</a>
    </div>
</body>
</html>
