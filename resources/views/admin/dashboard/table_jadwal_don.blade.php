

<div class="col-lg-12  align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Done</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kelas</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tanggal Mulai</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tanggal Berakhir</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($penjadwalan as $r)  
                    <tr>
                      
                        @if (now() >= $r->tgl_akhir )
                         
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$no++}}</h6></td>
                        
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{$r->kelas}}</h6>
                                <span class="fw-normal">{{$r->kode_kelas}}</span>                          
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">{{$r->tgl_mulai}}</p>
                            </td>
                            <td class="border-bottom-0">
                            <div class="d-flex align-items-center gap-2">
                            <p class="mb-0 fw-normal">{{$r->tgl_akhir}}</p>
                            </div>
                            </td>
                                               
                        <td class="border-bottom-0">
                         @php
                          if(now() < $r->tgl_mulai)
                            $status = 'Akan dimulai';
                          elseif(now()->between($r->tgl_mulai,$r->tgl_akhir))
                            $status = 'Sedang Berlangsung';
                          else
                            $status = 'Telah Berakhir';
                          
                        @endphp
                        
                        <span class="badge bg-danger rounded-3 fw-semibold">{{$status}}</span>
                        </td>
                        @endif
                      </tr>
                      @endforeach 
                     
                                           
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>