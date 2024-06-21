@include('partials.head')

<x-navbar />

<div class="p-4">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('marketplace') }}" method="GET" id="searchForm" class="input-group w-100">
                <input type="text" name="query" id="searchBox" placeholder="Search..." value="{{ $query ?? '' }}"
                    class="form-control rounded-pill shadow p-3 mt-4">
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <span class="h4 font-weight-bold">
                My Vouchers
            </span>
        </div>
        <div>
            <span></span>
        </div>
    </div>

    <div class="row mt-3">
        @forelse ($list as $item)
            <div class="col-12 col-md-3 mt-3">
                <div class="card shadow h-100">
                    <div class="card-img-container">
                        <img src="https://picsum.photos/150" class="card-img-top">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title row mt-2">
                            <div class="col-12 col-md-6">
                                Voucher Name
                            </div>
                            <div class="col-12 col-md-6" style="text-align: right">
                                1500 Points
                            </div>
                        </h5>
                        <p class="card-text mb-1 mt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem repellat obcaecati
                            doloribus asperiores, eos
                        </p>
                        <button type="submit"
                            class="rounded-3 btn bg-main-dark-green shadow text-center align-middle text-light font-weight-bold px-3 mt-2">
                            Use Voucher
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No Vouchers found.</p>
            </div>
        @endforelse
    </div>
</div>
