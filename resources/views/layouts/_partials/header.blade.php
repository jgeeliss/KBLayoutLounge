<header>
    <nav>

        @if (session('status'))
            <div style="position: fixed; top: 0; width: 100%;">
                {{ session('status') }}
            </div>
        @endif
        <ul>
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
                <li><a href="{{ route('logout') }}">User {{ auth()->user()->user_alias }}</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('signup') }}">Signup</a></li>
            @endauth
        </ul>
    </nav>
</header>