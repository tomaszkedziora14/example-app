<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>Laravel Vue JS CRUD Example  - Tutsmake</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <style>
        .bg-light {
            background-color: #eae9e9 !important;
        }
    </style>
</head>
<body>
  <div id="app">
      <app></app>
  </div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
