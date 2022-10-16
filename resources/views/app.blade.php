<!DOCTYPE html>
<html>
<head>
    <title>Simple Library - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @if ($message =  Session::get('success'))
        <div class="alert alert-info" role="alert">
            {{ $message }}
        </div>
    @endif
    <main class="login-form">
        <div class="container-fluid">
       
            <div class="row">
                @auth
                     <div class="col-md-4">
                        <div class="card">
                            <div class="card-header card-title">Menu</div>
                            <div class="card-body">
                                <p><a href="{{ route('admin.dasboard') }}">Dashboard</a></p>
                                <p><a href="{{ route('admin.book') }}">Books</a></p>
                                <p><a href="{{ route('admin.request') }}">Request</a></p>
                            </div>
                        </div>
                    </div>
                @endauth
                   
                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>