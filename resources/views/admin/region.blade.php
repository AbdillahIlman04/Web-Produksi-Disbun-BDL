@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1 class="d-flex justify-content-center mt-3">Luas Area dan Produksi Perkebunan Rakyat</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="search-bar">
        <form class="search-form d-flex align-items-center mt-4" method="POST" action="/region">
          @csrf
          <div class="col-md-3 ">
            <select name="kabupaten" id="kabupaten" class="form-select">
              <option selected>Kabupaten</option>
              @foreach ($regencies as $kabupaten)
              <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
          @endforeach
            </select>
          </div>
          <div class="col-md-3 ms-3">
            <select name="kecamatan" id="kecamatan" class="form-select">
              <option selected>Kecamatan</option>
            </select>
          </div>

          <div class="col-md-2 ms-3">
            <select name="tahun" id="tahun" class="form-select">
              <option selected>Tahun</option>
              @foreach ($tahuns as $tahun)
              <option>{{ $tahun->year }}</option>
          @endforeach
            </select>
          </div>
          <button type="submit" title="Search" class="ms-2 btn btn-primary"><i class="bi bi-search"></i></button>
        </form>

      <div class="col-lg-8 d-flex justify-content-center mt-3">
       
        </div><!-- End Search Bar -->
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
    
              <div class="card mt-3">
                <div class="card-body">
                  <h5 class="card-title">List Data
                    <button type="submit" class="btn btn-primary btn-sm float-end me-2" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Data</button>
                  </h5>
                
                 
    
                  <!-- Table with stripped rows -->
                  <table class="table datatable" id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kabupaten</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Tahun</th>
                        <th class="text-center" scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @foreach ($lampung as $lampoeng)
                      <tr>
                        <th>{{ $no++}}</th>
                        <td>{{ $lampoeng->regency->name }}</td>
                        <td>{{ $lampoeng->district->name }}</td>
                        <td>{{ $lampoeng->tahun }}</td>
                        <td class="text-center">
                          
                          <a href="{{ url('admin') }}" class="btn btn-success btn-sm" >
                              <i class="bi bi-diagram-2-fill"></i>
                          </a>
                          <a href=" " class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $lampoeng->id }}" >
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <a href="/hapus/{{ $lampoeng->id }}" class="btn btn-danger btn-sm">
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
   
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-3 ms-3 d-inline">
                  <select name="kabupaten_id" id="modalkabupaten" onchange="updatemodalkabupaten()" class="form-select">
                    <option selected>Kabupaten</option>
                    @foreach ($regencies as $modalkabupaten)
                    <option value="{{ $modalkabupaten->id }}">{{ $modalkabupaten->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 ms-3 d-inline">
                  <select name="kecamatan_id" id="modalkecamatan" class="form-select">
                    <option selected>Kecamatan</option>
                  </select>
                </div>
                <div class="col-md-2 ms-3 d-inline">
                  <select name="tahun" id="tahun" class="form-select">
                    <option selected>Tahun</option>
                    @foreach ($tahuns as $tahun)
                    <option>{{ $tahun->year }}</option>
                    @endforeach
                  </select>
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
      
      

    {{-- End Modal --}}


    {{-- Modal Update --}}

   @foreach ($lampung as $item)
    <div class="modal fade" id="updateModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/update/{{ $item->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-md-3 ms-3 d-inline">
                <select name="updatekabupaten_id" id="updatemodalkabupaten" onchange="updatemodalgetkabupaten()" class="form-select">
                  <option value="{{ $item->id }} " selected>{{ $item->regency->name }}</option>
                  @foreach ($regencies as $updatemodalkabupaten)
                  <option value="{{ $updatemodalkabupaten->id }} "> {{ $updatemodalkabupaten->name }}  </option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3 ms-3 d-inline">
                <select name="updatekecamatan_id" id="updatemodalkecamatan" class="form-select">
                  <option value="{{ $item->id }}" selected>{{ $item->district->name }}</option>
                </select>
              </div>
              <div class="col-md-2 ms-3 d-inline">
                <select name="tahun" id="tahun{{ $item->id }}" class="form-select">
                  <option value="{{ $item->id }} "selected>{{ $item->tahun }}</option>
                  @foreach ($tahuns as $tahun)
                  <option value="{{ $item->id }}"{{ old('tahun') == $item->id ? 'selected' : null }}>{{ $tahun->year }}</option>
                  @endforeach
                </select>
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

 

 