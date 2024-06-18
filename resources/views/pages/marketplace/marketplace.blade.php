@include('partials.head')

<x-navbar />

<div class="p-4">
    <div class="row">
        <div class="col-12 col-md-10">
            <form action="{{ route('diy-list') }}" method="GET" id="searchForm" class="input-group w-75">
                <input type="text" name="query" id="searchBox" placeholder="Search..."
                    class="form-control rounded-pill shadow p-3 mt-4">
            </form>
        </div>

        <div class="col-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('marketplace.create') }}" class="btn bg-main-dark-green text-light">
                +
            </a>
        </div>
    </div>

    <div class="row mt-3">
        @foreach ($list as $item)
            <div class="col-12 col-md-3 mt-3 mr-4">
                <div class="card shadow">
                    <img src="{{ $item->image }}" class="card-img-top rounded img-thumbnail">
                    </img>
                    <div class="card-body">
                        <h5 class="card-title">
                            [{{ $item->productName }}] {{ $item['name'] }}
                        </h5>
                        <p class="card-text">
                            <span class="border border-main-dark-green p-1 mr-3">
                                @if($item->pengambilan)
                                    Bebas Pengambilan
                                @else

                                @endif
                            </span>
                            <span class="border border-main-dark-green p-1">
                                @if($item->delivery)
                                    Gratis Ongkir
                                @else
                                    GA TAU MAU ISI APA
                                @endif
                            </span>
                        </p>
                        <p class="card-text main-dark-green font-weight-bold h5">
                            {{ $item->productProce }}
                        </p>
                        @if(isset($item['sold']) && $item['sold'])
                        <div class="card-text">
                            <span class="fs-12">
                                {{ $item->sold }}
                                Terjual
                            </span>
                        </div>
                        @else
                        @endIf
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
