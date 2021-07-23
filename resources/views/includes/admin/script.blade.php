   <!-- Bootstrap core JavaScript-->
   <script src="{{ url('backend/vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{ url('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ url('backend/js/sb-admin-2.min.js') }}"></script>

   <script type="text/javascript" src="{{url('backend/vendor/datatables/datatables.min.js')}}"></script>


   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
   @include('sweetalert::alert')


  <script>
      $(document).ready(function() {
      var table = $('#example').DataTable( {
        responsive: true
      } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
      
  </script>

  <script>
   $('#isi_berita').summernote({
        placeholder: 'Isi Berita...',
        tabsize: 2,
        height: 100
      });
   $('#tentang_perusahaan').summernote({
        placeholder: 'Tentang Perusahaan...',
        tabsize: 2,
        height: 100
      });
   $('#deskripsi_lowongan').summernote({
        placeholder: 'Deskripsi Lowongan..',
        tabsize: 2,
        height: 100
      });
   $('#kualifikasi_lowongan').summernote({
        placeholder: 'Kualifikasi Lowongan..',
        tabsize: 2,
        height: 100
      });
   $('#cara_melamar').summernote({
        placeholder: 'Cara Melamar Lowongan..',
        tabsize: 2,
        height: 100
      });
   $('#visi').summernote({
        placeholder: 'Visi Layanan Karir..',
        tabsize: 2,
        height: 100
      });
   $('#misi').summernote({
        placeholder: 'Misi Layanan Karir..',
        tabsize: 2,
        height: 100
      });
   $('#tujuan').summernote({
        placeholder: 'Tujuan Layanan Karir..',
        tabsize: 2,
        height: 100
      });
   $('#profil').summernote({
        placeholder: 'Profil Layanan Karir..',
        tabsize: 2,
        height: 100
      });
   $('#isi_kegiatan').summernote({
        placeholder: 'Isi Kegiatan..',
        tabsize: 2,
        height: 100
      });
  </script>


   {{-- <!-- Page level plugins -->
   <script src="{{ url('backend/vendor/chart.js/Chart.min.js') }}"></script>

   <!-- Page level custom scripts -->
   <script src="{{ url('backend/js/demo/chart-area-demo.js')}}"></script>
   <script src="{{ url('backend/js/demo/chart-pie-demo.js')}}"></script> --}}