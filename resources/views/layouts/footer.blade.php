<!-- ======= Footer ======= -->
<footer id="footer" class="footer fixed-bottom ">
  <div class="copyright">
    &copy; Copyright <strong><span>ProduksiDisbun</span></strong>. All Rights Reserved
  </div>
</footer><!-- End Footer -->  

{{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

<!-- Vendor JS Files -->
<script src="/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/chart.js/chart.min.js"></script>
<script src="/vendor/echarts/echarts.min.js"></script>
<script src="/vendor/quill/quill.min.js"></script>
<script src="/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/vendor/tinymce/tinymce.min.js"></script>
<script src="/vendor/php-email-form/validate.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}

<!-- Template Main JS File -->
<script src="/js/main.js"></script>

 {{-- Ajax Setup --}}
 <script>

let counter = 1

  $(function(){
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }
    });

    $(function (){
      $(document).ready(function() {
    $('#example').DataTable();
    });

    // $(document).ready(function (){
    //     $(document).on('click', '.editbtn', function (){
    //       var data_id = $(this).val();
    //       $('#editModal').modal('show')
    //       $.ajax({
    //         type: "GET",
    //         url: "/edit"+data_id,
    //         success:function (response){
    //           $('#komoditi').val(response.data.komoditi);
    //           $('#tm').val(response.data.tm);
    //           $('#tbm').val(response.data.tbm);
    //           $('#tr').val(response.data.tr);
    //           $('#produk').val(response.data.produksi);
    //           $('#produktivitas').val(response.data.produktivitas);
    //           $('#bentuk_hasil').val(response.data.bentuk_hasil);
    //           $('#data_id').val(response.data.data_id);

    //         }
    //       });
    //     });
    // });
    // $(document).ready(function (){
    //     $("#deleteArea").click( function ()
    //       var id = $(this).attr('rel');
    //       var deleteFunction = $(this).attr('rel1');
    //       swal({
    //         title: "Are you sure?",
    //         text: "Your will not be able to recover this imaginary file!",
    //         title: "warning",
    //         showCancelButton:true,
    //         confirmButtonClass:"btn-danger",
    //         confirmButtonText:"Yes, delete it!",
    //         closeOnConfirm:false
    //         },
    //           function (){
    //             window.location.href="/delete/"+deleteFunction+"/"+id;
    //             swal("Deleted!", "Your imaginary file has been deleted.", "success");
              
    //       });
    //     });
    // });

        $('#kabupaten').on('change',function(){
          let id_kabupaten = $('#kabupaten').val();

          $.ajax({
            type : 'POST',
            url  : "{{ route('getkecamatan') }}",
            data : {id_kabupaten:id_kabupaten},
            cache : false,

            success: function(msg){
              $('#kecamatan').html(msg);
          
            },
            error: function(data){
              console.log('error:',data)
            },
          })
        })

        $('#modalkabupaten').on('change',function(){
          let id_kabupaten = $('#modalkabupaten').val();

          $.ajax({
            type : 'POST',
            url  : "{{ route('modalgetkecamatan') }}",
            data : {id_kabupaten:id_kabupaten},
            cache : false,

            success: function(msg){
              $('#modalkecamatan').html(msg);
          
            },
            error: function(data){
              console.log('error:',data)
            },
          })
        })

        $('#updatemodalkabupaten').on('change',function(){
          let id_kabupaten = $('#updatemodalkabupaten').val();

          $.ajax({
            type : 'POST',
            url  : "{{ route('updatemodalgetkecamatan') }}",
            data : {id_kabupaten:id_kabupaten},
            cache : false,

            success: function(msg){
              $('#updatemodalkecamatan').html(msg);
          
            },
            error: function(data){
              console.log('error:',data)
            },
          })
        })
  });
  
})
</script>

</body>

</html>