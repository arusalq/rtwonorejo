<?php
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: filename=Data List_Rapat.xlsx");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=List_Rapat.xls");

?>

<html>

<head>
  <style>
  /* table,
  th,
  td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 10px;
  } */
  .border {
    border: 1px solid black;
    padding: 10px;
  }
  </style>
</head>

<body>
  <table>
    <thead>
      <tr></tr>
      <tr></tr>
      <tr>
        <th></th>
        <th></th>
        <th class="border">No</th>
        <th class="border">Nama Rapat</th>
        <th class="border">Deskripsi</th>
        <th class="border">Tanggal Rapat</th>
        <th class="border">Ruangan</th>
        <th class="border">Pengaju Rapat</th>
        <th class="border">Perlengkapan</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($rapats as $rapat) : ?>
      <tr>
        <td></td>
        <td></td>
        <td class="border"><?= $i++; ?></td>
        <td class="border"><?= $rapat->namarapat; ?></td>
        <td class="border"><?= $rapat->deskripsirapat; ?></td>
        <td class="border"><?= $rapat->tglrapat; ?></td>
        <td class="border"><?= $rapat->ruangan; ?></td>
        <td class="border">
          <?php foreach ($pengajus as $pengaju) : ?>
          <?php if ($pengaju->rapatid == $rapat->rapatid) : ?>
          <?= $pengaju->pengaju; ?>
          <?php endif; ?>
          <?php endforeach; ?>
        </td>
        <?php $dataperlengkapan = array(); ?>
        <?php foreach ($perlengkapans as $perlengkapan) : ?>
        <?php if ($perlengkapan->rapatid == $rapat->rapatid) : ?>
        <?php $dataperlengkapan[] = $perlengkapan->perlengkapan; ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <td class="border">
          <?php if (!empty($dataperlengkapan)) : ?>
          <?php
              $tmp_perlengkapan = implode(", ", $dataperlengkapan); ?>
          <?= $tmp_perlengkapan; ?>
          <?php else : ?>
          Tidak ada
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>