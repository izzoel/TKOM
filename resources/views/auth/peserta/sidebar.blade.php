<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div id="countdown" class="app-brand demo d-flex justify-content-center align-items-center flex-column text-center fs-4 fw-bold"></div>

    <ul class="menu-inner py-1" style="visibility: hidden">
        <div class="container">
            <div class="row text-center justify-content-center">
                @foreach ($banks as $bank)
                    @php
                        $nomor = '#' . $bank->nomor;
                        $terjawab = optional($jawabs)->$nomor ? 'btn-success' : 'btn-outline-primary';
                    @endphp
                    <div class="col-2 p-0 mb-3">
                        <a href="{{ route('soal', $bank->nomor) }}" class="">
                            <button type="button" class="btn btn-icon {{ request()->segment(2) == $bank->nomor ? 'btn-primary' : $terjawab }} btn-sm">
                                <span class="tf-icons">{{ $bank->nomor }}</span>
                            </button>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="row text-center justify-content-center m-4">
                <button id="submit" type="submit" class="btn btn-danger">
                    Submit
                </button>
            </div>
        </div>
    </ul>
</aside>
<div class="modal modalDelete fade" id="B_submit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_bank">Konfirmasi Submit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h4 class="text-center">
                        Anda akan logout setelah submit
                    </h4>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-evenly">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form action="{{ route('submit') }}" method="POST">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
