<?php
include("config.php");
include("header.php");
include("db.php");

if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 'home';
}
?>

<!-- ===== MENU START ===== -->
<div style="background:white; text-align:center; padding:12px; box-shadow:0 2px 10px pink;">
<a href="index.php?page=home" style="margin:8px; background:#ffe6f2; padding:7px 16px; border-radius:20px; text-decoration:none; color:black; font-weight:bold;">Home</a>
<a href="index.php?page=about" style="margin:8px; background:#ffe6f2; padding:7px 16px; border-radius:20px; text-decoration:none; color:black; font-weight:bold;">About</a>
<a href="index.php?page=collection" style="margin:8px; background:#ffe6f2; padding:7px 16px; border-radius:20px; text-decoration:none; color:black; font-weight:bold;">Collection</a>
<a href="index.php?page=contact" style="margin:8px; background:#ffe6f2; padding:7px 16px; border-radius:20px; text-decoration:none; color:black; font-weight:bold;">Contact</a>
<a href="admin.php" style="margin:8px; background:#ffe6f2; padding:7px 16px; border-radius:20px; text-decoration:none; color:black; font-weight:bold;">Admin</a>
</div>
<div style="background:hotpink; color:white; text-align:center; padding:8px; font-weight:bold;">
🎉 Bridal pe 25% OFF - Call: <?php echo $display_number;?> 🎉
</div>
<!-- ===== MENU END ===== -->

<?php if($page == 'home'){?>
<!-- ===== HOME PAGE START ===== -->
<div style="background:white; width:700px; margin:20px auto; padding:20px; border-radius:10px; text-align:center;">
<img src="images/banner.jpg" onerror="this.src='https://via.placeholder.com/650x220/ff69b4/ffffff?text=Bhavna+Makeup+Magic'" width="650" height="220" style="border-radius:10px; border:2px solid hotpink;">
<h1 style="color:hotpink;">Bhavna Makeup Magic</h1>
<p>✨ Beauty | Glamour | Confidence ✨</p>
<a href="index.php?page=collection" style="background:hotpink; color:white; padding:10px 20px; text-decoration:none; border-radius:20px;">Explore Collection</a>
<br>
<div style="background:black; color:white; padding:10px 20px; border-radius:20px; margin-top:15px; display:inline-block;">Offer Ends In: <span id="time">05:00</span> ⏰</div>
<script>
let t=300;
setInterval(function(){
  let m=Math.floor(t/60);
  let s=t%60;
  if(s<10){s="0"+s;}
  document.getElementById('time').innerText="0"+m+":"+s;
  t--; if(t<0){t=300;}
},1000);
</script>
</div>

<div style="text-align:center;">
<div style="background:white; width:200px; display:inline-block; margin:5px; padding:10px; border-radius:10px;">💯 <b>Quality</b></div>
<div style="background:white; width:200px; display:inline-block; margin:5px; padding:10px; border-radius:10px;">👰 <b>Bridal Special</b></div>
<div style="background:white; width:200px; display:inline-block; margin:5px; padding:10px; border-radius:10px;">📞 <b><?php echo $display_number;?></b></div>
</div>

<!-- BEFORE AFTER -->
<div style="background:white; width:700px; margin:20px auto; padding:15px; border-radius:15px; text-align:center; border:2px solid hotpink;">
<h3 style="color:hotpink;">✨ Before / After Magic ✨</h3>
<div style="display:inline-block; width:200px; background:#ffe6f2; padding:15px; border-radius:10px; margin:10px;">
<p style="font-size:40px;">😊</p><p><b>Before</b></p><p style="font-size:13px;">Simple Look</p>
</div>
<div style="display:inline-block; font-size:25px;">➡</div>
<div style="display:inline-block; width:200px; background:hotpink; color:white; padding:15px; border-radius:10px; margin:10px; border:2px solid gold;">
<p style="font-size:40px;">💄👰</p><p><b>After</b></p><p style="font-size:13px;">Glam Makeup!</p>
</div>
<p style="font-size:11px; color:grey;">Vapi ki Best Transformation - by Bhavna Sonawane</p>
</div>

<!-- REVIEWS -->
<div style="background:white; width:700px; margin:20px auto; padding:15px; border-radius:15px; text-align:center; border:2px solid gold;">
<h3 style="color:hotpink;">⭐ Happy Clients - Vapi ⭐</h3>
<div style="display:inline-block; width:190px; background:#fff9e6; padding:10px; border-radius:10px; margin:5px;"><p>⭐⭐⭐⭐⭐</p><b>Kajal - Chanod</b><br><small>Bridal makeup perfect!</small></div>
<div style="display:inline-block; width:190px; background:#fff0f6; padding:10px; border-radius:10px; margin:5px;"><p>⭐⭐⭐⭐⭐</p><b>Neha - Vapi</b><br><small>Best for Eye Makeup!</small></div>
<div style="display:inline-block; width:190px; background:#e6f9ff; padding:10px; border-radius:10px; margin:5px;"><p>⭐⭐⭐⭐⭐</p><b>Aarti - Surat</b><br><small>Service best!</small></div>
</div>
<!-- ===== HOME PAGE END ===== -->
<?php }?>

