<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plan Marketing</title>

    </head>
    <body>
        <div id="app">
            <users
                :users="{{ empty($users)? [] : json_encode($users->toArray()) }}"
                :add-user-route="'{{ route('users.add') }}'"
                ></users>
        </div>
        <script type="text/javascript" src="../js/app.js"></script>
    </body>
</html>
