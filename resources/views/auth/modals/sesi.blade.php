@if (session('success'))
    @include('auth.toasts.success')
@endif


<div class="modal fade" id="M_S_sesi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah sesi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <form action="{{ route('sesi_store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="ujian">Ujian</label><span class="text-danger">*</span></label>
                            <select class="form-select" id="ujian" name="ujian" required>
                                <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                @foreach ($ujians as $ujian)
                                    <option value="{{ $ujian->id }}-{{ $ujian->kode }}">{{ $ujian->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="sesi">sesi<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="sesi" name="sesi" placeholder="demo" required />
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label" for="peserta">peserta<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="peserta" name="peserta" placeholder="demo" required />
                        </div> --}}
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modalUpdate fade" id="M_U_sesi" tabindex="-1" aria-hidden="true">
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
                                <label class="form-label" for="U_ujian">Ujian</label><span class="text-danger">*</span></label>
                                <select class="form-select" id="U_ujian" name="ujian" required>
                                    <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                    @foreach ($ujians as $ujian)
                                        <option value="{{ $ujian->id }}-{{ $ujian->kode }}">{{ $ujian->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_sesi">sesi<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_sesi" name="sesi" placeholder="demo" required />
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label" for="U_peserta">peserta<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_peserta" name="peserta" placeholder="demo" required />
                            </div> --}}
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


<div class="modal modalDelete fade" id="M_D_sesi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_sesi">Konfirmasi Hapus</h5>
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
                    {{-- <input type="hidden" name="jenis" value="sesi"> --}}
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
