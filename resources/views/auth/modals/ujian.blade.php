@if (session('success'))
    @include('auth.toasts.success')
@endif

<div class="modal fade" id="M_S_ujian" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ujian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <form action="{{ route('ujian_store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="try out 1" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tanggal">Tanggal</label>
                            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label" fors="durasi">Durasi</label>
                            <div class="input-group input-group-merge">
                                <input type="number" class="form-control" placeholder="durasi" id="durasi" name="durasi" required>
                                <span class="input-group-text">(menit)</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modalUpdate fade" id="M_U_ujian" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit sesi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <div class="tab-pane fade show active" id="nav-sesi" role="tabpanel">
                        <form id="U_route" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="U_nama">Nama<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_nama" name="nama" placeholder="try out 1" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_tanggal">Tanggal</label>
                                <input type="datetime-local" class="form-control" id="U_tanggal" name="tanggal" value="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" fors="U_durasi">Durasi</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" class="form-control" placeholder="durasi" id="U_durasi" name="durasi" required>
                                    <span class="input-group-text">(menit)</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_kode">Kode<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_kode" name="kode" disabled />
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modalDelete fade" id="M_D_ujian" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_ujian">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h4 class="text-center">
                        Yakin ingin <span class="text-danger">menghapus</span> data?
                    </h4>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-evenly">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="D_route" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="ujian" value="ujian">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>

</div>
