<header>
    <div class="container mt-1">
        <div class="header-container d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">

            <img src="{{ asset('/img/logo.jpg') }}" width="180px" alt="Logo Effective cleaning and gardening.">
            <div class="d-flex flex-column flex-md-row">
                <div class="d-flex flex-row align-items-center justify-content-center">
                    <span class="cl-blue fw-medium me-3 text-end">{{ __('Kontakty a čísla na oddelenia') }}</span>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle me-1" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            EN
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">SK</a></li>
                            <li><a class="dropdown-item" href="#">EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center justify-content-center">
                    <form id="searchForm" class="d-flex">
                        <div class="input-group me-2">
                            <input type="text" class="form-control" aria-label="Search" aria-describedby="search-img">
                            <span class="input-group-text" id="search-img">
                                <a href="#" class="d-flex">
                                    <img src="{{ asset('/img/search.svg') }}" alt="Search magnifier image." />
                                </a>
                            </span>
                        </div>
                        <button type="submit" class="btn btn-primary px-4">{{ __('Prihlásenie') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <nav class="nav justify-content-center justify-content-md-start mb-1">
            <a class="nav-link ps-0" aria-current="page" href="#">O nás</a>
            <a class="nav-link" href="#">Zoznam miest</a>
            <a class="nav-link" href="#">Inšpekcia</a>
            <a class="nav-link" href="#">Kontakt</a>
        </nav>
    </div>
</header>
