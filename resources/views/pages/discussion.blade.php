@include('partials.head')

<body>
    <x-navbar>
    </x-navbar>
    <div class="container mt-4">
        <form class="form-inline">
            <div class="container mt-4">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
