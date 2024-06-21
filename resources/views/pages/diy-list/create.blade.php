@include('partials.head')
<x-navbar />

<div class="p-4 min-vh-100">
    <h1 class="text-lg font-bold mb-4">Video Upload</h1>
    <div class="row">
        <div class="col-12 mx-auto px-4">
            <hr class="border-main-dark-green border-4 ">
        </div>
    </div>
    <form action="{{ route('diy-list.create') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Video Title -->
        <div class="row mb-4 form-group">
            <div class="col-3">
                <label for="videoTitle" class="block text-sm font-medium text-gray-700">DIY Title</label>
            </div>
            <div class="col-6">
                <input type="text" name="title" id="videoTitle"
                    class="mt-1 p-2 border rounded-md w-full form-control" value="{{ old('title') }}"
                    placeholder="Enter video title">
                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Video Description -->
        <div class="mb-4 row form-group">
            <div class="col-3">
                <label for="videoDescription" class="block text-sm font-medium text-gray-700">DIY Description</label>
            </div>
            <div class="col-6">
                <textarea name="description" id="videoDescription" rows="4" class="mt-1 p-2 border rounded-md w-full form-control"
                    placeholder="Enter video description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Video Upload -->
        <div class="row mb-4 form-group">
            <div class="col-3">
                <label for="diyImage" class="block text-sm font-medium text-gray-700">DIY Image</label>
            </div>
            <div class="col-6">
                <input type="file" name="image" id="diyImage" accept="image/*" class="d-none">
                <label for="diyImage" class="square-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                    </svg>
                </label>
                @error('diyImage')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn bg-main-dark-green text-light">Submit</button>
            </div>
        </div>
    </form>

</div>
