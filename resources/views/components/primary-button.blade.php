<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-pill btn bg-main-dark-green shadow w-40 text-center align-middle text-light']) }}>
    {{ $slot }}
</button>
