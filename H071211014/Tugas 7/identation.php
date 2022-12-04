<?php
include "db_conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM `crud` WHERE crud.id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: index.php?msg=Data Deleted");
} else {
    echo "Failed " . mysqli_error($conn);
}