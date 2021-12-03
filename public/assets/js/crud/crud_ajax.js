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