@include('partials.head')

<x-navbar />

<div class="px-5 py-3">
    <div class="row justify-content-center">
        <div class="col-md-10 col-12">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="mt-4" style="font-weight: bold; font-size: 20px;">Recycle Bin</p>
                </div>
                <div>
                    {{-- <p class="mt-4" style="font-size: 18px">Your Points: {{ Auth::user()->points }}</p> --}}
                </div>
            </div>

            <div class="">
                <form method="POST" action="{{ route('recycle.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="type" style="font-weight: bold">Insert items</label>
                        <input type="text" id="type" name="type" class="form-control mb-3 mt-2" placeholder="Paper / Plastic bottle / Empty can / Fabrics" style="border-color: #579966" required>
                    </div>

                    <div class="form-group">
                        <label for="quantity" style="font-weight: bold">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control mb-3 mt-2" placeholder="Must be 1 - 100" style="border-color: #579966" required>
                    </div>

                    <div class="form-group">
                        <label for="pick_up_address" style="font-weight: bold">Pick-up Address:</label>
                        <input type="text" id="pick_up_address" name="pick_up_address" class="form-control mb-3 mt-2" placeholder="Address" style="border-color: #579966" required>
                    </div>

                    <div class="form-group">
                        <label for="pick_up_date" style="font-weight: bold">Pick-up Date:</label>
                        <input type="date" id="pick_up_date" name="pick_up_date" class="form-control mb-3 mt-2" style="border-color: #579966" required>
                    </div>

                    <div class="form-group">
                        <label for="telephone_number" style="font-weight: bold">Telephone Number:</label>
                        <input type="tel" id="telephone_number" name="telephone_number" class="form-control mb-3 mt-2" placeholder="Telephone number" style="border-color: #579966"
                            required>
                    </div>

                    <div class="row py-4 ">
                        <div class="col-12 w-25">
                            <button type="submit" class="btn bg-main-dark-green text-light">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
