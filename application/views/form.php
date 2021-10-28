<html>
<head>
  <title>Chained Dropdown</title>
</head>
<body>
  <h1>Chained Dropdown</h1>
  <hr>
  
  <table cellpadding="8">
    <tr>
      <td><b>Kecamatan</b></td>
      <td>
        <select name="kecamatan" id="kecamatan" style="width: 200px;">
          <option value="">Pilih</option>
          
          <?php
          foreach($kecamatan as $data){ // Lakukan looping pada variabel siswa dari controller
            echo "<option value='".$data->id."'>".$data->nama."</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td><b>Desa</b></td>
      <td>
        <select name="desa" id="desa" style="width: 200px;">
          <option value="">Pilih</option>
        </select>
        <div id="loading" style="margin-top: 15px;">
          <img src="<?php echo base_url("assets/images/loading.gif"); ?>" width="18"> <small>Loading...</small>
        </div>
      </td>
    </tr>
  </table>
  
  <!-- Load librari/plugin jquery nya -->
  <script src="<?php echo base_url("assets/js/form/jquery.min.js"); ?>" type="text/javascript"></script>
  
  <script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    
    $("#kecamatan").change(function(){ // Ketika user mengganti atau memilih data kecamatan
      $("#desa").val().hide(); // Sembunyikan dulu combobox desa nya
      $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/form/listDesa"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_kecamatan : $("#kecamatan").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya
          // set isi dari combobox desa
          // lalu munculkan kembali combobox desanya
          $("#desa").html(response.list_desa).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
</body>
</html>