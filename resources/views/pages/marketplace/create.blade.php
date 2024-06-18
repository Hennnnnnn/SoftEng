@include('partials.head')
<x-navbar />

<div class="p-4">
    <h1 class="text-lg font-bold mb-4">Product Information</h1>
    <form action="{{ route('marketplace.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Product Image -->
        <div class="mb-4">
            <label for="productImage" class="block text-sm font-medium text-gray-700">Product Image</label>
            <input type="file" name="image" id="productImage" accept="image/*"
                class="mt-1 p-2 border rounded-md w-full">
            @error('productImage')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Name -->
        <div class="mb-4">
            <label for="productName" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="productName" id="productName" class="mt-1 p-2 border rounded-md w-full"
                value="{{ old('productName') }}">
            @error('productName')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Description -->
        <div class="mb-4">
            <label for="productDescription" class="block text-sm font-medium text-gray-700">Product Description</label>
            <textarea name="productDescription" id="productDescription" rows="4" class="mt-1 p-2 border rounded-md w-full">{{ old('productDescription') }}</textarea>
            @error('productDescription')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="mb-4">
            <label for="productPrice" class="block text-sm font-medium text-gray-700">Product Price</label>
            <input type="text" name="productPrice" id="productPrice" class="mt-1 p-2 border rounded-md w-full"
                value="{{ old('productPrice') }}">
            @error('productPrice')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Delivery Checkbox -->
        <div class="mb-4">
            <label for="delivery" class="block text-sm font-medium text-gray-700">Delivery</label>
            <input type="checkbox" name="delivery" id="delivery" class="mt-1">
            <span class="ml-2 text-gray-600">Gratis</span>
            @error('delivery')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Pengambilan Checkbox -->
        <div class="mb-4">
            <label for="pengambilan" class="block text-sm font-medium text-gray-700">Pengambilan</label>
            <input type="checkbox" name="pengambilan" id="pengambilan" class="mt-1">
            <span class="ml-2 text-gray-600">Bebas</span>
            @error('pengambilan')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Submit</button>
        </div>
    </form>
</div>
