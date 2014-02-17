<!DOCTYPE html>
<html>
<head>
<title>Annas Inventory System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Bootstrap -->
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/thin-admin.css') }}
{{ HTML::style('css/font-awesome.css') }}
{{ HTML::style('style/style.css') }}

@yield('css')



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>


@yield('body')


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/bootstrap.min.js') }}

@yield('js')

</body>
</html>
