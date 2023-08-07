<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>

<body class="w-screen h-screen bg-slate-200 flex justify-center items-center overflow-x-hidden">
    <div class="w-[70%] h-screen flex flex-col justify-center items-center mt-10 mb-10 p-5">
       <?= $post;?>
    </div>
</body>

</html>