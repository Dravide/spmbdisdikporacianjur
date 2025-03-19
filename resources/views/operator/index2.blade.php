<x-operator.apps>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Home</h4>
                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <!--<div class="row mb-3">-->
    <!--    <div class="col-12">-->
    <!--        <div class="card alert border mt-4 mt-lg-0 p-0 mb-0">-->
    <!--            <div class="card-header bg-soft-danger">-->
    <!--                <div class="d-flex">-->
    <!--                    <div class="flex-grow-1">-->
    <!--                        <h5 class="font-size-16 text-danger my-1">Informasi Maintenance</h5>-->
    <!--                    </div>-->
    <!--                    <div class="flex-shrink-0">-->
    <!--                        <button type="button" class="btn-close" data-bs-dismiss="alert"-->
    <!--                                aria-label="Close"></button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="card-body">-->
    <!--                <div class="text-center">-->
    <!--                    <div class="mb-4">-->
    <!--                        <i class="mdi mdi-alert-outline display-4 text-danger"></i>-->
    <!--                    </div>-->
    <!--                    <h4 class="alert-heading">Sehubungan dengan adanya ketidaksesuaian data Cut Off Pusdatin-->
    <!--                        dengan-->
    <!--                        Data Verval PD yang sudah diupdate, maka Kami akan melakukan Maintenance untuk Update-->
    <!--                        Data-->
    <!--                        Cut Off beserta dengan Update Minor lainnya pada Pukul 15.00 WIB sampai dengan Selesai,-->
    <!--                        setelah itu akan kami sampaikan Change Log setelah Maintenance Selesai.</h4>-->
    <!--                    <p class="mb-0">Terima Kasih serta Mohon Maaf dan Mohon dimaklumi demi kelancaran PPDB-->
    <!--                        dihari-->
    <!--                        selanjutnya.</p>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0  me-3 align-self-center">
                            <div class="avatar-sm">
                                <div class="avatar-title bg-soft-info rounded-circle text-info font-size-20">
                                    <i class="mdi mdi-account-details"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Jumlah Pendaftar</p>
                            <h5 class="mb-1">{{ $jumlahpendaftar }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0  me-3 align-self-center">
                            <div class="avatar-sm">
                                <div class="avatar-title bg-soft-success rounded-circle text-success font-size-20">
                                    <i class="mdi mdi-account-check"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Terverifikasi</p>
                            <h5 class="mb-1">{{ $terverifiaksi }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0  me-3 align-self-center">
                            <div class="avatar-sm">
                                <div class="avatar-title bg-soft-danger rounded-circle text-danger font-size-20">
                                    <i class="mdi mdi-account-minus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Belum Terverifikasi</p>
                            <h5 class="mb-1">{{ $jumlahpendaftar - $terverifiaksi }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-operator.apps>
