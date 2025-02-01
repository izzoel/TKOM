@extends('main')

@section('ujian')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="justify-content-between flex-sm-row flex-column gap-3">
                            <div class="flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#M_S_ujian">
                                                Ujian
                                            </button>

                                            @include('auth.modals.ujian')
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-text">
                                    <table id="tabelUjian" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-start">#</th>
                                                <th class="text-start"data-priority="1">Ujian</th>
                                                <th class="text-start">Tanggal</th>
                                                <th class="text-start">Durasi</th>
                                                <th class="text-center">Kode</th>
                                                <th class="text-center">Hasil</th>
                                                <th class="col-auto" data-priority="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ujians as $ujian)
                                                <tr>
                                                    <td class="text-start">{{ $loop->iteration }} </td>
                                                    <td class="text-start">{{ $ujian->nama }} </td>
                                                    <td class="text-start">{{ $ujian->tanggal }}</td>
                                                    <td class="text-start">{{ $ujian->durasi }} Menit</td>
                                                    <td class="text-center" id="genKode-{{ $ujian->id }}">
                                                        @if ($ujian->kode == null)
                                                            <a href="{{ route('generate', $ujian->id) }}" class="btn btn-xs btn-secondary">
                                                                Generate
                                                            </a>
                                                        @else
                                                            {{ $ujian->kode }}
                                                            <a href="{{ route('close', $ujian->id) }}" class="btn btn-xs btn-danger">
                                                                Close
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a type="button" href="{{ route('hasil', $ujian->id) }}" class=" btn btn-sm btn-primary"
                                                            {{ $ujian->kode == null ? 'disabled' : '' }}>
                                                            <i class='bx bx-check-square'></i> Hasil
                                                        </a>
                                                    </td>
                                                    <td class="text-center px-0">
                                                        <a type="button" class="U_B_ujian text-info" data-id="#M_U_ujian-{{ $ujian->id }}">
                                                            <span class="tf-icons bx bx-edit"></span>edit
                                                        </a>

                                                        <span class="mx-1">|</span>

                                                        <a type="button" class="D_B_ujian text-danger" data-id="M_D_ujian-{{ $ujian->id }}">
                                                            <span class="tf-icons bx bxs-x-square"></span>
                                                        </a>
                                                    </td>
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
@endsection
