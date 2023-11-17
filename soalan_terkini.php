<?php require 'sambung.php'; ?>
<table>
<tr>
    <th>Bil</th>
    <th>Topik</th>
  </tr>
<?php
    $no=1;
    $data1=mysqli_query($hubung,"SELECT * FROM topik ORDER BY IDTopik desc limit 0,10");
    while ($info1=mysqli_fetch_array($data1))
    {
        ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $info1['TopikKuiz']; ?></td>
    </tr>
    <?php $no++; } ?>
</table>
<br>
<center><font style='font-size:14px; color:white;'>
*Rekod yang dipaparkan adalah 10 yang terkini sahaja*<br/>
Jumlah Rekod: <?php echo $no-1; ?>
</font></center>