<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeDelivery</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.css" media="screen" title="no title" charset="utf-8">

    <link rel="stylesheet" href="/assets/css/custom.css" media="screen" title="no title" charset="utf-8">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">CodeDelivery</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                            <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-folder"></i> Categorias</a></li>
                            <li><a href="{{ route('admin.products.index') }}"><i class="fa fa-archive"></i> Produtos</a></li>
                            <li><a href="{{ route('admin.clients.index') }}"><i class="fa fa-users"></i> Clientes</a></li>
                            <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-shopping-cart"></i> Pedidos</a></li>
                            <li><a href="{{ route('admin.cupoms.index') }}"><i class="fa fa-tag"></i> Cupoms</a></li>
                            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> Usuários</a></li>
                        @elseif(Auth::user()->role == 'client')
                            <li><a href="{{ route('customer.orders.index') }}"><i class="fa fa-shopping-cart"></i> Meus Pedidos</a></li>
                        @endif
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->guest())
                        @if(!Request::is('auth/login'))
                            <li><a href="{{ url('/auth/login') }}">Login</a></li>
                        @endif
                        @if(!Request::is('auth/register'))
                            <li><a href="{{ url('/auth/register') }}">Register</a></li>
                        @endif
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-user"></i>{{ auth()->user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-md-12">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    @yield('post-script')
</body>
</html>
