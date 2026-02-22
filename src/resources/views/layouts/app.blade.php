<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <style>
        .header {
            background-color: #ffffff;
            padding: 5px;
        }

        .header-inner {
            width: 80%;
        }

        .header-logo {
            font-size: 20px;
            font-family: "Segoe Script", cursive;
            font-style: italic;
            color: #ffd000;
            text-decoration: none;
            text-align: left;
        }
    </style>
    @yield('css')
</head>

<body style="background-color: #f1f1f1;">
    <header class="header">
        <div class="header-inner">
            <a class="header-logo" href="/products">mogitate</a>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>