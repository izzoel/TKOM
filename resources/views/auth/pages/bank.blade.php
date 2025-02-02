@extends('main')

@section('bank')
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
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#M_S_bank">
                                                Bank
                                            </button>

                                            @include('auth.modals.bank')
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-text">
                                    <table id="tabelBank" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Bank</th>
                                                {{-- <th>bank</th>
                                            <th>Peserta</th>
                                            <th>Kode</th> --}}
                                                {{-- <th class="col-auto" data-priority="2">Aksi</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($banks as $bank)
                                                <tr>
                                                    <td>{{ $loop->iteration }} </td>
                                                    {{-- <td>{{ $bank->bank }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="U_B_peserta btn btn-xs btn-primary" data-id="#M_U_peserta-{{ $bank->id }}"
                                                            {{ $sesi->kode == null ? 'disabled' : '' }}>
                                                            Peserta
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($sesi->kode == null)
                                                            <span class="badge rounded-pill bg-danger text-white">Closed</span>
                                                        @else
                                                            {{ $sesi->kode }}
                                                        @endif
                                                    </td> --}}
                                                    {{-- <td class="text-center px-0">
                                                        <a type="button" class="U_B_sesi text-info" data-id="#M_U_sesi-{{ $sesi->id }}">
                                                            <span class="tf-icons bx bx-edit"></span>edit
                                                        </a>

                                                        <span class="mx-1">|</span>

                                                        <a type="button" class="D_B_sesi text-danger" data-id="M_D_sesi-{{ $sesi->id }}">
                                                            <span class="tf-icons bx bxs-x-square"></span>
                                                        </a>
                                                    </td> --}}
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
