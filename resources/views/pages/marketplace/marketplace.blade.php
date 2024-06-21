@include('partials.head')

<x-navbar />

<div class="p-4">
    <div class="row">
        <div class="col-12 col-md-10">
            <form action="{{ route('marketplace') }}" method="GET" id="searchForm" class="input-group w-75">
                <input type="text" name="query" id="searchBox" placeholder="Search..." value="{{ $query ?? '' }}"
                    class="form-control rounded-pill shadow p-3 mt-4">
            </form>
        </div>

        <div class="col-12 col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('marketplace.create') }}" class="btn bg-main-dark-green text-light">
                +
            </a>
        </div>
    </div>

    <div class="row mt-3">
        @forelse ($list as $item)
            <div class="col-12 col-md-3 mt-3">
                <div class="card shadow h-100">
                    <div class="card-img-container">
                        <img src="{{ $item->image }}" alt="Image of {{ $item->name }}" class="card-img-top">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            [{{ $item->productName }}] {{ $item->name }}
                        </h5>
                        <p class="card-text mb-1">
                            @if($item->pengambilan)
                                <span class="border border-main-dark-green p-1 mr-3">
                                    Bebas Pengambilan
                                </span>
                            @endif

                            @if($item->delivery)
                                <span class="border border-main-dark-green p-1">
                                    Gratis Ongkir
                                </span>
                            @endif
                        </p>

                        <p class="card-text main-dark-green font-weight-bold h5 mb-1">
                            {{ $item->productPrice }}
                        </p>
                        @if(isset($item->sold) && $item->sold)
                            <div class="card-text mt-auto">
                                <span class="fs-12">
                                    {{ $item->sold }} Terjual
                                </span>
                            </div>
                        @endif

                        <p class="card-text mt-auto">
                            @if(empty($item->users))
                                Sold by : ...
                            @else
                                Sold by: {{ $item->users->name }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No products found.</p>
            </div>
        @endforelse
    </div>
</div>
