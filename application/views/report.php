<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="<?php echo base_url();?>assets/main.css" rel="stylesheet">
    <style type="text/css">
        .hidden{
            visibility: hidden;
        }
    </style>
  </head>
  <body>
   <div class="row">
      <div class="main-card mb-3 card">
                                    <div class="card-header">Data Transaksi Booking Iklan <?php echo $this->uri->segment(3);?> <?php echo $this->input->post('tgl1');?> / <?php echo $this->input->post('tgl2');?>
                                        <div class="btn-actions-pane-right">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table border="1" class="align-middle mb-0 table table-borderless table-striped">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Invoice</th>
                                                <th class="text-center">Kosan </th>
                                                <th class="text-center">Kota </th>
                                                <th class="text-center">Pemilik Kos </th>
                                                <th class="text-center">Type Booking</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Sub Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php             
                                                $no = 1; foreach($transaksi as $row=>$key){
                                                ?>
                                                
                                                <tr >
                                                    <td class="text-center"><?php echo $no;?></td>
                                                    <td class="text-center "><?php echo $key['invoice'];?></td>
                                                    <td class="text-center"><?php echo $key['nama_kosan'];?></td>
                                                    <td class="text-center"><?php echo $key['kota_kab'];?> - <?php echo $key['provinsi'];?></td>
                                                    <td class="text-center"><?php echo $key['nama_user'];?></td>
                                                    <td class="text-center"><?php echo $key['type'];?></td>
                                                    
                                                    <td class="text-center"><?php echo "Rp ".number_format($key['harga']);?></td>
                                                    <td class="text-center"><?php echo "Rp ".number_format($key['sub_total']*2);?></td>
                                                </tr>         
                                            <?php $no++;}?>
                                            <tr>
                                                    
                                                    <td colspan="7" class="text-right"><h6>Total  :</h6> </td>
                                                    <td colspan="2" class="text-right"><h6><b><?php echo "Rp ".number_format($transaksi_total[0]['total_sum']);?></b></h6></td>
                                            </tr>
                                            <!-- <tr>
                                                    
                                                    <td colspan="7" class="text-right"><h6>Total bayar :</h6> </td>
                                                    <td colspan="2" class="text-right"><h6><b><?php //echo "Rp ".number_format($total[0]['total_bayar']);?></b></h6></td>
                                            </tr>
                                            <tr>
                                                    
                                                    <td colspan="7" class="text-right"><h6>Kembalian :</h6> </td>
                                                    <td colspan="2" class="text-right"><h6><b><?php //echo $total[0]['total_kembalian'];?></b></h5></td>
                                            </tr> -->
                                            </tbody>
                                        </table>
                                        <hr>
                                    </div>
                                   
                                </div>
   </div>
  </body>
</html>