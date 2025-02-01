@extends('main')

@section('jawab')
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
                                            <button type="button" class="btn btn-primary">
                                                Hasil
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-text">

                                    <table id="tabelJawab" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="col-auto text-center">Nomor Peserta</th>
                                                @foreach ($kolom as $key => $value)
                                                    @if ($key != 'id' && $key != 'nim' && $key != 'id_ujian' && $key != 'created_at' && $key != 'updated_at')
                                                        <th>{{ $key }}</th>
                                                    @endif
                                                @endforeach
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($jawabs as $jawab)
                                                @php
                                                    $benar = 0;
                                                    $salah = 0;
                                                    foreach ($kolom as $nomor => $kunci) {
                                                        if ($nomor != 'id' && $nomor != 'nim' && $nomor != 'id_ujian' && $nomor != 'created_at' && $nomor != 'updated_at') {
                                                            $cleanNomor = str_replace('#', '', $nomor);
                                                            $jawabCek = $jawab->$nomor;
                                                            $kunciCek = strtolower($kuncis[$cleanNomor - 1]);

                                                            if ($jawabCek == $kunciCek) {
                                                                $benar++;
                                                            } else {
                                                                $salah++;
                                                            }
                                                        }
                                                    }
                                                @endphp

                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="">{{ $jawab->nim }}</td>
                                                    @foreach ($kolom as $key => $value)
                                                        @if ($key != 'id' && $key != 'nim' && $key != 'id_ujian' && $key != 'created_at' && $key != 'updated_at')
                                                            @php
                                                                $cleanKey = str_replace('#', '', $key);
                                                                $jawabValue = $jawab->$key;
                                                                $kunciValue = strtolower($kuncis[$cleanKey - 1]);
                                                                $result = $jawabValue == $kunciValue ? 'BENAR' : 'SALAH';
                                                            @endphp
                                                            <td>
                                                                <span class="badge rounded-pill bg-{{ $result == 'BENAR' ? 'success' : 'danger' }} text-white">
                                                                    {{ $jawabValue . ' (' . $kunciValue . ')' }}
                                                                </span>
                                                            </td>
                                                        @endif
                                                    @endforeach

                                                    <td>
                                                        {{ $benar . '/' . $cleanNomor }}
                                                        <span class="badge rounded-pill bg-primary text-white">
                                                            {{ $benar * 0.5 }}
                                                        </span>
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
