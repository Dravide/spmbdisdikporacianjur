<div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                <tr>
                    <th width="5%">#</th>
                    <th>Verifikasi Berkas</th>
                    <th width="15%">Status</th>
                    <th class="text-center" width="25%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hasil as $key => $value)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <span class="fw-medium">{{ $key }}</span>
                        </td>
                        <td>@if($value == null)
                                <span class="badge bg-danger">Belum Upload</span>
                            @elseif($value->status == 'terima')
                                <span class="badge bg-success">Terverifikasi</span>
                            @elseif($value->status == 'tolak')
                                <span class="badge bg-warning">Perlu Perbaikan</span>
                            @else
                                <span class="badge bg-info">Menunggu Verifikasi</span>
                            @endif</td>
                        <td class="text-center">
                            @if($value)
                                <div class="d-flex justify-content-center">
                                    @if($value->status == null)
                                        <button type="button" wire:click="verifikasi({{ $value->id }})" 
                                                class="btn btn-sm ms-2 btn-soft-success waves-effect waves-light">
                                            <i class="mdi mdi-file-check align-middle"></i> Verifikasi
                                        </button>
                                        <button type="button" wire:click="perbaikan({{ $value->id }})" 
                                                class="btn btn-sm ms-2 btn-soft-warning waves-effect waves-light">
                                            <i class="mdi mdi-file-alert align-middle"></i> Perlu Perbaikan
                                        </button>
                                    @endif
                                    @if($value->status == 'tolak')
                                        <button type="button" wire:click="verifikasi({{ $value->id }})" 
                                                class="btn btn-sm ms-2 btn-soft-success waves-effect waves-light">
                                            <i class="mdi mdi-file-check align-middle"></i> Verifikasi
                                        </button>
                                    @endif
                                    @if($value->status == 'terima')
                                        <button type="button" wire:click="perbaikan({{ $value->id }})" 
                                                class="btn btn-sm ms-2 btn-soft-warning waves-effect waves-light">
                                            <i class="mdi mdi-file-alert align-middle"></i> Perlu Perbaikan
                                        </button>
                                    @endif
                                    <button type="button" class="btn btn-sm ms-2 btn-soft-info waves-effect waves-light"
                                            wire:click="showBerkas({{ $value->id }})">
                                        <i class="mdi mdi-file-eye align-middle"></i>
                                    </button>
                                </div>
                            @else
                                <span class="text-muted small">Tidak ada aksi tersedia</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal untuk menampilkan detail berkas -->
    <div wire:ignore.self class="modal fade" id="berkasModal" tabindex="-1" aria-labelledby="berkasModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="berkasModalLabel"><i class="mdi mdi-file-document-outline me-1"></i> Detail Berkas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="data text-center">
                        <!-- Konten detail berkas akan dimuat di sini -->
                        <div class="p-3">
                            <i class="mdi mdi-spin mdi-loading me-1"></i> Memuat data...
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"/>
    @endpush
    
    @push('js')
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script type="text/javascript">
            document.addEventListener('livewire:initialized', function () {
                var berkasModal = new bootstrap.Modal(document.getElementById('berkasModal'));

                Livewire.on('showBerkasModal', function (event) {
                    berkasModal.show();
                    
                    // Clear previous data and show loading indicator
                    $('#berkasModal .modal-body .data').html('<div class="text-center p-3"><i class="mdi mdi-spin mdi-loading me-1"></i> Memuat data...</div>');

                    // Get berkasId from event parameter
                    let berkasId = event.detail.berkasId;

                    // Menggunakan fungsi ajax untuk pengambilan data
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'get',
                        url: '{{ route("operator.verval.getBerkas") }}',
                        data: { id: berkasId },
                        dataType: 'html',
                        success: function (data) {
                            $('#berkasModal .modal-body .data').html(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX Error:", textStatus, errorThrown);
                            let errorMessage = 'Gagal memuat data. Silakan coba lagi.';
                            
                            if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                                errorMessage = jqXHR.responseJSON.error;
                            }
                            
                            $('#berkasModal .modal-body .data').html('<div class="text-center text-danger p-3"><i class="mdi mdi-alert-circle-outline me-1"></i> ' + errorMessage + '</div>');
                        }
                    });
                });

                // Optional: Clear content when modal is hidden
                document.getElementById('berkasModal').addEventListener('hidden.bs.modal', function (event) {
                    $('#berkasModal .modal-body .data').html('<div class="text-center p-3"><i class="mdi mdi-spin mdi-loading me-1"></i> Memuat data...</div>');
                });
            });
        </script>
        
        @if(session('sukses'))
            <script type="text/javascript">
                Swal.fire({
                    icon: "success",
                    title: "{!! session('sukses') !!}",
                    showConfirmButton: !1,
                    timer: 1500
                })
            </script>
        @endif
        
        @if(session('error'))
            <script type="text/javascript">
                Swal.fire({
                    icon: "error",
                    title: "{!! session('error') !!}",
                    showConfirmButton: !1,
                    timer: 1500
                })
            </script>
        @endif
    @endpush
</div>