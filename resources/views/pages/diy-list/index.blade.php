@include('partials.head')

<x-navbar />
<div class="p-4">
    <form action="{{ route('diy-list') }}" method="GET" id="searchForm" class="input-group w-90 mx-auto">
        <input type="text" name="query" id="searchBox" placeholder="Search..." class="form-control rounded-pill shadow p-3 mt-4">
    </form>

    <div class="row mt-4">
        <div class="col-10 col-md-6">
            <span class="font-weight-bold h5">
                Newest upload
            </span>
        </div>
        <div class="col-1 col-md-6 text-right" style="
        text-align: right;">
            <a href="{{ route('diy-list.add') }}" class="btn btn-success align-middle text-center">
                +
            </a>
        </div>
    </div>
    <div class="row flex-row flex-nowrap overflow-auto mt-4">
        @foreach($list as $item)
        <div class="col-3">
            <div class="card shadow mr-4 my-1">
                <div class="card-img-container">
                    <img src="https://picsum.photos/50" class="card-img-top rounded img-thumbnail">
                </div>
                </img>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $item['name'] }}
                    </h5>
                    <p class="card-text">
                        {{ $item['username'] }}
                    </p>
                    <div class="card-text">
                        <span class="fs-12">
                            {{ formatLikes($item['likes']) }} likes | 1 Month Ago
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-4">
        <div class="col-12 col-md-6">
            <span class="font-weight-bold h5">
                Trending Tutorials
            </span>
        </div>
    </div>

    <div class="row mt-4">
        @foreach($list as $item)
            <div class="col-12 col-md-3 mt-3 mr-4">
                <div class="card shadow">
                    <div class="card-img-container">
                        <img src="https://picsum.photos/50" class="card-img-top rounded img-thumbnail">
                    </div>
                    </img>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $item['name'] }}
                        </h5>
                        <p class="card-text">
                            {{ $item['username'] }}
                        </p>
                        <div class="card-text">
                            <span class="fs-12">
                                {{ formatLikes($item['likes']) }} likes | 1 Month Ago
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
