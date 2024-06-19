@include('partials.head')
<x-navbar />

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
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
