<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel React </title>
        <link rel="stylesheet" href="/css/app.css" type="text/css">
    </head>
    <body>
       <div id="app"></div>

       <script src="/js/app.js" type="text/javascript"></script>
    </body>
</html>
