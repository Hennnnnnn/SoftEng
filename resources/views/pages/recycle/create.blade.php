@include('partials.head')

<x-navbar>
</x-navbar>

<div class="px-5 py-3">

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="d-flex justify-content-between">
                <div>
                    <p class="mb-0" style="font-weight: bold; font-size: 25px;">Recycle Bin</p>
                </div>
                <div>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">Your Points: {{ $u->points }}</option>
                    @endforeach
                </div>
            </div>

            <div class="mt-3">

                <form method="POST" action="{{ route('recycle.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="type" style="font-weight: bold">Insert items</label>
                        <input type="text" id="type" name="type" class="form-control mb-3" required>
                    </div>

                    <div class="form-group">
                        <label for="quantity" style="font-weight: bold">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control mb-3" required>
                    </div>

                    <div class="form-group">
                        <label for="pick_up_address" style="font-weight: bold">Pick-up Address:</label>
                        <input type="text" id="pick_up_address" name="pick_up_address" class="form-control mb-3"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="pick_up_date" style="font-weight: bold">Pick-up Date:</label>
                        <input type="date" id="pick_up_date" name="pick_up_date" class="form-control mb-3" required>
                    </div>

                    <div class="form-group">
                        <label for="telephone_number" style="font-weight: bold">Telephone Number:</label>
                        <input type="tel" id="telephone_number" name="telephone_number" class="form-control mb-3"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Recycling Item</button>
                </form>
            </div>

        </div>
    </div>
</div>