<?php if($page == 'about'){?>
<!-- ===== ABOUT US START ===== -->
<div style="background:white; width:700px; margin:20px auto; padding:15px; border-radius:12px; text-align:center; border:2px solid hotpink;">
<h3 style="color:hotpink;">📍 My Parlour Location - Vapi</h3>
<p><b>E-413 Varundawan Park, Amar Nagar, Chanod, Vapi</b></p>
<iframe src="https://maps.google.com/maps?q=20.3394782,72.9265445&z=18&output=embed" width="100%" height="300" style="border:0; border-radius:10px;"></iframe>
<br><br>
<a href="https://www.google.com/maps/dir/?api=1&destination=20.3394782,72.9265445" target="_blank" style="background:hotpink; color:white; padding:10px 20px; text-decoration:none; border-radius:20px;">🚗 Get Directions</a>
</div>
<!-- ===== ABOUT US END ===== -->
<?php }?>

<?php if($page == 'collection'){?>
<!-- ===== COLLECTION START - Multiple Select ===== -->
<h2 style="color:hotpink; text-align:center;">Our Collection - Select Multiple 💄</h2>
<form method="GET" action="index.php" style="text-align:center;">
<input type="hidden" name="page" value="contact">
<div style="text-align:center;">
<?php
$collection = [
  ["name"=>"Face Makeup", "photo"=>"images/face.jpg", "price"=>500, "off"=>false],
  ["name"=>"Eye Makeup", "photo"=>"images/eye.jpg", "price"=>300, "off"=>false],
  ["name"=>"Lip Makeup", "photo"=>"images/lip.jpg", "price"=>200, "off"=>false],
  ["name"=>"Bridal Makeup", "photo"=>"images/bridal.jpg", "price"=>2500, "off"=>true]
];
foreach($collection as $item){
  echo "<div style='background:white; width:220px; display:inline-block; margin:10px; padding:10px; border-radius:15px; box-shadow:0 3px 10px pink; vertical-align:top;'>";
  if($item['off']==true){
    echo "<span style='background:red; color:white; padding:3px 8px; border-radius:10px; font-size:11px;'>25% OFF</span><br>";
  }
  echo "<img src='".$item['photo']."' width='200' height='200' style='border-radius:10px; margin-top:5px;'><h3>".$item['name']."</h3>";
  echo "<p><b>Rs.".$item['price']."</b></p>";
  echo "<label style='background:#ffe6f2; padding:6px 12px; border-radius:10px; cursor:pointer;'><input type='checkbox' name='makeup[]' value='".$item['name']."'> Select</label>";
  echo "</div>";
}
?>
</div>
<br>
<button type="submit" style="background:hotpink; color:white; padding:10px 25px; border:none; border-radius:20px; font-weight:bold;">Next - Book Now ➡</button>
</form>
<!-- ===== COLLECTION END ===== -->
<?php }?>

