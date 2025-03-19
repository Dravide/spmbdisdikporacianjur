<x-apps>
    <x-title-nara>
        <x-slot name="title">Home</x-slot>
    </x-title-nara>
    <div class="row">
        {{--        <div class="col-xl-3 col-sm-6">--}}
        {{--            <div class="card">--}}
        {{--                <div class="card-body">--}}
        {{--                    <h5 class="card-title">Statistik Jumlah Pendaftar</h5>--}}
        {{--                    <div>--}}
        {{--                        <ul class="list-unstyled">--}}
        {{--                            <li class="py-3">--}}
        {{--                                <div class="d-flex">--}}
        {{--                                    <div class="avatar-xs align-self-center me-3">--}}
        {{--                                        <div class="avatar-title rounded-circle bg-light text-primary font-size-18">--}}
        {{--                                            <i class="ri-checkbox-circle-line"></i>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="flex-grow-1">--}}
        {{--                                        <p class="text-muted mb-2">Zonasi</p>--}}
        {{--                                        <div class="progress progress-sm animated-progess">--}}
        {{--                                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%"--}}
        {{--                                                 aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>--}}

        {{--                                        </div>--}}
        {{--                                        <div class="small">Jumlah</div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}

        {{--                    <hr>--}}

        {{--                    <div class="text-center">--}}
        {{--                        <div class="row">--}}
        {{--                            <div class="col-4">--}}
        {{--                                <div class="mt-2">--}}
        {{--                                    <p class="text-muted mb-2">Completed</p>--}}
        {{--                                    <h5 class="font-size-16 mb-0">70</h5>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-4">--}}
        {{--                                <div class="mt-2">--}}
        {{--                                    <p class="text-muted mb-2">Pending</p>--}}
        {{--                                    <h5 class="font-size-16 mb-0">45</h5>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-4">--}}
        {{--                                <div class="mt-2">--}}
        {{--                                    <p class="text-muted mb-2">Cancel</p>--}}
        {{--                                    <h5 class="font-size-16 mb-0">19</h5>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- end card-body -->--}}
        {{--            </div>--}}
        {{--            <!-- end card -->--}}
        {{--        </div>--}}
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0  me-3 align-self-center">
                            <div class="avatar-sm">
                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                    <i class="mdi mdi-access-point"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Jumlah Jalur</p>
                            <h5 class="mb-1">{{ $jalur }} Jalur</h5>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0  me-3 align-self-center">
                            <div class="avatar-sm">
                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                    <i class="mdi mdi-school-outline"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Jumlah Sekolah</p>
                            <h5 class="mb-1">{{ $sekolah }} Sekolah</h5>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0  me-3 align-self-center">
                            <div class="avatar-sm">
                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                    <i class="mdi mdi-nature-people"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Jumlah Pendaftar</p>
                            <h5 class="mb-1">{{ $pendaftar }} Pendaftar</h5>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>

    </div>


</x-apps>
