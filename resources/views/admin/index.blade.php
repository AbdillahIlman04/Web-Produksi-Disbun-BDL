@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1 class="d-flex justify-content-center mt-3 mb-4">Luas Area dan Produksi Perkebunan Rakyat</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="search-bar">
        <div class="pull-right">
          <a href="{{ url('region') }}" class="btn float-end text-white mb-2" style="background-color: #2E6471">
            <i class="bi bi-arrow-left"></i> Back
          </a>
        </div>
      {{-- <div class="col-lg-8 d-flex justify-content-center mt-2">
       
        </div><!-- End Search Bar --> --}}
       
        <table class="table table-bordered border-dark text-center mt-3">
         <thead>
          <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">KOMODITI</th>
            <th colspan="3">KOMPOSISI LUAS AREA
            <th rowspan="2">JUMLAH</th>
            <th rowspan="2">PODUKSI</th>
            <th rowspan="2">PRODUKTIVITAS</th>
            <th rowspan="2">BENTUK HASIL</th>
            <th rowspan="2">Aksi</th>
              <tr>
                <th>TM</th>
                <th>TBM</th>
                <th>TR</th>
             </tr>
            </th>
            </tr>
         </thead>
         <tbody>
            <tr>
              <th>I</th>
              <th>TAN. TAHUNAN</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @php
                $no = 1;
            @endphp
            <?php $i=0;?>
            @foreach ($data as $area)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $area->komoditi }}</td>
              <td>{{ $area->tm }}</td>
              <td>{{ $area->tbm }}</td>
              <td>{{ $area->tr }}</td>
              <td>{{ $hasil[$i] }}</td>
              <td>{{ $area->produksi }}</td>
              <td>{{ $area->produktivitas }}</td>
              <td>{{ $area->bentuk_hasil }}</td>
              <td class="text-center">
                <a href=" " class="btn btn-success editbtn btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $area->id }}" >
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
                {{-- <a rel="{{ $area->id }}" rel1="area" href="javascript:" id="deleteArea" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash"></i> Delete
                </a> --}}
                <a  href="/delete/{{ $area->id }}" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash"></i> Delete
                </a>
              </td>
            </tr>
            <?php $i++;?>     
            @endforeach
  
            <tr>
              <th>JUMLAH I</th>
              <td>-</td>
              <td>{{ $sumtm }}</td>
              <td>{{ $sumtbm }}</td>
              <td>{{ $sumtr }}</td>
              <td>{{ $sumHasil }}</td>
              <td>{{ $sumproduksi }}</td>
              <td>{{ $sumproduktivitas }}</td>
              <td>-</td>
              <td>-</td>
            </tr>
            <tr>
              <th>TOTAL I</th>
              <td>-</td>
              <td>{{ $sumtm }}</td>
              <td>{{ $sumtbm }}</td>
              <td>{{ $sumtr }}</td>
              <td>{{ $sumHasil }}</td>
              <td>{{ $sumproduksi }}</td>
              <td>{{ $sumproduktivitas }}</td>
              <td>-</td>
              <td>-</td>
            </tr>
         </tbody>
        </table>
      </div>
    </div>

    {{-- Modal --}}
  
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">+ Tambah Data</button>
    @foreach ($data as $tambah)
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="/insertdata/{{ $tambah->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">Komoditi:</label>
                <input type="text" class="form-control" id="recipient-name" name="komoditi">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">TM:</label>
                <input type="text" class="form-control" id="recipient-name" name="tm">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">TBM:</label>
                <input type="text" class="form-control" id="recipient-name" name="tbm">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">TR:</label>
                <input type="text" class="form-control" id="recipient-name" name="tr">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">Produksi:</label>
                <input type="text" class="form-control" id="recipient-name" name="produksi">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">Produktivitas:</label>
                <input type="text" class="form-control" id="recipient-name" name="produktivitas">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">Bentuk Hasil:</label>
                <input type="text" class="form-control" id="recipient-name" name="bentuk_hasil">
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

    {{-- Update Modal --}}
    @foreach ($data as $item)
    <div class="modal fade" id="editModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/edit/{{ $item->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="data_id" id="data_id">
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">Komoditi:</label>
                <input type="text" class="form-control"  name="komoditi" id="komoditi" value="{{ $item->komoditi }}">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">TM:</label>
                <input type="text" class="form-control"  name="tm" id="tm" value="{{ $item->tm }}">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">TBM:</label>
                <input type="text" class="form-control"  name="tbm" id="tbm" value="{{ $item->tbm }}" >
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">TR:</label>
                <input type="text" class="form-control"  name="tr" id="tr" value="{{ $item->tr }}">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">Produksi:</label>
                <input type="text" class="form-control"  name="produksi" id="produksi" value="{{ $item->produksi }}">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">Produktivitas:</label>
                <input type="text" class="form-control"  name="produktivitas" id="produktivitas" value="{{ $item->produktivitas }}">
              </div>
              <div class="mt-2">
                <label for="recipient-name" class="col-form-label">Bentuk Hasil:</label>
                <input type="text" class="form-control"  name="bentuk_hasil" id="bentuk_hasil" value="{{ $item->bentuk_hasil }}">
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

 