@include('partials.head')
<x-navbar />

<div class="p-4">
    <h1 class="text-lg font-bold mb-4">Product Information</h1>
    <div class="row">
        <div class="col-12 mx-auto px-4">
            <hr class="border-main-dark-green border-4 ">
        </div>
    </div>
    <form action="{{ route('marketplace.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Product Image -->
        <div class="row mb-4 form-group">
            <div class="col-3">
                <label for="productImage" class="block text-sm font-medium text-gray-700">Product Image</label>
            </div>
            <div class="col-6">
                <input type="file" name="image" id="productImage" accept="image/*"
                    class="d-none">
                <label for="productImage" class="square-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                      </svg>
                </label>
                @error('productImage')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Product Name -->
        <div class="mb-4 row form-group">
            <div class="col-3">
                <label for="productName" class="block text-sm font-medium text-gray-700">Product Name</label>
            </div>
            <div class="col-6">
                <input type="text" name="productName" id="productName" class="mt-1 p-2 border rounded-md w-full form-control"
                    value="{{ old('productName') }}">
                @error('productName')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Product Description -->
        <div class="mb-4 row form-group">
            <div class="col-3">
                <label for="productDescription" class="block text-sm font-medium text-gray-700">Product Description</label>
            </div>
            <div class="col-6">
                <textarea name="productDescription" id="productDescription" rows="4" class="mt-1 p-2 border rounded-md w-full form-control">{{ old('productDescription') }}</textarea>
                @error('productDescription')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Product Price -->
        <div class="mb-4 row form-group">
            <div class="col-3">
                <label for="productPrice" class="block text-sm font-medium text-gray-700">Product Price</label>
            </div>
            <div class="col-6">
                <input type="text" name="productPrice" id="productPrice" class="mt-1 p-2 border rounded-md w-full form-control" 
                    value="{{ old('productPrice') }}">
                @error('productPrice')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Delivery Checkbox -->
        <div class="mb-4 row form-group">
            <div class="col-3">
                <label for="delivery" class="block text-sm font-medium text-gray-700">Delivery</label>
            </div>
            <div class="col-6">
                <input type="checkbox" name="delivery" id="delivery" class="mt-1 form-check-input mr-2">
                <label for="delivery" class="ml-2 text-gray-600 form-check-label">Gratis</label>
                @error('delivery')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Pengambilan Checkbox -->
        <div class="mb-4 row form-group">
            <div class="col-3">
                <label for="pengambilan" class="block text-sm font-medium text-gray-700">Pengambilan</label>
            </div>
            <div class="col-6">
                <input type="checkbox" name="pengambilan" id="pengambilan" class="mt-1 form-check-input mr-2">
                <label for ="pengambilan" class="ml-2 text-gray-600 form-check-label">Bebas</label>
                @error('pengambilan')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn bg-main-dark-green text-light">Submit</button>
            </div>
        </div>
    </form>
</div>
