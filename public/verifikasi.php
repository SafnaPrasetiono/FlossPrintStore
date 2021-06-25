<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello Wellcome</h1>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente animi illum quaerat vero accusantium quam, officia fugiat aspernatur totam maiores cumque nostrum vel molestias non numquam aliquam provident dolorem alias!</p>
    @if(session('ver'))
        @foreach(session('ver') as $data)
        <p>$data['nama_lengkap']</p>
        @endforeach
    @endif
</body>
</html>