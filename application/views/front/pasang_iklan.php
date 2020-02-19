<div class="bradcam_area breadcam_bg">
        <h3 class="text-center">Form Pasang Iklan</h3>
</div>
<div class="container mt-3">
<div class="card-header mb-1" style="background-color: rgb(0, 211, 99);border-bottom: 7px solid rgba(0, 0, 0, .125);">
                            <ul class="nav nav-justified">
                                <li class="nav-item"><a data-toggle="tab" id="btn-kontrakan" href="#kontrakan" class="active nav-link text-white">Kosan</a></li>
                                <li class="nav-item"><a data-toggle="tab" id="btn-kamar" href="#kamar" class="nav-link text-white">Kamar</a></li>
                            </ul>
                          </div>
                            <form method="POST" action="<?php echo $action;?>" class="needs-validation" novalidate enctype="multipart/form-data">
                              <?php if(isset($errors)){ ?>
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          <?php echo $errors;?>
                                      </div>
                                    <?php } ?>
                            <div class="tab-content">
                                <div class="tab-pane active" id="kontrakan" role="tabpanel">
                                  
                                  <div class="row container">
                                    <div class="main-card mb-3 mr-5 card col-md-6" style="margin-right:10px;">    
                                      <div class="col-md-12">
                                        <div class="card-body">
                                          <div class="position-relative row form-group">
                                            <label for="nama_kosan" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="nama" id="nama_kosan" placeholder="Nama Kosan" value="<?php echo isset($kontrakan[0]['nama']) ? $kontrakan[0]['nama'] : '' ;?>" required>
                                              <div class="invalid-feedback">
                                                Masukan Nama
                                              </div>

                                              <input type="hidden" name="lat" value="" id="lat">
                                              <input type="hidden" name="lang" value="" id="lang">
                                            </div>
                                          </div>
                                          <div class="position-relative row form-group">
                                            <label for="inputnama" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="alamat" id="inputnama" placeholder="Alamat Lengkap" value="<?php echo isset($kontrakan[0]['alamat']) ? $kontrakan[0]['alamat'] : '' ;?>" required>
                                              <div class="invalid-feedback">
                                                Masukan Alamat Lengkap
                                              </div>
                                            </div>
                                          </div>
                                          <div class="position-relative row form-group">
                                            <label for="inputnama" class="col-sm-3 col-form-label">Provinsi</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="provinsi" id="inputnama" placeholder="Provinsi" value="<?php echo isset($kontrakan[0]['provinsi']) ? $kontrakan[0]['provinsi'] : '' ;?>" required>
                                              <div class="invalid-feedback">
                                                Masukan Provinsi
                                              </div>
                                            </div>
                                          </div>
                                          <div class="position-relative row form-group">
                                            <label for="inputnama" class="col-sm-3 col-form-label">Kota/Kabupaten</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="kota_kab"id="inputnama" placeholder="Kota Atau Kabupaten" value="<?php echo isset($kontrakan[0]['kota_kab']) ? $kontrakan[0]['kota_kab'] : '' ;?>" required>
                                              <div class="invalid-feedback">
                                                Masukan Kota Atau Kabupaten
                                              </div>
                                            </div>
                                          </div>
                                          <div class="position-relative row form-group">
                                            <label for="inputnama" class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="kecamatan"id="inputnama" placeholder="Kecamatan" value="<?php echo isset($kontrakan[0]['kecamatan']) ? $kontrakan[0]['kecamatan'] : '' ;?>" required>
                                              <div class="invalid-feedback">
                                                Kecamatan
                                              </div>
                                            </div>
                                          </div>
                                          <div class="position-relative row form-group">
                                            <label for="inputnama" class="col-sm-3 col-form-label">Kode Pos</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" name="kode_pos"id="inputnama" placeholder="Kode Pos" value="<?php echo isset($kontrakan[0]['kode_pos']) ? $kontrakan[0]['kode_pos'] : '' ;?>" required>
                                              <div class="invalid-feedback">
                                                Masukan Kode Pos
                                              </div>
                                            </div>
                                          </div>
                                          <div class="position-relative row form-group">
                                            <label for="inputnama" class="col-sm-3 col-form-label">Jenis</label>
                                            <div class="col-sm-8">
                                              <select class="form-control js-example-basic-single" name="jenis"  required>
                                                <option value="">--Pilih Salah Satu--</option>
                                                <option value="Putri" 
                                                  <?php if(!empty($kontrakan[0]['jenis']) && $kontrakan[0]['jenis']=="Putri"){
                                                      echo "selected";
                                                  }?>
                                                  >Putri
                                                </option>
                                                <option value="Putra" 
                                                  <?php if(!empty($kontrakan[0]['jenis']) && $kontrakan[0]['jenis']=="Putra"){
                                                      echo "selected";
                                                  }?>
                                                  >Putra
                                                </option>
                                                <option value="Campur" 
                                                <?php if(!empty($kontrakan[0]['jenis']) && $kontrakan[0]['jenis']=="Campur"){
                                                    echo "selected";
                                                }?>
                                                >Campur</option>
                                              </select>
                                              <div class="invalid-feedback">
                                                Masukan Pilih Jenis
                                              </div>
                                            </div>
                                          </div> 
                                          <div class="position-relative row form-group">
                                            <label for="inputnama" class="col-sm-3 col-form-label">Jam Bertemu</label>
                                            <div class="col-sm-8">
                                              <select class="form-control js-example-basic-single" name="jam_bertemu"  required>
                                                <option value="">--Pilih Salah Satu--</option>
                                                <option value="Bebas" 
                                                  <?php if(!empty($kontrakan[0]['jam_bertemu']) && $kontrakan[0]['jam_bertemu']=="Bebas"){
                                                      echo "selected";
                                                  }?>
                                                  >Bebas
                                                </option>
                                                <option value="Di Batasi" 
                                                  <?php if(!empty($kontrakan[0]['jam_bertemu']) && $kontrakan[0]['jam_bertemu']=="Di Batasi"){
                                                      echo "selected";
                                                  }?>
                                                  >Di Batasi
                                                </option>
                                              </select>
                                              <div class="invalid-feedback">
                                                Masukan Jam Bertemu
                                              </div>
                                            </div>
                                          </div> 
                                           <div class="position-relative row form-group">
                                            <label for="inputnama" class="col-sm-3 col-form-label">Peliharaan</label>
                                            <div class="col-sm-8">
                                                <div class="position-relative form-check">
                                                  <label class="form-check-label">
                                                    <input name="binatang" type="radio" class="form-check-input" value="Y" required=""> Ya
                                                  </label>
                                                </div>
                                                <div class="position-relative form-check">
                                                  <label class="form-check-label">
                                                    <input name="binatang" type="radio" class="form-check-input" value="N" required> Tidak
                                                  </label>
                                                </div>
                                              <div class="invalid-feedback">
                                                Pilih Salah satu
                                              </div>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>
                                    <div class="main-card mb-3 card col-md-5">    
                                      <div class="col-md-12">
                                        <div class="card-body">
                                          
                                          <div class="position-relative row form-group">
                                            <label for="inputnama" class="col-sm-4 col-form-label">Foto Kost</label>
                                            <div class="col-sm-8">
                                              <input type="file" id="files_kontrakan" class="" name="kos_image[]"  multiple accept="image/*" <?php if($title="tambah"){echo "required";}?>>
                                              <div class="invalid-feedback">
                                                Masukan Alamat Lengkap
                                              </div>
                                               <div id="selectedFiles"></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>  
                                  </div>
                                  <div class="main-card mb-3 card col-md-12">    
                                    <div class="card-body">
                                      <h3>Deskrips</h3>
                                      <hr>
                                       <textarea name="deskripsi" id="deskripsi">
                                        
                                        <?php echo isset($kontrakan[0]['deskripsi']) ? $kontrakan[0]['deskripsi'] : '' ;?>
                                      </textarea>
                                      <div id="map" class="mt-3 col-md-12" style="width: 100%; height: 400px;     z-index: 14;"></div>
                                      <div class="float-right mt-5">
                                      <a data-toggle="tab" href="#kamar" class="nav-link btn btn-sm btn-primary" onclick="kamaractive();">Selanjutnya</a>
                                    </div>
                                    </div>

                                  </div> 
                                </div>
                                  <div class="tab-pane" id="kamar" role="tabpanel">
                                    <div class="main-card mb-3 card">
                                      <div class="card-body">           
                                            <div class="form-group row">
                                              <label for="inputnama" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                                              <div class="col-md-10">
                                                <div class="form-group row">                                                    
                                                    <div class="col-md-6">
                                                         <select class="form-control" name="jml_kamar" required="" onchange="addkamar(this)">
                                                          <option value="">--Pilih Salah Satu--</option>
                                                          <option value="0">1</option>
                                                          <option value="1">2</option>
                                                          <option value="2">3</option>
                                                          <option value="3">4</option>
                                                          <option value="4">5</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>

                                              </div>
                                            </div>
                                            <hr class="mb-3">
                                           <div class="kamar_wrapper">
                                                                                              
                                            </div>
                                            <div class="form-group row">
                                              <div class="col-sm-10 ">
                                                <button class="btn btn-sm btn-success" >Simpan</button>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>index.php/kontrakan">Batal</a>
                                              </div>
                                            </div>
                                           </div>
                                        </div>
                                      </div>
                                  </div>

                                </div>

                                </div>
                            </form>
                          </div>

  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin="">
  </script>
  
  <script>
        var map = L.map('map').setView([-2.548926, 118.0148634], 5);
                  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',{

                        attribution: 'Dev iJv',
                        maxZoom: 18,
                        id: 'mapbox.streets',
                        accessToken: 'pk.eyJ1IjoiamVwZXdzeWtlcyIsImEiOiJjazZhZTFpb3AwbmdtM2xxanVoN2Q4dmo3In0.4ORIedGxekwZWTO-9GOfKw'
                    }).addTo(map);
     
      
          var theMarker = {};
          map.on('click',function(e){
            lat = e.latlng.lat;
            lon = e.latlng.lng;

            console.log("You clicked the map at LAT: "+ lat+" and LONG: "+lon );
                //Clear existing marker, 

                if (theMarker != undefined) {
                      map.removeLayer(theMarker);
                };
              $('#lat').val(lat);
              $('#lang').val(lon);
            //Add a marker to show where you clicked.
             theMarker = L.marker([lat,lon]).addTo(map);  
        });

          