<?php if($page == 'contact'){?>
<!-- ===== CONTACT START ===== -->
<div style="background:white; width:700px; margin:20px auto; padding:20px; border-radius:10px; text-align:center;">
<h2 style="color:hotpink;">Contact Us - <?php echo $display_number;?></h2>
<?php
$selected_str = "";
if(isset($_GET['makeup'])){
  if(is_array($_GET['makeup'])){
    $selected_list = $_GET['makeup'];
    $selected_str = implode(", ", $selected_list);
    echo "<h3 style='background:#ffe6f2; padding:10px; border-radius:10px; color:hotpink;'>You Selected: $selected_str 💄</h3>";
  } else {
    $selected_str = $_GET['makeup'];
    echo "<h3 style='background:#ffe6f2; padding:10px; border-radius:10px; color:hotpink;'>You Selected: $selected_str 💄</h3>";
  }
}
?>
<form method="POST">
<input type="hidden" name="selected_makeup" value="<?php echo $selected_str;?>">
<input type="text" name="name" placeholder="Aapka Naam" required style="padding:10px; width:250px; border:1px solid pink; border-radius:5px;"><br><br>
<input type="text" name="phone" placeholder="Phone - 10 digit" required pattern="[0-9]{10}" style="padding:10px; width:250px; border:1px solid pink; border-radius:5px;"><br><br>
<input type="date" name="bdate" required min="<?php echo date('Y-m-d');?>" style="padding:10px; width:250px; border:1px solid pink; border-radius:5px;"><br><br>
<button type="submit" name="book" style="padding:10px 20px; background:hotpink; color:white; border:none; border-radius:10px;">Confirm Booking</button>
</form>

<?php
if(isset($_POST['book'])){
  $id = rand(1001,9999);
  $m = $_POST['selected_makeup'];
  $bid = "#BM".$id;
  mysqli_query($conn, "INSERT INTO bookings (booking_id,name,phone,service,bdate) VALUES ('$bid','$_POST[name]','$_POST[phone]','$m','$_POST[bdate]')");
?>
  <div id="receipt" style="border:2px dashed hotpink; padding:20px; border-radius:15px; margin-top:20px; background:#fff0f6;">
    <h2 style="color:hotpink;">🎀 Booking Confirmed! 🎀</h2>
    <p><b>ID:</b> <?php echo $bid;?></p>
    <p><b>Name:</b> <?php echo $_POST['name'];?></p>
    <p><b>Service:</b> <?php echo $m;?></p>
    <p><b>Date:</b> <?php echo $_POST['bdate'];?></p>
  </div>
  <button onclick="printReceipt()" style="background:black; color:white; padding:8px 15px; border-radius:10px; margin-top:10px;">🖨 Print</button>
  <?php
  $msg = "Hello Bhavna Makeup! Booking $bid, Service: $m";
  $wa = "https://wa.me/".$whatsapp_number."?text=".urlencode($msg);
  echo "<a href='$wa' target='_blank' style='background:#25D366; color:white; padding:8px 15px; text-decoration:none; border-radius:10px; margin-left:5px;'>📱 WhatsApp</a>";
 ?>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
  <script>
    confetti({particleCount:100, spread:70, origin:{y:0.6}});
    function printReceipt(){
      var c=document.getElementById('receipt').innerHTML;
      var w=window.open('','','height=600,width=800');
      w.document.write('<div style=border:3px dashed hotpink;padding:30px;text-align:center>'+c+'</div>');
      w.print();
    }
  </script>
<?php }?>
</div>
<!-- ===== CONTACT END ===== -->
<?php }?>

<?php include("footer.php");?>
<a href="https://wa.me/<?php echo $whatsapp_number;?>?text=Hi Bhavna" target="_blank" style="position:fixed; bottom:20px; right:20px; background:#25D366; color:white; padding:12px 18px; border-radius:50px; text-decoration:none; font-weight:bold;">📱 WhatsApp</a>