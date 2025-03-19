<div class="table-responsive">
    <table class="table table-hover mb-0">

        <thead>
        <tr>
            <th>#</th>
            <th>Verifikasi Berkas</th>
            <th>Status</th>
            <th class="text-center ">Aksi</th>
        </tr>
        </thead>
        <tbody>

        @foreach($hasil as $key => $value)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $key }} </td>
                <td>@if($value == null)
                        <span class="badge bg-danger">Belum Upload</span>
                    @elseif($value->status == 'terima')
                        <span class="badge bg-success">Terverifikasi</span>
                    @elseif($value->status == 'tolak')
                        <span class="badge bg-warning">Perlu Perbaikan</span>
                    @else
                        <span class="badge bg-info">{{ $value->status }}Menunggu Verifikasi</span>
                    @endif</td>
                <td class="text-center">
                    @if($value)
                        <form method="POST" action="{{ route('operator.verval.update') }}">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $value->id }}">
                            @if($value->status == null)
                                <button type="submit" name="verval" value="verifikasi"
                                        class="btn btn-sm ms-2 btn-soft-success waves-effect waves-light"><i
                                        class="mdi mdi-file-check align-middle"></i> Verifikasi
                                </button>
                                <button type="submit" name="verval" value="perbaikan"
                                        class="btn btn-sm ms-2 btn-soft-warning waves-effect waves-light"><i
                                        class="mdi mdi-file-alert align-middle"></i> Perlu Perbaikan
                                </button>
                            @endif
                            @if($value->status == 'tolak')
                                <button type="submit" name="verval" value="verifikasi"
                                        class="btn btn-sm ms-2 btn-soft-success waves-effect waves-light"><i
                                        class="mdi mdi-file-check align-middle"></i> Verifikasi
                                </button>
                            @endif
                            @if($value->status == 'terima')
                                <button type="submit" name="verval" value="perbaikan"
                                        class="btn btn-sm ms-2 btn-soft-warning waves-effect waves-light"><i
                                        class="mdi mdi-file-alert align-middle"></i> Perlu Perbaikan
                                </button>
                            @endif
                            <button type="button" class="btn btn-sm ms-2 btn-soft-info waves-effect waves-light"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                    aria-controls="offcanvasRight" data-ids="" data-jalur="" data-id="{{$value->id}}"><i
                                    class="mdi mdi-file-eye align-middle"></i>
                            </button>

                        </form>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"/>
@endpush
@push('js')
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('.offcanvas').on('show.bs.offcanvas', function (e) {
                const rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    url: '{{ route('operator.verval.getBerkas') }}',
                    data: 'id=' + rowid,
                    beforeSend: function () {
                        $('.data').html('<i class="mdi mdi-spin mdi-loading"></i>');
                    },
                    success: function (data) {
                        $('.data').html(data); //menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
@endpush
