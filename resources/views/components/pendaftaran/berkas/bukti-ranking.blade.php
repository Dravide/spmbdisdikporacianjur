<div class="card">
    <div class="card-body">
        <form action="{{ route('updatedata') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label">Kelas 5 Semester 1</label>
                        <div class="input-group">
                            <div class="input-group-text">Ranking</div>
                            <select class="form-select" id="inlineFormSelectPref" name="5sm1" required>
                                <option value="" selected disabled>Pilih Ranking</option>
                                <option value="1" {{ (isset($hasil5sm1) && $hasil5sm1 == 1 ? 'selected' : '') }}>1
                                </option>
                                <option value="2" {{ (isset($hasil5sm1) && $hasil5sm1 == 2 ? 'selected' : '') }}>2
                                </option>
                                <option value="3" {{ (isset($hasil5sm1) && $hasil5sm1 == 3 ? 'selected' : '') }}>3
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label">Kelas 5 Semester 2</label>
                        <div class="input-group">
                            <div class="input-group-text">Ranking</div>
                            <select class="form-select" id="inlineFormSelectPref" name="5sm2" required>
                                <option value="" selected disabled>Pilih Ranking</option>
                                <option value="1" {{ (isset($hasil5sm2) && $hasil5sm2 == 1 ? 'selected' : '') }}>1
                                </option>
                                <option value="2" {{ (isset($hasil5sm2) && $hasil5sm2 == 2 ? 'selected' : '') }}>2
                                </option>
                                <option value="3" {{ (isset($hasil5sm2) && $hasil5sm2 == 3 ? 'selected' : '') }}>3
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label">Kelas 6 Semester 1</label>
                        <div class="input-group">
                            <div class="input-group-text">Ranking</div>
                            <select class="form-select" id="inlineFormSelectPref" name="6sm1" required>
                                <option value="" selected disabled>Pilih Ranking</option>
                                <option value="1" {{ (isset($hasil6sm1) && $hasil6sm1 == 1 ? 'selected' : '') }}>1
                                </option>
                                <option value="2" {{ (isset($hasil6sm1) && $hasil6sm1 == 2 ? 'selected' : '') }}>2
                                </option>
                                <option value="3" {{ (isset($hasil6sm1) && $hasil6sm1 == 3 ? 'selected' : '') }}>3
                                </option>
                            </select>
                        </div>
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