</script>
<script>
  function kamaractive(){
    $( "#btn-kamar" ).addClass("active show");
    $( "#kamar" ).addClass("active show");
    $( "#btn-kontrakan" ).removeClass( "active show" );
    $( "#kontrakan" ).removeClass( "active " );
  }
    
    function addkamar(kmr){
      var list = document.getElementsByClassName("kamar-form").length;
      if(list > 0){
        $('.kamar-form').remove();
      }
      var kmr = kmr.value;
      for (var i = 0; i <= kmr; i++) {
        var count = i;
        var myvar = '<div class="kamar-form" id="form-kamar-'+count+'">'+
      '      <div class="form-row">'+
      '        <div class="col-md-3">'+
      '          <div class="position-relative form-group">'+
      '            <label for="harga_bulanan_'+count+'" class="">Harga Bulanan</label>'+
      '            <input name="kamar['+count+'][harga]" id="harga_bulanan_'+count+'" placeholder="Harga Bulanan" type="text" class="form-control" required>'+
      '          </div>'+
      '        </div>'+
      '        <div class="col-md-3">'+
      '          <div class="position-relative form-group">'+
      '            <label for="ukuran_kamar_'+count+'" class="">Ukuran Kamar</label>'+
      '            <input name="kamar['+count+'][u_kamar]" id="ukuran_kamar_'+count+'" placeholder="Ukuran Kamar" type="text" class="form-control" required>'+
      '          </div>'+
      '        </div>'+
      '        <div class="col-md-3">'+
      '          <div class="position-relative form-group">'+
      '            <label for="luas_kamar_'+count+'" class="">Luas Kamar</label>'+
      '            <input name="kamar['+count+'][l_kamar]" id="luas_kamar_'+count+'" placeholder="Luas Kamar" type="text" class="form-control" required>'+
      '          </div>'+
      '        </div>'+
      '        <div class="col-md-3">'+
      '          <div class="position-relative form-group">'+
      '            <label for="nomor_kamar_'+count+'" class="">Nomor Kamar</label>'+
      '            <input name="kamar['+count+'][nomor]" id="nomor_kamar_'+count+'" placeholder="Nomor Kamar" type="text" class="form-control" required>'+
      '          </div>'+
      '        </div>'+
      '      </div>'+
      '        <div class="position-relative form-group">'+
      '          <label for="status_kamar_'+count+'" class="">Status Kamar</label>'+
      '          <select name="kamar['+count+'][status]" id="status_kamar_'+count+'" class="form-control" required>'+
      '            <option>-- Pilih Salah Satu --</option>'+
      '            <option value="Terisi">Terisi</option>'+
      '            <option value="Kosong">Kosong</option>'+
      '          </select>'+
      '        </div>'+
      '<div class="position-relative form-group">'+
      '          <label for="deskripsi_kamar_'+count+'" class="">Deskripsi Ruangan</label>'+
      '          <textarea required name="kamar['+count+'][deskripsi_kamar]" id="deskripsi_kamar_'+count+'">'+
      '          </textarea>'+
      '        '+
      '        <p class="mt-3">*Pilih Fasilitas*</p>'+
      '        <hr>'+
      '        <div class="form-row">'+
        <?php foreach($fasilitas as $f){?>

      '          <div class="col-md-3 mycheckbox">'+
      '            <input type="checkbox" name="kamar['+count+'][fasilitas_id][]" id="<?php echo $f->fasilitas;?>_'+count+'" value="<?php echo $f->id;?>" required>'+
      '              <label for="<?php echo $f->fasilitas;?>_'+count+'"><img src="<?php echo base_url();?>uploads/icons/<?php echo $f->icon;?>"/> <?php echo $f->fasilitas;?></label>'+
      '          </div>'+
        <?php }?>
      '        </div>'+
      '        <p class="mt-3">*Upload Galler Kamar*</p>'+
      '        <hr>'+
      '        <div class="position-relative row form-group">'+
      '          <label for="files_kamar_'+count+'" class="col-sm-4 col-form-label">Foto Kamar</label>'+
      '            <div class="col-sm-8">'+
      '              <input type="file" id="files_kamar_'+count+'" class="" name="kamar_image['+count+'][]"  multiple accept="image/*" <?php if($title=="tambah"){echo "required";}?>>'+
      '                <div class="invalid-feedback">'+
      '                  Upload Foto Kamar'+
      '                </div>'+
      '                                                       '+
      '            </div>'+
      '        </div>'+
      '      <div id="selectedFileskamar_'+count+'" class="row"></div>'+
      '    </div>'+
      '    <hr class="mb-3">'; 
        appendform(myvar,i,kmr);
        loadckeditor(i); 
      }

  }
  function appendform(myvar,i,kmr){
    
    
    $('.kamar_wrapper').append(myvar);
    
  }
  function loadckeditor(i){
     ClassicEditor
        .create( document.querySelector( '#deskripsi_kamar_'+i+'' ), {
          // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
          removePlugins: ['ImageUpload','ImageToolbar']
        } )
        .then( editor => {
          window.editor = editor;
        } )
        .catch( err => {
          console.error( err.stack );
        } );
  }
  var selDiv = "";
    
  document.addEventListener("DOMContentLoaded", init, false);
  
  function init() {
    document.querySelector('#files_kontrakan').addEventListener('change', handleFileSelect, false);
    selDiv = document.querySelector("#selectedFiles");
    document.querySelector('#files_kamar').addEventListener('change', handleFileSelectkamar, false);
    sel = document.querySelector("#selectedFileskamar");
  }
  function handleFileSelectkamar(e){
    if(!e.target.files || !window.FileReader) return;

    sel.innerHTML = "";
    
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function(f,i) {
      var f = files[i];
      if(!f.type.match("image.*")) {
        return;
      }

      var reader = new FileReader();
      reader.onload = function (e) {
        var html = "<div class='col-md-3'><img class='rounded' src=\"" + e.target.result + "\"></div>";
        sel.innerHTML += html;       
      }
      reader.readAsDataURL(f); 
    });
  }
  function handleFileSelect(e) {
    
    if(!e.target.files || !window.FileReader) return;

    selDiv.innerHTML = "";
    
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function(f,i) {
      var f = files[i];
      if(!f.type.match("image.*")) {
        return;
      }

      var reader = new FileReader();
      reader.onload = function (e) {
        var html = "<img class='rounded' src=\"" + e.target.result + "\">" + "<br clear=\"left\"/>";
        selDiv.innerHTML += html;       
      }
      reader.readAsDataURL(f); 
    });
    
  }

  </script>
  <style type="text/css">
    .mycheckbox input[type="checkbox"] {
      display: none;
    }
    .mycheckbox img{
      float: left;
      width:60px;
      height: 30px;
    }
    .mycheckbox input[type="checkbox"]+label {
       background: transparent;
    width: 100%;
    height: 44px;
    padding: 9px;
    border: 1px solid #eeeeee;
    border-radius: 6px;
    text-align: center;
    }
    .mycheckbox input[type="checkbox"]:checked + label {
       background: #eeeeee;
       width: 100%;
    height: 44px;
    }

    #selectedFiles img {
      border:1px solid #eee;
      padding:10px;
      max-width: 125px;
      max-height: 125px;
      margin-left: -110px;
      margin-bottom:10px;
      margin-top: 20px;
    }
    #selectedFileskamar img {
    border: 1px solid #eee;
    padding: 2px;
    max-width: 100%;
    }
  </style>

 
</div>