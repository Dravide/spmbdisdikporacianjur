<div class="card">
    <div class="card-body">
        <form action="{{ route('updatedata') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">

            <div class="row">
                <h4 class="card-title">Daftar Nilai Raport Kelas 5 Semester 1</h4>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="pabp-51">PABP</label>
                        <input type="number" class="form-control" name="51pabp"
                               value="{{ isset($hasil[0]['value']) ? $hasil[0]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group ">
                        <label for="pkn-51">PKN</label>
                        <input type="number" class="form-control" name="51pkn"
                               value="{{ isset($hasil[1]['value']) ? $hasil[1]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group ">
                        <label for="mtk-51">MTK</label>
                        <input type="number" class="form-control" name="51mtk"
                               value="{{ isset($hasil[2]['value']) ? $hasil[2]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group ">
                        <label for="bind-51">BIND</label>
                        <input type="number" class="form-control" name="51bind"
                               value="{{ isset($hasil[3]['value']) ? $hasil[3]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="ipa-51">IPA</label>
                        <input type="number" class="form-control" name="51ipa"
                               value="{{ isset($hasil[4]['value']) ? $hasil[4]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="ips-51">IPS</label>
                        <input type="number" class="form-control" name="51ips"
                               value="{{ isset($hasil[5]['value']) ? $hasil[5]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="sbp-51">SBP</label>
                        <input type="number" class="form-control" name="51sbp"
                               value="{{ isset($hasil[6]['value']) ? $hasil[6]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="pjok-51">PJOK</label>
                        <input type="number" class="form-control" name="51pjok"
                               value="{{ isset($hasil[7]['value']) ? $hasil[7]['value'] : '' }}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                <h4 class="card-title">Daftar Nilai Raport Kelas 5 Semester 2</h4>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="pabp-52">PABP</label>
                        <input type="number" class="form-control" name="52pabp"
                               value="{{ isset($hasil[8]['value']) ? $hasil[8]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group ">
                        <label for="pkn-52">PKN</label>
                        <input type="number" class="form-control" name="52pkn"
                               value="{{ isset($hasil[9]['value']) ? $hasil[9]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group ">
                        <label for="mtk-52">MTK</label>
                        <input type="number" class="form-control" name="52mtk"
                               value="{{ isset($hasil[10]['value']) ? $hasil[10]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group ">
                        <label for="bind-52">BIND</label>
                        <input type="number" class="form-control" name="52bind"
                               value="{{ isset($hasil[11]['value']) ? $hasil[11]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="ipa-52">IPA</label>
                        <input type="number" class="form-control" name="52ipa"
                               value="{{ isset($hasil[12]['value']) ? $hasil[12]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="ips-52">IPS</label>
                        <input type="number" class="form-control" name="52ips"
                               value="{{ isset($hasil[13]['value']) ? $hasil[13]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="sbp-52">SBP</label>
                        <input type="number" class="form-control" name="52sbp"
                               value="{{ isset($hasil[14]['value']) ? $hasil[14]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="pjok-52">PJOK</label>
                        <input type="number" class="form-control" name="52pjok"
                               value="{{ isset($hasil[15]['value']) ? $hasil[15]['value'] : '' }}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                <h4 class="card-title">Daftar Nilai Raport Kelas 6 Semester 1</h4>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="pabp-61">PABP</label>
                        <input type="number" class="form-control" name="61pabp"
                               value="{{ isset($hasil[16]['value']) ? $hasil[16]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group ">
                        <label for="pkn-61">PKN</label>
                        <input type="number" class="form-control" name="61pkn"
                               value="{{ isset($hasil[17]['value']) ? $hasil[17]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group ">
                        <label for="mtk-61">MTK</label>
                        <input type="number" class="form-control" name="61mtk"
                               value="{{ isset($hasil[18]['value']) ? $hasil[18]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group ">
                        <label for="bind-61">BIND</label>
                        <input type="number" class="form-control" name="61bind"
                               value="{{ isset($hasil[19]['value']) ? $hasil[19]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="ipa-61">IPA</label>
                        <input type="number" class="form-control" name="61ipa"
                               value="{{ isset($hasil[20]['value']) ? $hasil[20]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="ips-61">IPS</label>
                        <input type="number" class="form-control" name="61ips"
                               value="{{ isset($hasil[21]['value']) ? $hasil[21]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="sbp-61">SBP</label>
                        <input type="number" class="form-control" name="61sbp"
                               value="{{ isset($hasil[22]['value']) ? $hasil[22]['value'] : '' }}">
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label for="pjok-61">PJOK</label>
                        <input type="number" class="form-control" name="61pjok"
                               value="{{ isset($hasil[23]['value']) ? $hasil[23]['value'] : '' }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-soft-info waves-effect mt-3"><i
                            class="mdi mdi-content-save-outline"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
