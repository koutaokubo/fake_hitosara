<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
        @csrf
        <div>
             <input id="name" class="block mt-1 w-full" type="text" name="name"/>
        </div>

        <div class="mt-4">
            <input id="open_time" class="block mt-1 w-full" type="text" name="open_time"/>
        </div>

        <div class="mt-4">
            <input id="close_time" class="block mt-1 w-full" type="text" name="close_time"/>
        </div>
        <div>
            <input type="submit" value="送信"/>
        </div>
    </form>
</body>
</html>