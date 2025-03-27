<div>
    <div class="card">
        <h4 class="card-header bg-dark text-white">Unduh Data Excel</h4>
        <div class="card-body">
           
            
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Jalur</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Jalur Zonasi</td>
                        <td>Data pendaftar berdasarkan zonasi wilayah</td>
                        <td>
                            <button wire:click="downloadZonasi" class="btn btn-sm btn-soft-primary">
                                <i class="fas fa-file-excel me-1"></i>
                                <span wire:loading.remove wire:target="downloadZonasi">Unduh Excel</span>
                                <span wire:loading wire:target="downloadZonasi">Mengunduh...</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jalur Prestasi Ranking</td>
                        <td>Data pendaftar berdasarkan prestasi ranking</td>
                        <td>
                            <button wire:click="downloadRanking" class="btn btn-sm btn-soft-primary">
                                <i class="fas fa-file-excel me-1"></i>
                                <span wire:loading.remove wire:target="downloadRanking">Unduh Excel</span>
                                <span wire:loading wire:target="downloadRanking">Mengunduh...</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Jalur Prestasi Raport</td>
                        <td>Data pendaftar berdasarkan nilai raport</td>
                        <td>
                            <button wire:click="downloadRaport" class="btn btn-sm btn-soft-primary">
                                <i class="fas fa-file-excel me-1"></i>
                                <span wire:loading.remove wire:target="downloadRaport">Unduh Excel</span>
                                <span wire:loading wire:target="downloadRaport">Mengunduh...</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Jalur Prestasi Akademik & Non Akademik</td>
                        <td>Data pendaftar berdasarkan prestasi akademik dan non akademik</td>
                        <td>
                            <button wire:click="downloadPana" class="btn btn-sm btn-soft-primary">
                                <i class="fas fa-file-excel me-1"></i>
                                <span wire:loading.remove wire:target="downloadPana">Unduh Excel</span>
                                <span wire:loading wire:target="downloadPana">Mengunduh...</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Jalur Prestasi Tahfidz</td>
                        <td>Data pendaftar berdasarkan prestasi tahfidz</td>
                        <td>
                            <button wire:click="downloadTahfidz" class="btn btn-sm btn-soft-primary">
                                <i class="fas fa-file-excel me-1"></i>
                                <span wire:loading.remove wire:target="downloadTahfidz">Unduh Excel</span>
                                <span wire:loading wire:target="downloadTahfidz">Mengunduh...</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Jalur Afirmasi</td>
                        <td>Data pendaftar jalur afirmasi</td>
                        <td>
                            <button wire:click="downloadAfirmasi" class="btn btn-sm btn-soft-primary">
                                <i class="fas fa-file-excel me-1"></i>
                                <span wire:loading.remove wire:target="downloadAfirmasi">Unduh Excel</span>
                                <span wire:loading wire:target="downloadAfirmasi">Mengunduh...</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Jalur Pindah Tugas Orang Tua</td>
                        <td>Data pendaftar berdasarkan pindah tugas orang tua</td>
                        <td>
                            <button wire:click="downloadPindahTugas" class="btn btn-sm btn-soft-primary">
                                <i class="fas fa-file-excel me-1"></i>
                                <span wire:loading.remove wire:target="downloadPindahTugas">Unduh Excel</span>
                                <span wire:loading wire:target="downloadPindahTugas">Mengunduh...</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Jalur Anak Guru</td>
                        <td>Data pendaftar anak guru</td>
                        <td>
                            <button wire:click="downloadAnakGuru" class="btn btn-sm btn-soft-primary">
                                <i class="fas fa-file-excel me-1"></i>
                                <span wire:loading.remove wire:target="downloadAnakGuru">Unduh Excel</span>
                                <span wire:loading wire:target="downloadAnakGuru">Mengunduh...</span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>