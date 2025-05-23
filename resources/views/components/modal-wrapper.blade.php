<div class="position-relative" style="z-index: 1050;" x-data="{ visible: @entangle($attributes->wire('model')) }" x-show="visible">
    <div class="position-fixed top-0 start-0 w-100 vh-100 overflow-auto">
        <div class="d-flex min-vh-100 align-items-center justify-content-center p-4 text-center">

            <!-- Background overlay -->
            <div class="position-fixed top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>

            <!-- Modal content -->
            <div class="position-relative bg-white rounded shadow p-4 text-start"
                style="z-index: 1060; min-width: 300px;">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
