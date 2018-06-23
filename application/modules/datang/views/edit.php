<style type="text/css" media="screen">
  #loader {
    bottom: 0;
    height: 175px;
    left: 0;
    margin: auto;
    position: absolute;
    right: 0;
    top: 0;
    width: 175px;
}
#loader {
    bottom: 0;
    height: 175px;
    left: 0;
    margin: auto;
    position: absolute;
    right: 0;
    top: 0;
    width: 175px;
}
#loader .dot {
    bottom: 0;
    height: 100%;
    left: 0;
    margin: auto;
    position: absolute;
    right: 0;
    top: 0;
    width: 87.5px;
}
#loader .dot::before {
    border-radius: 100%;
    content: "";
    height: 87.5px;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    transform: scale(0);
    width: 87.5px;
}
#loader .dot:nth-child(7n+1) {
    transform: rotate(45deg);
}
#loader .dot:nth-child(7n+1)::before {
    animation: 0.8s linear 0.1s normal none infinite running load;
    background: #00ff80 none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+2) {
    transform: rotate(90deg);
}
#loader .dot:nth-child(7n+2)::before {
    animation: 0.8s linear 0.2s normal none infinite running load;
    background: #00ffea none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+3) {
    transform: rotate(135deg);
}
#loader .dot:nth-child(7n+3)::before {
    animation: 0.8s linear 0.3s normal none infinite running load;
    background: #00aaff none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+4) {
    transform: rotate(180deg);
}
#loader .dot:nth-child(7n+4)::before {
    animation: 0.8s linear 0.4s normal none infinite running load;
    background: #0040ff none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+5) {
    transform: rotate(225deg);
}
#loader .dot:nth-child(7n+5)::before {
    animation: 0.8s linear 0.5s normal none infinite running load;
    background: #2a00ff none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+6) {
    transform: rotate(270deg);
}
#loader .dot:nth-child(7n+6)::before {
    animation: 0.8s linear 0.6s normal none infinite running load;
    background: #9500ff none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+7) {
    transform: rotate(315deg);
}
#loader .dot:nth-child(7n+7)::before {
    animation: 0.8s linear 0.7s normal none infinite running load;
    background: magenta none repeat scroll 0 0;
}
#loader .dot:nth-child(7n+8) {
    transform: rotate(360deg);
}
#loader .dot:nth-child(7n+8)::before {
    animation: 0.8s linear 0.8s normal none infinite running load;
    background: #ff0095 none repeat scroll 0 0;
}
#loader .lading {
    background-image: url("../images/loading.gif");
    background-position: 50% 50%;
    background-repeat: no-repeat;
    bottom: -40px;
    height: 20px;
    left: 0;
    position: absolute;
    right: 0;
    width: 180px;
}
@keyframes load {
100% {
    opacity: 0;
    transform: scale(1);
}
}
@keyframes load {
100% {
    opacity: 0;
    transform: scale(1);
}
}

</style>
<form class="card" id="forms">
<div class="container-fluid">
    <div class="card-body">
      <h3 class="card-title">Tambah Data Kedatangan Barang</h3>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label class="form-label">Tanggal Datang</label>
            <input type="text" class="form-control tgl_datang" name="tgl_datang" placeholder="Tanggal" value="<?php if($data){echo $data->row()->tgl_datang;} ?>">
            <input type="hidden" name="tanggal_id" value="<?php echo $tanggal_id ?>">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label class="form-label">Nomor BST</label>
            <input type="text" class="form-control no_bst" placeholder="Nomor BST" name="nobast" value="<?php if($data){echo $data->row()->no_bst;} ?>">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label class="form-label">Nomor PO</label>
            <input type="text" class="form-control no_po" placeholder="Nomor PO" name="nopo" value="<?php if($data){echo $data->row()->no_po;} ?>">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label class="form-label">Penanggung Jawab/PIC</label>
            <input type="text" class="form-control pic" placeholder="Penanggung Jawab/PIC" name="pic" value="<?php if($data){echo $data->row()->pic;} ?>">
          </div>
        </div>
        </div>
        <div class="clearfix">
          <hr>
        </div>
        <div class="row">
        <div class="col-sm-6 col-md-12">
          <div class="form-group">
            <label>Tanggal Pengajuan</label>
            <div class="input-group">
              <input type="text" id="tanggal" class="form-control pilihtanggal datepicker tgl_pengajuan" name="tgl_pengajuan" value="<?php if($data){echo $data->row()->tgl_pengajuan;} ?>">
              <div class="input-group-btn">
                <button type="button" class="btn btn-success cari_pengajuan"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-12">
          <div class="table-responsive">
            <table class="table table-condensed table-striped">
              <thead>
                <tr>
                  <th><i class="fa fa-check"></i></th>
                  <th>Kodebarang</th>
                  <th>Barang</th>
                  <th>Qty Pengajuan</th>
                  <th>Qty Datang</th>
                  <th>Ket</th>
                </tr>
              </thead>
              <tbody id="pilihan">
                <?php if ($data->num_rows() > 0): ?>
                  <?php foreach ($data->result() as $value): ?>
                    <tr>
                      <td><input type="checkbox" name="barang[]" class="custom-checkbox cek" data-st="<?php echo $value->ket ?>" value="<?php echo $value->id_barang ?>" checked></td>
                      <td><input type="hidden" name="kodebarang[]" value="<?php echo $value->kodebarang ?>"><?php echo $value->kodebarang ?></td>
                      <td><?php echo $value->nama ?></td>
                      <td><?php echo $value->quantity ?></td>
                      <td><input type="number" name="qty_datang[]" value="<?php echo $value->qty_datang ?>" class="form-control <?php echo $value->id_barang ?>" placeholder="Quantity Barang Datang"></td>
                      <td>
                        <?php if ($value->status_barang == 1): ?>
                          <?php if ($value->ket == 'sebagian'): ?>
                            Barang Baru datang Sebagian
                          <?php else: ?>
                            Barang Sudah Datang
                          <?php endif ?>
                          <?php else: ?>
                            Barang Belum Datang
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
              </tbody>
            </table>
          </div>
        </div>
            </div>
          </div>
        </div>
        <div class="res">
          
        </div>

    <div class="card-footer text-right">
      <button type="button" class="btn btn-primary kembali">Kembali</button>
      <button type="button" class="btn btn-primary buat"><i class="fa fa-plus"></i>Buat</button>
    </div>

