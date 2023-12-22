<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>
    <style>
        body {
            padding: 5px;
        }

        .sidenav {
            width: 200px;
            height: 100%;
            background-color: gray;
            position: fixed;
            padding: 15px;
            padding-top: 60px;
        }

        .sidenav a {
            display: block;
            text-decoration: none;
            color: white;
            font-size: 18px;
            padding: 6px;
        }
        
        .main {
            margin-left: 200px;
            font-size: 15px;
            padding: 70px 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                {{-- navigation --}}
                <nav class="navbar navbar-expand-lg bg-secondary fixed-top">
                    <div class="container-fluid">
                      <a class="navbar-brand text-white" href="{{url('admin/dashboard')}}">Personal Blog</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu">
                              <form action="{{url('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item" onclick="return confirm('Are u sure to log out?')">Logout</button>
                              </form>
                              {{-- <li><a class="dropdown-item" href="#">Logout</a></li> --}}
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                </nav>

                {{-- sidebar menu --}}
                <div class="sidenav">
                    {{-- <a href="users">User</a> --}}
                    {{-- <a href="skills">Skill</a> --}}
                    {{-- <a href="projects">Project</a> --}}

                    <a href="{{url('admin/users')}}">User</a>
                    <a href="{{url('admin/skills')}}">Skill</a> 
                    <a href="{{url('admin/projects')}}">Project</a> 
                    <a href="{{route('student_counts.index')}}">Student</a> 
                    <a href="{{url('admin/categories')}}">Category</a> 
                    <a href="{{url('admin/posts')}}">Post</a> 
                     
                </div>

                {{-- main content --}}
                <div class="main">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
{{-- bootstrap js --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@yield('javascript')
</body>
</html>