<?php
// /database START - MySQL connection
$conn = mysqli_connect("localhost","root","","makeup_db");
if(!$conn){ $conn = false; } // agar DB nahi bani to bhi site chalegi
// /database END
?>