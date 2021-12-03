@extends('Master/element')
@section('title', 'CRUD SIMPLE')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crud Simple</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <!-- Alert -->
            @if (session('tambah'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('tambah') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

            @if (session('edit'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('edit') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>   
            @endif

            @if (session('hapus'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('hapus') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>   
            @endif            
            <!-- End Alert -->                   

          <div class="card-tools justify-content-around">  
                          
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
             <!-- Button Tambah -->
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-file"></i>  Tambah Data
            </button>
            <!-- End Button Tambah -->      
        </div>
        <div class="card-body">     
            <table class="table table-bordered table-hover" id="table1">
                <thead>
                    <tr>                    
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th class="text-center" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th class="text-center" colspan="2">Aksi</th>
                    </tr>
                </tfoot>                                           
            </table>


           
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Code by <a href="https://github.com/Miqbal20/" target="_blank">Miqbal20</a>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>

          <!-- Modal Tambah -->
          <form id="formTambah" enctype="multipart/form-data">                    
            {{ csrf_field() }}
            <div class="modal fade" id="modalTambah">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="text_nama">Nama</label>
                            <input type="text" class="form-control rounded-0 @error('nama') is-invalid @enderror" id="nama" name="nama" value="" placeholder="Masukkan Nama....">
                        </div>
                        <div class="form-group">
                            <label for="text_nama">Alamat</label>
                            <input type="text" class="form-control rounded-0 @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="" placeholder="Masukkan Alamat...">
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            </form>
        <!-- Modal Tambah End -->

<!-- Modal Update  -->
      <div class="modal fade" id="modalUpdate">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Data <span id="update_txt"></span></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <form id="formUpdate" enctype="multipart/form-data">                    
            {{ csrf_field() }}   
            <input type="hidden" name="id"/>        
            {{-- <input type="hidden" name="_method" value="POST"/>         --}}
            <div class="modal-body">
            <div class="form-group">
            <label for="text_nama">Nama</label>
            <input type="text" class="form-control rounded-0 @error('nama') is-invalid @enderror" name="nama" placeholder="">
            </div>
            <div class="form-group">
            <label for="text_nama">Alamat</label>
            <input type="text" class="form-control rounded-0 @error('alamat') is-invalid @enderror" name="alamat" placeholder="">
            </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Update Data</button>
            </div>
            </div>
          </form>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
      </div>

<!-- Modal Delete  -->
      <div class="modal fade" id="modalHapus">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <form id="formHapus" enctype="multipart/form-data">                    
            {{ csrf_field() }}   
            <input type="hidden" name="id"/>        
            {{-- <input type="hidden" name="_method" value="POST"/>         --}}
            <div class="modal-body">
              Anda yakin ingin menghapus data : <span id="hapus_txt"></span> ?
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Hapus Data</button>
            </div>
            </div>
          </form>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
      </div>
  
  
@endsection
@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
  
<!-- Sweetalert2 -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  
@endsection

@section('script')
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script> 
<!-- Sweet Alert 2 -->
<script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script> 
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> 


   
<script>

  let data = []  // variabel kosong

  //Memanggil fungsi Tampilkan Data
   tampilkanDataMaster()


  //Fungsi Tampilkan Data
  function tampilkanDataMaster(){
    const url = "{{ url('list_data') }}";
    $.ajax({
      url,
      success:function(list_data){
      console.log(list_data)
      let tampil_data = '';
      $("#table1 tbody").children().remove()
      for(let i=0;i<list_data.length;i++){
        tampil_data+=`
        <tr>
          <td class="text-center">${i+1}</td>
          <td>${list_data[i].nama || '-'}</span></td>
          <td>${list_data[i].alamat || '-'}</td>
          <td>                                          
            <button type="button" onclick="detailData(${list_data[i].id})" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">
              <i class="fas fa-edit"></i>
            </button>                        
          </td>
          <td>     
            <button type="button" onclick="detailHapusData(${list_data[i].id})" class="btn btn-danger"  data-toggle="modal" data-target="#modalHapus">
              <i class="fa fa-times-circle"></i>   
          </td>         
        </tr>                   
        `
      }
      $("#table1 tbody").append(tampil_data)
      },
      error:function(e){
        console.log(e)
        alert("Terjadi Kesalahan")
      }
    })

  }

//Fungsi Tambah Data 
  function tambahData(){
    let form = $("#formTambah");
    const url = "{{ url('tambah_ajax') }}";
    $.ajax({
      url,
      method:"POST",
      data:form.serialize(),
      success:function(response) {
        console.log(response)
        tampilkanDataMaster()
        // alert
        Swal.fire(
           'Sukses',
           'Data berhasil ditambahkan',
           'success'           
        )
        $("#formTambah [name='nama']").val('')
        $("#formTambah [name='alamat']").val('')
        $("#modalTambah .close").click()   
      },
      error:function(err) {
        console.log(err)
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Terjadi Kesalahan',
         
        })
        $("#formTambah [name='nama']").addClass("is-invalid ")
        $("#formTambah [name='alamat']").addClass("is-invalid ")       
      }
    })
  }

// Fungsi Untuk Mengirim Ajax Saat Button Update di tekan
  $("#formTambah").on('submit', function(event){
    event.preventDefault()
    tambahData()
  })
  
//------------------------------------//
 
// Tampilkan Data di Modal Edit
  const detailData = id=>{   
    $.ajax({
      url:`{{ url('detail') }}?id=${id}`,         
      success:function(res){
        $("#formUpdate [name='id']").val(id)
        $("#formUpdate [name='nama']").val(res.nama)
        $("#formUpdate [name='alamat']").val(res.alamat) 
      }
    })
  }

// Fungsi Untuk Mengirim Ajax Saat Button Hapus di tekan
  $("#formUpdate").on('submit', function(event){
    event.preventDefault()
    updateData()
  })

//Fungsi Untuk Mengupdate Data
  function updateData(){
    let form = $("#formUpdate");
    const url = "{{ url('updateDetailData') }}";
    $.ajax({
      url,
      method:"POST",
      data:form.serialize(),
      success:function(res) {
        console.log(res)
        tampilkanDataMaster()
        //alert
        Swal.fire(
           'Sukses',
           'Data berhasil diperbaharui',
           'success'
        )
        $("#formUpdate [name='nama']").val(res.nama)
        $("#formUpdate [name='alamat']").val(res.nama)
        $("#modalUpdate .close").click()   
      },
      error:function(err) {
        console.log(err)
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Terjadi Kesalahan',
         
        })
        $("#formUpdate [name='nama']").addClass("is-invalid ")
        $("#formUpdate [name='alamat']").addClass("is-invalid ")
      }
    })
  }

//------------------------------------//
 
// Tampilkan Data di Modal Hapus
  const detailHapusData = id=>{   
    $.ajax({
      url:`{{ url('detail') }}?id=${id}`,         
      success:function(res){
        $("#formHapus [name='id']").val(id)
        document.getElementById("hapus_txt").innerHTML = res.nama;
      }
    })
  }

// Fungsi Untuk Mengirim Ajax Saat Button Hapus di tekan
  $("#formHapus").on('submit', function(event){
    event.preventDefault()
    hapusData()
  })

//Fungsi Untuk Menghapus Data
  function hapusData(){
    let form = $("#formHapus");
    const url = "{{ url('hapus_data') }}";
    $.ajax({
      url,
      method:"POST",
      data:form.serialize(),
      success:function(res) {
        console.log(res)
        tampilkanDataMaster()
        $("#modalHapus .close").click()  
        // alert
        Swal.fire(
           'Sukses',
           'Data berhasil dihapus',
           'success'           
        )      
       
      },
      error:function(err) {
        console.log(err)
        //alert
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Terjadi Kesalahan',         
        })
      }
    })
  }

  // $(function() {
  //    $("#table1").DataTable({
  //      "responsive": true, "lengthChange": false, "autoWidth": false,     
  //      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //       }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
  //   });


   
</script>




@endsection