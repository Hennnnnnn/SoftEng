@include('partials.head')
<x-navbar />

<div class="mt-5 min-vh-100 w-100 m-0">
    @if (Route::currentRouteName() === 'user.profile.update.index')
        <div class="row mt-5">
            <div class="col-12 text-center">
                <span class="h1">
                    Edit Profile
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto px-4">
                <hr class="border-main-dark-green border-4 ">
            </div>
        </div>
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="my-5">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 text-center form-group">
                    <div class="row">
                        <div class="col-12">
                            <img id="image" src="{{ asset('upload/profile_images/' . Auth::user()->image) }}"
                                alt="Profile Image" class="rounded-circle" width="250" height="250"
                                onerror="this.src='default_image_path.jpg';">
                            <div class="col-12 d-flex justify-content-center">
                                <input type="file" name="image" id="image" class="form-control mt-2 w-50">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group mt-2">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="telephone_number">Telephone Number:</label>
                        <input type="text" name="telephone_number" id="telephone_number" class="form-control"
                            value="{{ Auth::user()->telephone_number }}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ Auth::user()->address }}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="" {{ Auth::user()->gender == '' ? 'selected' : '' }}>Select Gender
                            </option>
                            <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female
                            </option>
                            <option value="Other" {{ Auth::user()->gender == 'Other' ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="points">Total Points:</label>
                        <input type="number" name="points" id="points" class="form-control"
                            value="{{ Auth::user()->points }}" disabled>
                    </div>
                    <button type="submit" class="btn bg-main-dark-green mt-3">Update Profile</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12 mx-auto px-4">
                <hr class="border-main-dark-green border-4 ">
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 text-center">
                <span class="h1">
                    My Profile
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-4" style="text-align: right">
                <button class="btn btn-success px-3 py-1"
                    onclick="window.location='{{ route('user.profile.update.index') }}'">Edit</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto px-4">
                <hr class="border-main-dark-green border-4 ">
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6 col-12 text-center">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('upload/profile_images/' . Auth::user()->image) }}" alt="Profile Image"
                            class="rounded-circle" width="250" height="250"
                            onerror="this.src='default_image_path.jpg';">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="h3 mt-3">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <p class="h5">Followers <span class="divider mx-5">|</span> Following</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <p class="h6">{{ $followingCount }} <span class="divider mx-5">|</span>
                            {{ $followersCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="row mt-5">
                    <div class="col-12">
                        <span class="h4">Email:</span> <span class="h6">{{ Auth::user()->email }}</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <span class="h4">Telephone Number:</span> <span
                            class="h6">{{ Auth::user()->telephone_number ?? '-' }}</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <span class="h4">Address:</span> <span
                            class="h6">{{ Auth::user()->address ?? '-' }}</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <span class="h4">Gender:</span> <span
                            class="h6">{{ Auth::user()->gender ?? '-' }}</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <span class="h4">Total Points:</span> <span
                            class="h6">{{ Auth::user()->points }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto px-4">
                <hr class="border-main-dark-green border-4 ">
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: right">
                <a href="" class="main-dark-green text-decoration-none h4">
                    <svg width="82" height="69" viewBox="0 0 82 69" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M50.5667 23L54.6667 26.45L31.4334 46L27.3334 42.55L50.5667 23ZM13.6667 11.5H68.3334C72.1259 11.5 75.1667 14.0587 75.1667 17.25V28.75C73.3544 28.75 71.6163 29.3558 70.3348 30.4341C69.0533 31.5125 68.3334 32.975 68.3334 34.5C68.3334 36.025 69.0533 37.4875 70.3348 38.5659C71.6163 39.6442 73.3544 40.25 75.1667 40.25V51.75C75.1667 54.9412 72.1259 57.5 68.3334 57.5H13.6667C11.8544 57.5 10.1163 56.8942 8.83481 55.8159C7.55331 54.7375 6.83337 53.275 6.83337 51.75V40.25C10.6259 40.25 13.6667 37.6912 13.6667 34.5C13.6667 32.975 12.9468 31.5125 11.6653 30.4341C10.3838 29.3558 8.64569 28.75 6.83337 28.75V17.25C6.83337 15.725 7.55331 14.2625 8.83481 13.1841C10.1163 12.1058 11.8544 11.5 13.6667 11.5ZM13.6667 17.25V24.5525C15.7429 25.5599 17.4673 27.0097 18.6662 28.7559C19.8651 30.5021 20.4963 32.4833 20.4963 34.5C20.4963 36.5167 19.8651 38.4979 18.6662 40.2441C17.4673 41.9903 15.7429 43.4401 13.6667 44.4475V51.75H68.3334V44.4475C66.2571 43.4401 64.5328 41.9903 63.3339 40.2441C62.135 38.4979 61.5038 36.5167 61.5038 34.5C61.5038 32.4833 62.135 30.5021 63.3339 28.7559C64.5328 27.0097 66.2571 25.5599 68.3334 24.5525V17.25H13.6667ZM32.4584 23C35.2942 23 37.5834 24.9263 37.5834 27.3125C37.5834 29.6987 35.2942 31.625 32.4584 31.625C29.6225 31.625 27.3334 29.6987 27.3334 27.3125C27.3334 24.9263 29.6225 23 32.4584 23ZM49.5417 37.375C52.3775 37.375 54.6667 39.3013 54.6667 41.6875C54.6667 44.0737 52.3775 46 49.5417 46C46.7059 46 44.4167 44.0737 44.4167 41.6875C44.4167 39.3013 46.7059 37.375 49.5417 37.375Z"
                            fill="#579966" />
                    </svg>
                    My Vouchers
                </a>
            </div>
        </div>
    @endif
</div>
