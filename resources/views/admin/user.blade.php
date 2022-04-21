@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1 class="d-flex justify-content-center mt-3">Luas Areal dan Produksi Perkebunan Rakyat</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="search-bar">

      <div class="col-lg-8 d-flex justify-content-center mt-3">
       
        </div><!-- End Search Bar -->
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
    
              <div class="card mt-3">
                <div class="card-body">
                  <h5 class="card-title">List Pengguna
                    <button type="submit" class="btn btn-primary btn-sm float-end me-2" data-bs-toggle="modal" data-bs-target="#penggunaModal">Tambah Pengguna Baru</button>
                  </h5>
                
                 
    
                  <!-- Table with stripped rows -->
                  <table class="table datatable" id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        
                        <th class="text-center" scope="col">Aksi</th>
                      </tr>
                    </thead>
                    {{-- @if ($lampung->count()) --}}
                    <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @foreach ($pengguna as $user)
                      <tr>
                        <th>{{ $no++}}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                          <a href=" " class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateuserModal-{{ $user->id }}" >
                            Edit
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <a href="/hapus/user/{{ $user->id }}" class="btn btn-danger btn-sm">
                            Hapus
                            <i class="bi bi-trash"></i> 
                          </a>
                          {{-- <button type="submit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="bi bi-pencil-square"></i> 
                          </button>
                          <a href="{{ url('region/'.$lampoeng->id) }}" class="btn btn-danger btn-sm">
                              <i class="bi bi-trash"></i>
                          </a> --}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    {{-- @endif --}}
                  </table>
                  <!-- End Table with stripped rows -->
    
                </div>
              </div>
    
            </div>
          </div>
        </section>
      </div>
    </div>

    {{-- Modal add --}}
   @foreach ($pengguna as $users)
   <div class="modal fade" id="penggunaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/insertdata/user/{{ $users->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
              <label for="recipient-name" class="col-form-label">Nama:</label>
              <input type="text" class="form-control" id="recipient-name" name="name">
            </div>
            <div class="mt-2">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="text" class="form-control" id="recipient-name" name="email">
            </div>
            <div class="mt-2">
              <label for="recipient-name" class="col-form-label">Password:</label>
              <input type="text" class="form-control" id="recipient-name" name="password">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
      </div>
    </div>
  </div>
      @endforeach
      
      

    {{-- End Modal --}}


    {{-- Modal Update --}}

   @foreach ($pengguna as $use)
   <div class="modal fade" id="updateuserModal-{{ $use->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/edit/user/{{ $use->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
              <label for="recipient-name" class="col-form-label">Nama:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $use->name }}">
            </div>
            <div class="mt-2">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="text" class="form-control" id="email" name="email" value="{{ $use->email }}">
            </div>
            <div class="mt-2">
              <label for="recipient-name" class="col-form-label">Password:</label>
              <input type="text" class="form-control" id="password" name="password" value="{{ $use->password }}">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
      </div>
    </div>
  </div>
    @endforeach

    {{-- End Modal --}}

  </section>


</main><!-- End #main -->

 @include('layouts.footer')

 

 