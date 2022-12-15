<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        @csrf
    
      <input type="text" name="nama" value="{{$data->nama}}">
      <input type="text" name="jenis" value="{{$data->jenis}}">
      <button type="submit">Update</button>
    </form>
</body>
</html>