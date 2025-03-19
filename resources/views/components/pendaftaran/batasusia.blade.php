@if($usia == 1)
    <div class="card alert border mt-4 mt-lg-0 p-0 mb-3">
        <div class="card-header bg-soft-danger">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h5 class="font-size-16 text-danger my-1">Danger Alert</h5>
                </div>
                <div class="flex-shrink-0">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="text-center">
                <div class="mb-4">
                    <i class="mdi mdi-alert-outline display-4 text-danger"></i>
                </div>
                <h4 class="alert-heading">Something went wrong</h4>
                <p class="mb-0">Sorry ! Product not available</p>

            </div>
        </div>
    </div>
@endif
