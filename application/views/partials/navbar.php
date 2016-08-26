<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                CodeIgniter
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                    <li><a href="#">Fast</a></li>
                    <li><a href="#">Light</a></li>
                    <li><a href="#">The Best</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if ($this->session->userdata('user_data')) { ?>
                    <li><a href="/ci/logout">Logout</a></li>
                <?php } else { ?>
                    <li><a href="/ci/login">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>