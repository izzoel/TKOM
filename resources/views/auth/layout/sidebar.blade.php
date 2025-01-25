 {{-- <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="box-shadow: 3px 0 5px rgba(0, 0, 0, 0.1);"> --}}
 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

     <div id="countdown" class="app-brand demo d-flex justify-content-center align-items-center flex-column text-center fs-4 fw-bold"></div>



     {{-- <div class="menu-inner-shadow"></div> --}}

     <ul class="menu-inner py-1">

         <div class="container">
             <div class="row text-center justify-content-center">

                 @foreach ($banks as $bank)
                     @php
                         $terjawab = in_array($bank->nomor, $jawabs) ? 'btn-success' : 'btn-outline-primary';
                     @endphp
                     <div class="col-2 p-0 mb-3">
                         <a href="{{ route('soal', $bank->nomor) }}" class="">
                             <button type="button" class="btn btn-icon {{ $terjawab }} btn-sm">
                                 <span class="tf-icons">{{ $bank->nomor }}</span>
                             </button>
                         </a>
                     </div>
                 @endforeach
             </div>
         </div>

     </ul>
 </aside>
