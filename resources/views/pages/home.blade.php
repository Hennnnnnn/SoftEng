@include('partials.head')

<x-navbar />

<div class="bg-main-light-green d-flex justify-content-center align-items-center min-vh-100 w-100 m-0">
    <div class="content-box bg-light min-vh-90 p-5 rounded-4 w-60">
        <div class="row">
            <div class="col-12 col-md-6 text-right font-weight-bold">
                <span class=h5>
                    Trending DIY Tutorials :
                </span>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($list as $item)
                <div class="col-12 col-md-6 row mt-3">
                    <div class="col-1">
                        {{ $loop->index + 1 }}.
                    </div>
                    <div class="col-11 col-md-5">
                        <img src="https://picsum.photos/150" class="rounded img-thumbnail">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="col-12">
                            <span class="h4">
                                {{ $item['name'] }}
                            </span>
                        </div>
                        <div class="col-12">
                            {{ $item['username'] }}
                        </div>
                        <div class="col-12">
                            <span class="fs-12">
                                {{ formatLikes($item['likes']) }} likes | 1 Month Ago
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-0 col-md-9">

            </div>
            <div class="col-12 col-md-3">
                <div class="rounded-pill btn bg-main-dark-green shadow w-100 text-center align-middle">
                    <a a href="/diy-list" class="text-decoration-none text-light font-weight-bold">
                        See more tutorials >
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
