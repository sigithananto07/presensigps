@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Master Cuti
          </div>
          <h2 class="page-title">
            Data Cuti
          </h2>
        </div>
       
      </div>
    </div>
  </div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                     <div class="card-body">
                     <div class="row">
                          <div class="col-12">
                              @if (Session::get('success'))
                              <div class="alert alert-success">
                                  {{ Session::get('success') }}
                              </div>
                              @endif

                              @if (Session::get('warning'))
                              <div class="alert alert-warning">
                                  {{ Session::get('warning') }}
                              </div>
                              @endif
                          </div>
                     </div>
                          <div class="row">
                              <div class="col-12">
                                 <a href="#" class="btn btn-primary" id="btnTambahDepartemen"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M12 5l0 14"></path>
                                  <path d="M5 12l14 0"></path>
                               </svg>
                                  Tambah Data</a>
                              </div> 
                          </div> 
                         
                        <div class="row mt-2">
                           <div class="col-12">

                           </div> 
                        </div>   
                        <table class="table table-bordered">
                            <thead>
                                 <tr>
                                      <th>NO</th>
                                      <th>KODE CUTI</th>
                                      <th>NAMA CUTI</th>
                                      <th>JUMLAH HARI</th>
                                      <th>AKSI</th>
                                 </tr>   
                              </thead>
                              <tbody>
                                    @foreach ($cuti as $d)
                                      <tr>
                                         <td>{{ $loop->iteration }}</td>
                                         <td>{{ $d->kode_cuti }}</td>
                                         <td>{{ $d->nama_cuti }}</td>
                                         <td>{{ $d->jml_hari }}</td>
                                         <td>
                                            <div class="btn-group">
                                                <a href="#" class="edit btn btn-info btn-sm" kode_cuti="{{ $d->kode_cuti }}">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                    <path d="M16 5l3 3"></path>
                                                 </svg>
                                                </a>
                                                
                                                <form action="/cuti/{{ $d->kode_cuti }}/delete" method="POST" style="margin-left:8px">
                                                  @csrf
                                                  <a class="btn btn-danger btn-sm delete-confirm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                      <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor"></path>
                                                      <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                                                   </svg>
        
                                                  </a>
                                                </form>
                                              </div>  
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
<div class="modal modal-blur fade" id="modal-inputcuti" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Cuti</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/cuti" method="POST" id="frmCuti">
         @csrf
          <div class="row">
             <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                    <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                    <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                    <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                    <path d="M5 11h1v2h-1z"></path>
                    <path d="M10 11l0 2"></path>
                    <path d="M14 11h1v2h-1z"></path>
                    <path d="M19 11l0 2"></path>
                 </svg>
                </span>
                <input type="text" value="" id="kode_cuti" class="form-control" placeholder="Kode Cuti" name="Kode_Cuti">
              </div>
             </div> 
          </div> 
          <div class="row">
            <div class="col-12">
             <div class="input-icon mb-3">
               <span class="input-icon-addon">
                 <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
               </svg>
               </span>
               <input type="text" value="" id="nama_Cuti" class="form-control" name="nama_cuti" placeholder="Nama Cuti">
             </div>
            </div> 
         </div>
         <div class="row">
            <div class="col-12">
             <div class="input-icon mb-3">
               <span class="input-icon-addon">
                 <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
               </svg>
               </span>
               <input type="text" value="" id="jml_hari" class="form-control" name="jml_hari" placeholder="Jumlah Hari">
             </div>
            </div> 
         </div> 
         
        <div class="row mt-3">
           <div class="col-12">
               <div class="form-group">
                <button class="btn btn-primary w-100"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M10 14l11 -11"></path>
                  <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
               </svg>
                  Simpan</button>
               </div>
           </div>
        </div>
       </form>
      </div>
     
    </div>
  </div>
</div>
{{-- Modal Edit --}}
<div class="modal modal-blur fade" id="modal-cuti" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Cuti</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadeditform">
           
      </div>
     
    </div>
  </div>
</div>
@endsection

