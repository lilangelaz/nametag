<!DOCTYPE html>
<html>
<head>
    <title>Nametag</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .nametag {
            width: 300px;
            height: 150px;
            border: 2px solid #333;
            border-radius: 10px;
            margin: 20px auto;
            padding: 10px;
        }
        .name {
            font-size: 24px;
            font-weight: bold;
        }
        .designation {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="nametag">
        <div class="name">{{ $name }}</div>
        <div class="posisi">{{ $posisi }}</div>
        <div class="divisi">{{ $divisi }}</div>
        <div class="formFile">{{ $formFile }}</div>
    </div>
</body>
</html>
