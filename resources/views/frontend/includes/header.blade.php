<header id="home">
    <!-- Start Navigation -->
    <nav class="navbar navbar-default attr-border navbar-sticky bootsnav">

        <!-- Start Top Search -->
        <div class="container">
            <div class="row">
                <div class="top-search">
                    <div class="input-group">
                        <form action="#">
                            <input type="text" name="text" class="form-control" placeholder="Search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="height: 50px;" src="{{ url('assets/frontend/img/logo.png')}}" class="logo" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                    <li class="{{ (request()->is('/') ? 'active' : '') }}">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="{{ (request()->is('task') ? 'active' : '') }}">
                        <a href="{{ url('/task') }}">Task</a>
                    </li>
                    <li class="{{ (request()->is('plan') ? 'active' : '') }}">
                        <a href="{{ url('/plans') }}">Plans</a>
                    </li>
                    <li class="{{ (request()->is('contact') ? 'active' : '') }}">
                        <a href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="{{ (request()->is('login') ? 'active' : '') }}">
                        <a href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="{{ (request()->is('registration') ? 'active' : '') }}">
                        <a href="{{ url('/registration') }}">Registration</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->
</header>
