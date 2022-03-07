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
          <form class="search-form d-flex align-items-center mt-4" method="POST" action="#">
            <div class="col-md-3">
              <select id="kabupaten" class="form-select">
                <option selected>Kabupaten</option>
                @foreach ($regencies as $kabupaten)
                <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
            @endforeach
              </select>
            </div>
            <div class="col-md-3 ms-3">
              <select id="kecamatan" class="form-select">
                <option selected>Kecamatan</option>
              </select>
            </div>
  
            <div class="col-md-2 ms-3">
              <select id="tahun" class="form-select">
                <option selected>Tahun</option>
                @foreach ($tahuns as $tahun)
                <option>{{ $tahun->year }}</option>
            @endforeach
              </select>
            </div>
            <button type="submit" title="Search" class="ms-2 btn" style="background-color: #2E6471"><i class="bi bi-search text-white"></i></button>
          </form>

        <div class="col-lg-8 d-flex justify-content-center mt-2">
         
          </div><!-- End Search Bar -->
          <table class="table table-bordered border-dark mt-3 text-center">
           <thead>
            <tr>
              <th rowspan="2">NO</th>
              <th rowspan="2">KOMODITI</th>
              <th colspan="3">KOMPOSISI LUAS AREA
              <th rowspan="2">JUMLAH</th>
              <th rowspan="2">PODUKSI</th>
              <th rowspan="2">PRODUKTIVITAS</th>
              <th rowspan="2">BENTUK HASIL</th>
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
              </tr>
              <tr>
                <td>'</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th>JUMLAH I</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th>TOTAL I</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
           </tbody>
           

          </table>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

@include('layouts.footer')