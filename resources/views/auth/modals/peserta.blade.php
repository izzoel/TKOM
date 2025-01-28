@if (session('success'))
    @include('auth.toasts.success')
@endif

<div class="modal modalPeserta fade" id="M_U_peserta" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <div class="tab-pane fade show active" id="nav-peserta" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="justify-content-between flex-sm-row flex-column gap-3">
                                    <div class="flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#M_S_peserta">
                                                &plus;
                                            </button>
                                        </div>

                                        <div class="card-text">
                                            <table id="tabelPeserta" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="col-1 text-center">#</th>
                                                        <th class="col-auto text-center">Nomor Peserta</th>
                                                        <th>Kode</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($pesertas as $peserta)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">{{ $peserta->id_mahasiswa }} </td>
                                                            <td class="text-center">{{ $peserta->kode }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="M_S_peserta" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="P_ujian">Ujian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="P_ujian" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="P_sesi">Sesi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="P_sesi" disabled>
                    </div>
                </div>

                <form id="importForm" action="{{ route('peserta_import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">File Upload</label>
                        <span class="text-muted" style="font-size: .7rem; font-style: italic"> (data yang sama akan ditimpa)</span>
                        <input class="form-control" type="file" id="file" name="file" />
                    </div>
                    <a href="{{ asset('Template Import -- peserta.csv') }}">
                        <i class="tf-icons bx bxs-download"></i>Template <span class="badge bg-label-danger">.csv</span>
                    </a>

                    <input type="text" name="kode" id="P_kode" />
                    <input type="text" name="id_sesi" id="P_id_sesi" />

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
