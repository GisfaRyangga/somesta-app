<nav class="navbar navbar-expand-lg navbar-dark bg-navbar text-white fixed-top sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">SOMESTA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-self-sm-center" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "form") ? 'active' : '' }}"
                    href="/form">Input Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "uploadcsv") ? 'active' : '' }}"
                    href="/uploadcsv">Upload Excel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "show") ? 'active' : '' }}"
                    href="/show">Show Customer</a>
                </li>
                @if (Session::get('thisUserRole') == 'super_admin')
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "register") ? 'active' : '' }}"
                        href="/register_form">Add Admin</a>
                    </li>
                @else
                    
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "about") ? 'active' : '' }}"
                    href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "logout") ? 'active' : '' }}"
                    href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
