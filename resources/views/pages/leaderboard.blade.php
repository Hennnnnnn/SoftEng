@include('partials.head')
<x-navbar />
<div class="p-4">
    <div class="row mt-4">
        <div class="col-10 col-md-10">
            <span class="font-weight-bold h4">
                Leaderboard
            </span>
        </div>
        <div class="col-1 col-md-2 text-right">
            <div class="rounded-pill btn bg-main-dark-green shadow w-100 text-center align-middle">
                <a href="/diy-list" class="text-decoration-none text-light font-weight-bold">
                    Redeem Points
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-10 col-md-6">
            <span class="font-weight-bold h4">
                My ranking
            </span>
        </div>
        <div class="col-10 col-md-6" style="text-align: right;">
            <span class="font-weight-bold h4">
                Points
            </span>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="rounded-3 border border-main-dark-green border-3 shadow p-2 align-middle">
                <div class="row">
                    <div class="col-11">
                        <span class="main-dark-green font-weight-bold h4 mr-3">
                            {{ $loggedInUserRank }}
                        </span>
                        <img src="#" class="rounded-circle img-thumbnail">
                        <span class="main-dark-green font-weight-bold h5">
                            {{ $loggedInUser->name }}
                        </span>
                    </div>
                    <div class="col-1 align-middle" style="text-align: right;">
                        <span class="main-dark-green font-weight-bold h5">
                            {{ $loggedInUser->points }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-10 col-md-6">
            <span class="font-weight-bold h4">
                Top Ranks
            </span>
        </div>
    </div>

    <div class="row mt-2">
        @foreach($users as $index => $user)
        <div class="col-12 mt-3">
            <div class="rounded-3 border border-main-dark-green border-3 shadow p-2 align-middle">
                <div class="row">
                    <div class="col-11">
                        <span class="main-dark-green font-weight-bold h4 mr-3">
                            {{ $index + 1 }}
                        </span>
                        <img src="#" class="rounded-circle img-thumbnail">
                        <span class="main-dark-green font-weight-bold h5">
                            {{ $user->name }}
                        </span>
                    </div>
                    <div class="col-1 align-middle" style="text-align: right;">
                        <span class="main-dark-green font-weight-bold h5">
                            {{ $user->points }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
