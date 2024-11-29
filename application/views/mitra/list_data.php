<?php
  foreach ($dataMitra as $mitra) {
    ?>
    <tr>
      <td style="min-width:230px;"><?php echo $mitra->mitra; ?></td>
      <td><?php echo $mitra->alamat; ?></td>
      <td><?php echo $mitra->pemilik; ?></td>
      <td><?php echo $mitra->telephone; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataMitra" data-id="<?php echo $mitra->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-Mitra" data-id="<?php echo $mitra->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>