</form>

<div class="container di">
  <div class="row">
    <div id="loader">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="lading"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.di').hide();
  })
  $(document).ready(function()
  {
    $('.datepicker').datepicker({format:'yyyy-mm-dd'}).val()
  });
  $(function()
  {
    $(".cek").change(function() {
      var kode = $(this).data('st');
      if(this.checked) {
        if (kode == 'full')
        {
            swal({
              type: 'info',
              title: 'Barang Sudah Datang sesuai dengan PO',
              showConfirmButton: false,
              timer: 1500
            })
            $(this).prop('checked',false);
            $('.'+$(this).val()).attr('disabled',true)
        }else{
           $('.'+$(this).val()).removeAttr('disabled')
        }
      }else{
        if (kode == 'full')
        {
         $('.'+$(this).val()).attr('disabled',true)
        }else{
         $('.'+$(this).val()).attr('disabled',true)
        }
      }
    });


    $(document).on('click','.kembali',function()
    {
      location.href = '<?php echo base_url('index.php/datang'); ?>';
    })
    $(document).on('click','.cari_pengajuan',function()
    {
      $('.di').fadeIn('fast');
      var html = '';
      var tanggal = $('.tgl_pengajuan').val();
      if (tanggal != '')
      {
      $.ajax({
        url:"<?php echo base_url('index.php/datang/get_pengajuan') ?>",
        data:{tanggal:tanggal},
        method:"POST",
        dataType:"JSON",
        success:function(data)
        {
        if (data.status == true)
        {
          if (data.data.length > 0){
          for (var i = 0; i < data.data.length; i++) {
          html +='<tr>'+
                    '<td><input type="checkbox" name="check[]" class="custom-checkbox"></td>'+
                    '<td>'+data.data[i].kodebarang+'</td>'+
                    '<td>'+data.data[i].nama+'</td>'+
                    '<td>'+data.data[i].quantity+'</td>'+
                   ' <td><input type="number" name="qty_datang[]" class="form-control" placeholder="Quantity Barang Datang"></td>'+
                  '</tr>';
          }
          document.getElementById('pilihan').innerHTML = html;
          $('.di').fadeOut('slow');
        }else{
            html = '<tr><td colspan="5" class="text-center">Tidak Ada Data Dengan Tanggal pengajuan <strong class="text-warning">'+tanggal+'</strong></td></tr>';
            document.getElementById('pilihan').innerHTML = html;
            $('.di').fadeOut('slow');

        }
          
        }else{
          $('.di').fadeOut('slow');
        }

        }
      })
    }else{
      alert('Tanggal pengajuan tidak boleh kosong');
      $('.di').fadeOut('slow');
    }
    })
    $(document).on('click','.buat',function()
    {
      // $('.di').fadeIn('slow');
      var tgl_datang = $('.tgl_datang').val();
      var pic = $('.pic')
      var form = $('#forms').serialize();
      $.ajax({
        url:"<?php echo base_url('index.php/datang/action_edit') ?>",
        data:form,
        method:"post",
        dataType:"JSON",
        success:function(data)
        {
          console.log(data);
          // if (data.status == true)
          // {
          //   $('.di').fadeOut('slow');
          //   location.href = '<?php echo base_url('index.php/datang') ?>';
          // }else{
          //   alert('Gagal Saat Menambahkan Data, mohon cek kembali data yang akan diinput.');
          //   $('.di').fadeOut('slow');
          // }
        }
      })
    })
  })
</script>