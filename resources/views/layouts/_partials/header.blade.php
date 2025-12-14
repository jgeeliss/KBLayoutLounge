<header>
    <nav>

        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif
        <ul>
            <li class="nav-spacer-small"></li>
            <li>
                <div><span class="logo-number">30</span><span class="logo-text">keys</span></div>
            </li>
            <!-- a spacer here -->
            <li class="nav-spacer"></li>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('keyboards.index') }}">Keyboard Layouts</a></li>
            <li><a href="{{ route('keyboards.create') }}">Add Keyboard</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <!-- a spacer here -->
            <li class="nav-spacer"></li>

            <!-- Authentication links -->

            @auth
                <li class="dropdown">
                    <a href="#" onclick="toggleDropdown(event)">User {{ auth()->user()->user_alias }}</a>
                    <ul id="dropdown-menu" class="dropdown-menu">
                        <li class="dropdown-item"><a href="{{ route('keyboards.myLayouts') }}">My layouts</a></li>
                        <li class="dropdown-item"><a href="{{ route('keyboards.myComments') }}">My comments</a></li>
                        <li class="dropdown-item"><a href="{{ route('logout') }}">My ratings</a></li>
                        <li class="dropdown-item"><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('signup') }}">Signup</a></li>
            @endauth
            <!-- a spacer here -->
            <li class="nav-spacer-small"></li>
        </ul>
    </nav>

    <script>
        function toggleDropdown(event) {
            const menu = document.getElementById("dropdown-menu");
            menu.classList.toggle("dropdown-menu-visible");
        }
    </script>
</header>