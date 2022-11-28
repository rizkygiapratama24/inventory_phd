<?php
    $host = $_SERVER['HTTP_HOST'];
    $hest = "http://".$host."/inventory_phd/admin";
?>
 <div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">Inventory PHD</div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo $hest; ?>/dashboard.php">Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo $hest; ?>/barang/">Data Barang</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo $hest ?>/barang_masuk/">Barang Masuk</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo $hest; ?>/barang_keluar/">Barang Keluar</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo $hest; ?>/jenis_barang/">Jenis Barang</a>       
    </div>
</div>
