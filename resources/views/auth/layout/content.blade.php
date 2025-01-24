  <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
          <div class="col-12 mb-4">
              <div class="card">
                  <div class="card-body">
                      @foreach ($soals->take(1) as $soal)
                          <div class="row">
                              <div class="col-auto">{{ $soal->nomor }}.</div>
                              <div class="col" style="text-align: justify;">{{ $soal->soal }}</div>
                          </div>

                          <div class="row {{ $soal->gambar ? '' : 'd-none' }}">
                              <div class="col-auto" style="visibility: hidden">{{ $soal->nomor }}.</div>
                              <div class="col">
                                  @if ($soal->gambar)
                                      <span class="">
                                          <img src="{{ asset($soal->gambar) }}" alt="Gambar Soal {{ $soal->nomor }}" class="img">
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="row {{ $soal->teks_gambar ? 'mb-3' : '' }}">
                              <div class="col-auto" style="visibility: hidden">{{ $soal->nomor }}.</div>
                              <div class="col">
                                  @if ($soal->teks_gambar)
                                      {{ $soal->teks_gambar }}
                                  @endif
                              </div>
                          </div>
                          @php
                              $opsiArray = json_decode($soal->pilihan, true); // Decode JSON to array
                          @endphp

                          @foreach ($opsiArray as $index => $ops)
                              <div class="row mb-2">
                                  <div class="col-auto" style="visibility: hidden">{{ $soal->nomor }}.</div>
                                  <div class="col">
                                      <a href="" class="">
                                          <button type="button" class="btn btn-sm btn-outline-primary text-start text-justify">
                                              <span class="row">
                                                  <span class="col-auto pe-0">{{ chr(97 + $index) }}.</span>
                                                  <span class="col">
                                                      {{ $ops }}
                                                  </span>
                                              </span>
                                          </button>
                                      </a>
                                  </div>
                              </div>
                          @endforeach
                      @endforeach

                  </div>
              </div>

              <div class="mb-3">
                  <a href="{{ route('bank') }}" class="">
                      <button type="button" class="btn btn-sm btn-outline-primary">
                          bank
                      </button>
                  </a>
              </div>

              <div class="mb-3">

                  <script>
                      function TranslateAnswer(s, answerIndex) {
                          var value;
                          var newString;
                          var code;
                          var i;
                          value = (answerIndex % 31) + 1;
                          newString = "";
                          for (i = 0; i < s.length; i += 2) {
                              code = parseInt(s.substring(i, i + 2), 16);
                              newString += String.fromCharCode(code ^ value);
                          }
                          return newString;
                      }

                      var ansMap = ['40', '47', '41', '45', '46'];
                      var decodedAnswers = [];
                      for (var i = 0; i < ansMap.length; i++) {
                          var decodedAnswer = TranslateAnswer(ansMap[i], i);
                          decodedAnswers.push(decodedAnswer);
                      }
                      console.log(decodedAnswers); // Output: ['A', 'B', 'A', 'E'] 
                  </script>

              </div>
          </div>
      </div>
  </div>
