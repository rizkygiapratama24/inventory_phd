<?php
include "../../config.php";

$id_barang = $_GET['id_barang'];

$query = $db->prepare("SELECT * FROM barang WHERE id_barang=?");
$query->bind_param('i',$id_barang);
$query->execute();
$result = $query->get_result();
$row = $result->fetch_array();

if (count($row)) {
    $data = array(
        'stok_barang' => $row['stok_barang']
    );
} else {
    echo "error";
}

echo json_encode($data);

?>