@include('partials.head')
<x-navbar />
<div class="p-4 text-center">
    <h4>My Profile</h4>
</div>

<div>
    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="profile-image">
                <img src="{{ asset('storage/profile_images/' . Auth::user()->profile_image) }}" alt="Profile Image" class="rounded-circle">
            </div>
            <input type="file" class="form-control-file" id="profile_image" name="profile_image">
        </div>
        <button type="submit" class="btn btn-primary">Update Profile Image</button>
    </form>
</div>

