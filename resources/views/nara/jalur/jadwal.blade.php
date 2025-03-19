<x-apps>
    <x-title-nara>
        <x-slot name="title">Jadwal Jalur PPDB</x-slot>
    </x-title-nara>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Jam</td>
                            <td>105</td>
                            <td>
                                <div class="mb-0">
                                    <label class="form-label">Date Range</label>
                                    <div class="input-daterange input-group" id="datepicker6"
                                         data-date-format="dd MM yyyy" data-date-autoclose="true"
                                         data-provide="datepicker" data-date-container="#datepicker6">
                                        <input type="text" class="form-control" name="start"
                                               placeholder="Start Date">
                                        <input type="text" class="form-control" name="end" placeholder="End Date">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @push('css')
        <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    @endpush

    @push('js')

        <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

        <script>
            $(document).ready(function () {
                $('.input-daterange').datepicker({
                    todayBtn: "linked",
                    language: "id",
                    autoclose: true,
                    todayHighlight: true
                });
            });
        </script>
    @endpush
</x-apps>
