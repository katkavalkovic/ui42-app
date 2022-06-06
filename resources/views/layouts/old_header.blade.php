<header>
    <div class="container">
        <div class="row p-1">
            <div class="col-12 col-md-3">
                <img src="{{ asset('/img/logo.jpg') }}" width="180px" alt="Logo Effective cleaning and gardening.">
            </div>
            <div class="col-12 col-md-9 d-flex align-items-center justify-content-end">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start p-0">
                        <span class="cl-blue fw-medium me-3 text-end">{{ __('Kontakty a čísla na oddelenia') }}</span>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                EN
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">SK</a></li>
                                <li><a class="dropdown-item" href="#">EN</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-end p-0">
                        <form id="searchForm" class="d-flex">
                            <div class="input-group me-2">
                                <input type="text" class="form-control" aria-label="Search"
                                    aria-describedby="search-img">
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
        </div>
    </div>
</header>
