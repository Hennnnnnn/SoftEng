@include('partials.head')
<x-navbar />

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="text-center py-2">
                    <h4>My Profile</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-center mb-4">
                            <div class="profile-image mb-3">
                                <img src="{{ asset('storage/profile_images/' . Auth::user()->image) }}"
                                    alt="Profile Image" class="rounded-circle" width="150" height="150"
                                    onerror="this.src='default_image_path.jpg';">
                            </div>
                            <label for="profile_image" class="btn btn-secondary">
                                <i class="fas fa-upload"></i> Choose profile image
                                <input type="file" class="form-control-file d-none" id="image" name="image">
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update Profile Image</button>
                        </div>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-success mt-3 text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container profile-section">
    <h2 class="text-center my-4">MY PROFILE</h2>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4 text-center">
            <img src="{{ asset('storage/profile_images/' . Auth::user()->image) }}" alt="Profile Image"
                class="rounded-circle" width="150" height="150" onerror="this.src='default_image_path.jpg';">
            <h3>{{ Auth::user()->name }}</h3>
            <p>Followers <span class="divider">|</span> Following</p>
            <p>{{ $followingCount }} <span class="divider">|</span> {{ $followersCount }}</p>
        </div>
        <div class="col-md-6">
            <div class="profile-info">
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                @if (!Auth::user()->telephone_number)
                    <p><strong>Telephone Number:</strong> -</p>
                @else
                    <p><strong>Telephone Number:</strong> {{ Auth::user()->telephone_number }}</p>
                @endif
                @if (!Auth::user()->address)
                    <p><strong>Address:</strong> -</p>
                @else
                    <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
                @endif
                @if (!Auth::user()->gender)
                    <p><strong>Gender:</strong> -</p>
                @else
                    <p><strong>Gender:</strong> {{ Auth::user()->gender }}</p>
                @endif
                <p><strong>Total Points:</strong> {{ Auth::user()->points }}</p>
            </div>
        </div>
    </div>
    <div class="voucher-button">
        <button class="btn btn-outline-success">My Voucher</button>
    </div>
</div>
