<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plan Marketing</title>

    </head>
    <body>
        <div id="app">
            <users-add
                :csrf-token="'{{ csrf_token() }}'"
                :add-user-route="'{{ route('users.create') }}'"
                :name="'{{ old('name') }}'"
                :email="'{{ old('email') }}'"
                :phone="'{{ old('phone') }}'"
                @error('name')
                    :name-error="'{{ $message }}'"
                @enderror
                @error('email')
                    :email-error="'{{ $message }}'"
                @enderror
                @error('password')
                    :password-error="'{{ $message }}'"
                @enderror
                @error('phone')
                    :phone-error="'{{ $message }}'"
                @enderror
                ></users-add>
        </div>
        <script type="text/javascript" src="../js/app.js"></script>
    </body>
</html>
