
<x-pendaftaran.apps title="Data Peserta">
    @if((Auth::user()->dataPendaftar->konfir == 2 or Auth::user()->dataPendaftar->konfir == 0))
        @if(Auth::user()->dataPendaftar->jenis == 'dalam')
            <x-pendaftaran.form-dalam/>
        @else
            <x-pendaftaran.form-luar/>
        @endif
    @else
        <div class="alert alert-danger">
            <p class="font-size-20 text-center my-1"><i class="mdi mdi-information"></i> Mohon Maaf, Klik <strong>Perbaiki
                    Data Pendaftaran</strong> terlebih dahulu.</p>
        </div>

    @endif
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"/>
    @endpush
    @push('js')
        <script src="{{ asset('assets/libs/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $(".input-mask").inputmask();
            });

        </script>
        @if(session('sukses'))
            <script type="text/javascript">
                Swal.fire({
                    icon: "success",
                    title: "{!! session('sukses') !!}",
                    showConfirmButton: !1,
                    timer: 1000
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
</x-Pendaftaran.apps>
