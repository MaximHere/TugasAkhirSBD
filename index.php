<?php
require 'fungsi.php';



?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index</title>
</head>  


<body>
<h1>Chris Laundry</h1>
<p>

<ul>
    <li>
        <button onclick="window.location.href='insert_pelanggan.php'">Insert Pelanggan</button>
    </li>
    <li>
        <button onclick="window.location.href='insert_layanan.php'">Insert Layanan</button>
    </li>
    <li>
        <button onclick="window.location.href='insert_transaksi.php'">Insert Transaksi</button>
    </li> 
    <li>
        <button onclick="window.location.href='insert_orders.php'">Insert Orders</button>
    </li>  

</ul>

<!-- <ul>
    <li>
        <button onclick="window.location.href='insert_transaksi.php'">Insert Transaksi</button>
    </li>
</ul> -->

<ul>
    <li>
        <button onclick="window.location.href='view_pelanggan.php'">View Pelanggan</button>
    </li>
    

        <!-- <a id= 'a1' href='view_pelanggan.php'>View Pelanggan</a> -->
    <li>
        <button onclick="window.location.href='view_layanan.php'">View Layanan</button>
    </li>
    <li>
        <button onclick="window.location.href='view_invoice.php'">View Invoice</button>
    </li>
    <li>
        <button onclick="window.location.href='view_orders.php'">View Orders</button>
    </li>
    


</ul>
</p>
</body>

</html>