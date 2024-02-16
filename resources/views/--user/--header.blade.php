<?php
use App\Http\Controllers\User\UserProductController;
$total = UserProductController::cartItem();
$cartTotal = 0;
// $cartTotal = $cartTotal->cartItem();
// dd($total);
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{-- @if (Auth::check())
                Welcome,<br>
                {{ Auth::user()->name }}
            @endif --}}
            <a class="navbar-brand" href="/">E-Com</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="/myorders">Orders</a></li>
            </ul>
            <form class="navbar-form navbar-left" method="post" action="/search">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control-search-box" placeholder="Search" name="query">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/cartlist">Cart({{ $total }})</a></li>
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">

                            {{ Auth::user()->name }}
                            <ul class="dropdown-menu">
                                <li><a href="logout">Logout</a></li>
                            </ul>
                            <span class="caret"></span>
                        </a>
                    </li>
                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @endif
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
