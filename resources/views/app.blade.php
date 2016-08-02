<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>論壇</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">論壇</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首頁</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                    <li><a href="/users/logout">登出</a></li>
                @else
                <li><a href="/users/login">登入</a></li>
                <li><a href="/users/register">註冊</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

@yield('content')
</body>
</html>