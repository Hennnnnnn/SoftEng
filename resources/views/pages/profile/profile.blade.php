@include('partials.head')
<x-navbar />

<div class="container profile-section">
    <h2 class="text-center my-4">MY PROFILE</h2>
    @if (Route::currentRouteName() === 'user.profile.update.index')
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4 text-center">
                    <img id="image" src="{{ asset('upload/profile_images/' . Auth::user()->image) }}"
                        alt="Profile Image" class="rounded-circle" width="150" height="150"
                        onerror="this.src='default_image_path.jpg';">
                    <input type="file" name="image" id="image" class="form-control mt-2">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone_number">Telephone Number:</label>
                        <input type="text" name="telephone_number" id="telephone_number" class="form-control"
                            value="{{ Auth::user()->telephone_number }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ Auth::user()->address }}">
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="points">Total Points:</label>
                        <input type="number" name="points" id="points" class="form-control"
                            value="{{ Auth::user()->points }}" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </div>
        </form>
    @else
        <button onclick="window.location='{{ route('user.profile.update.index') }}'">Edit</button>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset('upload/profile_images/' . Auth::user()->image) }}" alt="Profile Image"
                    class="rounded-circle" width="150" height="150" onerror="this.src='default_image_path.jpg';">
                <h3>{{ Auth::user()->name }}</h3>
                <p>Followers <span class="divider">|</span> Following</p>
                <p>{{ $followingCount }} <span class="divider">|</span> {{ $followersCount }}</p>
            </div>
            <div class="col-md-6">
                <div class="profile-info">
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Telephone Number:</strong> {{ Auth::user()->telephone_number ?? '-' }}</p>
                    <p><strong>Address:</strong> {{ Auth::user()->address ?? '-' }}</p>
                    <p><strong>Gender:</strong> {{ Auth::user()->gender ?? '-' }}</p>
                    <p><strong>Total Points:</strong> {{ Auth::user()->points }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
