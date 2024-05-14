
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid ">
            <a class="navbar-brand text-light" href="#">Task Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tasks
                        </a>
                        <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('task.create')}}">create</a></li>
                            <li><a class="dropdown-item" href="{{route('task.index')}}"> View tasks</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('service.create')}}">create services</a></li>
                            <li><a class="dropdown-item" href="{{route('service.index')}}"> View services</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Files
                        </a>
                        <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('file.create')}}">create file</a></li>
                            <li><a class="dropdown-item" href="{{route('file.index')}}"> View file</a></li>
                           
                        </ul>
                    </li>
                   
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success text-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>