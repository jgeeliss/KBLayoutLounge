<header>
    <nav>

        @if (session('status'))
            <div style="position: fixed; top: 55px; width: 100%;">
                {{ session('status') }}
            </div>
        @endif
        <ul>
            <li style="flex-grow: 0.1;"></li>
            <li>
                <div><span style="font-family: LinBiolinum_Kah, serif; font-size: 1.2em; letter-spacing: -0.1em;">30</span><span style="margin-left: 0.1em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">keys</span></div>
            </li>
            <!-- a spacer here -->
            <li style="flex-grow: 1;"></li>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('keyboards.index') }}">Keyboard Layouts</a></li>
            <li><a href="{{ route('keyboards.create') }}">Add Keyboard</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <!-- a spacer here -->
            <li style="flex-grow: 1;"></li>

            <!-- Authentication links -->

            @auth
                <li class="dropdown">
                    <a href="#" onclick="toggleDropdown(event)">User {{ auth()->user()->user_alias }}</a>
                    <ul id="dropdown-menu" style="display: none; position: absolute;">
                        <li style="display: block; text-align: left;"><a href="{{ route('logout') }}">My layouts</a></li>
                        <li style="display: block; text-align: left;"><a href="{{ route('logout') }}">My comments</a></li>
                        <li style="display: block; text-align: left;"><a href="{{ route('logout') }}">My ratings</a></li>
                        <li style="display: block; text-align: left;"><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('signup') }}">Signup</a></li>
            @endauth
            <!-- a spacer here -->
            <li style="flex-grow: 0.1;"></li>
        </ul>
    </nav>

    <script>
        function toggleDropdown(event) {
            const menu = document.getElementById("dropdown-menu");
            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        }
    </script>
</header>