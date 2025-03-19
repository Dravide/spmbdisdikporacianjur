<div class="card">
    <div class="card-body">
        <form action="{{ route('updatedata') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="data" class="field-required">Jenis Kartu</label>
                        <select class="form-control" id="data" name="kartu" required>
                            <option value="" selected disabled>Pilih Kartu</option>
                            <option
                                value="KIP" {{ (isset($hasil[0]['value']) ? $hasil[0]['value'] : '') == 'KIP' ? 'selected' : ''  }}>
                                Kartu Indonesia Pintar (KIP)
                            </option>
                            <option
                                value="KKS" {{ (isset($hasil[0]['value']) ? $hasil[0]['value'] : '') == 'KKS' ? 'selected' : ''  }}>
                                Kartu Keluarga Sejahtera (KKS)
                            </option>
                            <option
                                value="KPS" {{ (isset($hasil[0]['value']) ? $hasil[0]['value'] : '') == 'KPS' ? 'selected' : ''  }}>
                                Kartu Pra Sejahtera (KPS)
                            </option>
                            <option
                                value="SKTM" {{ (isset($hasil[0]['value']) ? $hasil[0]['value'] : '') == 'SKTM' ? 'selected' : ''  }}>
                                Bukti / Surat Keterangan Kondisi Tertentu
                            </option>

                        </select>
                    </div>
                    <div class="mt-2 small">
                        Untuk Afirmasi Bukti / Surat Keterangan Kondisi Tertentu Korban Gempa
                        <ol>
                            <li>Bukti rumah rusak berat (foto kopi daptar kolektif dilegalisir oleh desa/kelurahan) atau
                                surat keterangan dari desa/kelurahan.
                            </li>
                            <li>Foto rumah rusak berat disatu filekan jika melebihi kuota diseleksi lagi
                                berdasarkan jarak terdekat
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-soft-info waves-effect mt-0"><i
                            class="mdi mdi-content-save-outline"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

