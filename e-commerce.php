<?php
include "koneksi.php";

$query = "SELECT * FROM produk";

if(isset($_GET['harga'])){

    $harga = $_GET['harga'];

    if($harga == "low"){
        $query = "SELECT * FROM produk WHERE Harga < 8000";
    }
    elseif($harga == "mid"){
        $query = "SELECT * FROM produk WHERE Harga BETWEEN 8000 AND 10000";
    }
    elseif($harga == "high"){
        $query = "SELECT * FROM produk WHERE Harga > 10000";
    }

}

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Simple E-Commerce</title>

<style>

body{
font-family:Arial;
background:#f4f4f4;
margin:0;
padding:30px;
}

h1{
text-align:center;
margin-bottom:30px;
}

/* FILTER BUTTON */

.filter-buttons{
text-align:center;
margin-bottom:30px;
}

.filter-buttons a{
text-decoration:none;
}

.filter-buttons button{
padding:10px 18px;
margin:5px;
border:none;
background:#007bff;
color:white;
border-radius:20px;
cursor:pointer;
font-size:14px;
transition:0.3s;
}

.filter-buttons button:hover{
background:#0056b3;
}

/* PRODUCT GRID */

.product-container{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
}

/* PRODUCT CARD */

.card{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 4px 12px rgba(0,0,0,0.1);
transition:0.3s;
}

.card:hover{
transform:translateY(-5px);
}

.card h3{
margin:0 0 10px;
}

.price{
font-weight:bold;
color:green;
margin-top:10px;
}

.buy-btn{
margin-top:15px;
padding:8px 15px;
border:none;
background:#28a745;
color:white;
border-radius:6px;
cursor:pointer;
}

.buy-btn:hover{
background:#1f7e34;
}

</style>

</head>

<body>

<h1>My Simple E-Commerce</h1>

<div class="filter-buttons">

<a href="e-commerce.php">
<button>All</button>
</a>

<a href="e-commerce.php?harga=low">
<button>Low Price</button>
</a>

<a href="e-commerce.php?harga=mid">
<button>Mid Price</button>
</a>

<a href="e-commerce.php?harga=high">
<button>High Price</button>
</a>

</div>


<div class="product-container">

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="card">

<h3><?php echo $row['Nama']; ?></h3>

<p><?php echo $row['Deskripsi']; ?></p>

<p class="price">
Rp <?php echo number_format($row['Harga']); ?>
</p>

<button class="buy-btn">Buy Now</button>

</div>

<?php } ?>

</div>

</body>
</html>