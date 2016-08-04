<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>論壇</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/js/jquery.form.js"></script>

</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="/">論壇</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">


            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/users/avatar">更換頭像</a></li>
                            <li><a href="#">更換密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li> <a href="/users/logout">登出</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><img class="media-object img-circle" src="{{ Auth::user()->avatar }}" alt="32x32" style="width: 32px;height: 32px"/> </a>

                    </li>

                @else
                <li><a href="/users/login">登入</a></li>
                <li><a href="/users/register">註冊</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

@yield('content')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</body>
</html>