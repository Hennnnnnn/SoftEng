@include('partials.head')

<x-navbar />

<div class="p-4">
    <form action="{{ route('diy-list') }}" method="GET" id="searchForm" class="input-group w-90 mx-auto"> 
        <input type="text" name="query" id="searchBox" placeholder="Search..." class="form-control rounded-pill shadow p-3 mt-4">
    </form>
    <div class="row">
        <div class="col-12 col-md-6 align-middle">
            <div class="row border-bottom border-3 border-main-dark-green px-1 py-4">
                <div class="col-2 align-middle">
                    <img src="https://picsum.photos/150" class="img-circle">
                </div>
                <div class="col-7 d-flex align-items-end pb-3">
                    <input type="text" class="form-control border-0 no-border" placeholder="Start A Discussion...">
                </div>
                <div class="col-3 d-flex align-items-center justify-content-end">
                    <button
                        type="button"
                        class="rounded-3 btn bg-main-dark-green shadow text-center align-middle text-light font-weight-bold px-3">
                        Post
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach($postList as $item)
                    <div class="px-1 py-4 row border-bottom border-3 border-main-dark-green">
                        <div class="col-2">
                            <img src="https://picsum.photos/150" class="img-circle">
                        </div>
                        <div class="col-9">
                            <div class="col-12">
                                <span class="h5 font-weight-bold">
                                    user name
                                </span>
                            @if($item['status'])
                                <span class="h6 text-secondary">
                                    <b>
                                        .
                                    </b>
                                    Followed
                                </span>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill mb-1" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                              </svg>
                            @endif
                            </div>
                            <div class="col-12">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum nesciunt aliquid eum sequi! Numquam tempora nulla sint eius illo ullam autem reiciendis iusto. Quidem eius ratione quis ad, incidunt accusamus dignissimos quisquam earum quas veniam illum possimus voluptatum, enim dicta perspiciatis natus eveniet cum ipsam, officiis et optio! Non tempora tempore vitae nihil unde est recusandae consequuntur rem dolores tenetur aperiam nobis, adipisci sequi natus accusantium quidem nemo odio optio. Nihil architecto sunt quae nesciunt temporibus, quaerat, enim nemo incidunt dolorum tenetur dicta veritatis reprehenderit recusandae non placeat laudantium quam, nam provident deserunt quibusdam! Voluptas ut ipsum sint! Totam, dolores?
                            </div>
                            <div class="col-12 d-flex justify-content-between w-50 align-items-middle mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                    <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/>
                                  </svg>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-0 col-md-2">

        </div>
    
        <div class="col-12 col-md-4 border border-2 border-main-dark-green p-3 rounded-3   max-vh-75">
            <div class="row">
                <div class="col-12">
                    <span class="font-weight-bold h5 main-dark-green">
                        Who to follow
                    </span>
                </div>
            </div>
            <div class="row mt-3">
                @foreach($userList as $item)
                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-3 align-middle">
                            <img src="https://picsum.photos/150" class="img-circle">
                        </div>
                        <div class="col-6 d-flex align-items-end pb-3">
                            <span>
                                {{ $item['username'] }}
                            </span>
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-end">
                        <button
                            type="button"
                            class="rounded-3 btn bg-main-dark-green shadow text-center align-middle text-light font-weight-bold px-3">
                            Follow
                        </button>

                    </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>