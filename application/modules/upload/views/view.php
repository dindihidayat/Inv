<style type="text/css" media="screen">
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
@import url("https://fonts.googleapis.com/css?family=Roboto");
	.uploader {
  display: block;
  clear: both;
  margin: 0 auto;
  width: 100%;
  max-width: 600px;
}
.uploader label {
  float: left;
  clear: both;
  width: 100%;
  padding: 2rem 1.5rem;
  text-align: center;
  background: #fff;
  border-radius: 7px;
  border: 3px solid #eee;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.uploader label:hover {
  border-color: #454cad;
}
.uploader label.hover {
  border: 3px solid #454cad;
  box-shadow: inset 0 0 0 6px #eee;
}
.uploader label.hover #start i.fa {
  -webkit-transform: scale(0.8);
          transform: scale(0.8);
  opacity: 0.3;
}
.uploader #start {
  float: left;
  clear: both;
  width: 100%;
}
.uploader #start.hidden {
  display: none;
}
.uploader #start i.fa {
  font-size: 50px;
  margin-bottom: 1rem;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}
.uploader #response {
  float: left;
  clear: both;
  width: 100%;
}
.uploader #response.hidden {
  display: none;
}
.uploader #response #messages {
  margin-bottom: .5rem;
}
.uploader #file-image {
  display: inline;
  margin: 0 auto .5rem auto;
  width: auto;
  height: auto;
  max-width: 180px;
}
.uploader #file-image.hidden {
  display: none;
}
.uploader #notimage {
  display: block;
  float: left;
  clear: both;
  width: 100%;
}
.uploader #notimage.hidden {
  display: none;
}
.uploader progress,
.uploader .progress {
  display: inline;
  clear: both;
  margin: 0 auto;
  width: 100%;
  max-width: 180px;
  height: 8px;
  border: 0;
  border-radius: 4px;
  background-color: #eee;
  overflow: hidden;
}
.uploader .progress[value]::-webkit-progress-bar {
  border-radius: 4px;
  background-color: #eee;
}
.uploader .progress[value]::-webkit-progress-value {
  background: -webkit-linear-gradient(left, #393f90 0%, #454cad 50%);
  background: linear-gradient(to right, #393f90 0%, #454cad 50%);
  border-radius: 4px;
}
.uploader .progress[value]::-moz-progress-bar {
  background: linear-gradient(to right, #393f90 0%, #454cad 50%);
  border-radius: 4px;
}
.uploader input[type="file"] {
  display: none;
}
.uploader div {
  margin: 0 0 .5rem 0;
  color: #5f6982;
}
.uploader .btn {
  display: inline-block;
  margin: .5rem .5rem 1rem .5rem;
  clear: both;
  font-family: inherit;
  font-weight: 700;
  font-size: 14px;
  text-decoration: none;
  text-transform: initial;
  border: none;
  border-radius: .2rem;
  outline: none;
  padding: 0 1rem;
  height: 36px;
  line-height: 36px;
  color: #fff;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  box-sizing: border-box;
  background: #454cad;
  border-color: #454cad;
  cursor: pointer;
}

</style>
<div class="container-fluid">
	<div class="row">
    <div class="col-md-12">
  		<h3>Upload Data</h3>
    </div>
	</div>
	<div class="card">
		<div class="col-md-12">
			

		<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab">Upload Data</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Download Template</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<form id="file-upload-form" class="uploader" style="padding:10px 10px 10px 10px">
				  <input id="file-upload" type="file" name="file"/>
				  <label for="file-upload" id="file-drag">
				    <img id="file-image" src="#" alt="Preview" class="hidden">
				    <div id="start">
				      <i class="fa fa-download" aria-hidden="true"></i>
				      <div>Pilih File Atau Drag file kesini</div>
				      <div id="notimage" class="hidden"></div>
				      <span id="file-upload-btn" class="btn btn-primary">Pilih File</span>
				    </div>
				    <div id="response" class="hidden">
				      <div id="messages"></div>
				      <progress class="progress" id="file-progress" value="0">
				        <span>0</span>%
				      </progress>
				    </div>
				  </label>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane" id="tab">
        <div class="col-md-12" style="padding:10px 10px 10px 10px">
          <a href="<?php echo base_url() ?>assets/file/template_pengajuan.xlsx" class="btn btn-success" download><i class="fa fa-download"></i> Template Data Pengajuan</a>
          <a href="<?php echo base_url() ?>assets/file/template_Master_barang.xlsx" class="btn btn-success" download><i class="fa fa-download"></i> Template Data Master Barang</a>
          <a href="javascript:;" class="btn btn-success" onclick="alert('Belum Ada Template')"><i class="fa fa-download"></i> Template Data Barang Datang</a>
          <a href="<?php echo base_url() ?>assets/file/template_stockopname.xlsx" class="btn btn-success"><i class="fa fa-download"></i> Template Data Stockopname</a>
        </div>
			</div>
		</div>
		</div>
		</div>
	</div>
</div>
<script>
function ekUpload(){
  function Init() {

    console.log("Upload Initialised");

    var fileSelect    = document.getElementById('file-upload'),
        fileDrag      = document.getElementById('file-drag'),
        submitButton  = document.getElementById('submit-button');

    fileSelect.addEventListener('change', fileSelectHandler, true);

    // Is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
      // File Drop
      fileDrag.addEventListener('dragover', fileDragHover, false);
      fileDrag.addEventListener('dragleave', fileDragHover, false);
      fileDrag.addEventListener('drop', fileSelectHandler, false);
    }
  }

  function fileDragHover(e) {
    var fileDrag = document.getElementById('file-drag');

    e.stopPropagation();
    e.preventDefault();

    fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
  }

  function fileSelectHandler(e) {
    // Fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // Cancel event and hover styling
    fileDragHover(e);

    // Process all File objects
    for (var i = 0, f; f = files[i]; i++) {
      parseFile(f);
      uploadFile(f);
    }
  }

  // Output
  function output(msg) {
    // Response
    var m = document.getElementById('messages');
    m.innerHTML = msg;
  }

  function parseFile(file) {

    console.log(file);
    output(
      '<strong>' + encodeURI(file.name) + '</strong>'
    );
    
    // var fileType = file.type;
    // console.log(fileType);
    var imageName = file.name;

    var isGood = (/\.(?=gif|jpg|png|jpeg|ms-excel)/gi).test(imageName);
    console.log(isGood);
    if (isGood) {
      document.getElementById('start').classList.add("hidden");
      document.getElementById('response').classList.remove("hidden");
      document.getElementById('notimage').classList.add("hidden");
      // Thumbnail Preview
      document.getElementById('file-image').classList.remove("hidden");
      document.getElementById('file-image').src = URL.createObjectURL(file);
    }
    else {
      document.getElementById('file-image').classList.add("hidden");
      document.getElementById('notimage').classList.remove("hidden");
      document.getElementById('notimage').innerHTML = file.name;
      document.getElementById('start').classList.remove("hidden");
      document.getElementById('response').classList.add("hidden");
      document.getElementById("file-upload-form").reset();
    }
  }

  function setProgressMaxValue(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.max = e.total;
    }
  }

  function updateFileProgress(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.value = e.loaded;
    }
  }

  function uploadFile(file) {
  	var newformdata = new FormData();
  	var data;
    var parsenya;
  	newformdata.append("file",file);
    var xhr = new XMLHttpRequest(),
      fileInput = document.getElementById('class-roster-file'),
      pBar = document.getElementById('file-progress'),
      fileSizeLimit = 1024; // In MB
    if (xhr.upload) {
      // Check if file is less than x MB
      if (file.size <= fileSizeLimit * 1024 * 1024) {
        // Progress bar
        pBar.style.display = 'inline';
        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
        xhr.upload.addEventListener('progress', updateFileProgress, false);

        // File received / failed
        xhr.onreadystatechange = function(e) {
          if (xhr.readyState == 4) {
            // progress.className = (xhr.status == 200 ? "success" : "failure");
            data = eval('(' + xhr.responseText + ')');
            parsenya = jQuery.parseJSON(xhr.responseText);
            console.log(parsenya);
            alertnya(data.status,data.pesan);
          0 // document.location.reload(true);
          }
        };

        // Start upload
        xhr.open("POST", "<?php echo base_url('index.php/upload/uploader') ?>");
        xhr.setRequestHeader('X-File-Name', file.name);
        xhr.setRequestHeader('X-File-Size', file.size);
        xhr.setRequestHeader('contentType', 'multipart/form-data');
        xhr.send(newformdata);
      } else {
        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
      }
    }
  }

  // Check for the various File API support.
  if (window.File && window.FileList && window.FileReader) {
    Init();
  } else {
    document.getElementById('file-drag').style.display = 'none';
  }
}
ekUpload();

function alertnya(status,pesan)
{
  if (status) {
    swal({
    type: 'success',
    title: pesan,
    showConfirmButton: false,
    timer: 1500
    })
  }else{
    swal({
      type:"warning",
      title:pesan,
      showConfirmButton:false,
      timer:1500
    })
  }
}
</script>