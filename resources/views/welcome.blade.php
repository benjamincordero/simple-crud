<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Persons - @yield('title')</title>

    {{ Html::style('/css/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('/jquery-ui/jquery-ui.min.css') }}
    {{ Html::style('/jquery-ui/jquery-ui.theme.css') }}

    {{ Html::style('/css/style.css') }}

</head>
<body>
    <div class="container-fluid">

        @yield('main')

    </div>

    {{ Html::script('/js/jquery-2.2.0.min.js')}}
    {{ Html::script('/jquery-ui/jquery-ui.min.js') }}
    {{ Html::script('/css/bootstrap/js/bootstrap.min.js')}}
    {{ Html::script('/jquery-ui/jquery-ui.min.js') }}

    {{ Html::script('/js/script.js') }}
    <a href="{{action('PersonsController@index')}}" id="root" hidden></a>
    @yield('js')
</body>
</html>