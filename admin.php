<?php
include("config.php");
include("header.php");
include("db.php");
?>

<!-- ===== NAVBAR START ===== -->
<div style="background:white; text-align:center; padding:12px;">
<a href="index.php?page=home" style="background:#ffe6f2; padding:7px 15px; border-radius:20px; text-decoration:none; color:black;">Home</a>
<a href="admin.php" style="background:hotpink; padding:7px 15px; border-radius:20px; text-decoration:none; color:white;">Admin</a>
</div>
<!-- ===== NAVBAR END ===== -->

<div style="text-align:center; padding:15px;">
<h2 style="color:hotpink;">Admin Panel - Vapi 💄</h2>

<?php
// ===== RATE LIST START =====
$rate = [
  "Face Makeup"=>500,
  "Eye Makeup"=>300,
  "Lip Makeup"=>200,
  "Bridal Makeup"=>2500
];

function getFinal($service, $rate){
  if($service == "Bridal Makeup"){ return $rate[$service] * 0.75; }
  else { return $rate[$service]?? 500; }
}

// ===== EARNING CALCULATION START - Multiple wala =====
$q = mysqli_query($conn, "SELECT * FROM bookings");
$all = [];
$org = 0; $fin = 0;
while($row = mysqli_fetch_assoc($q)){
  $all[] = $row;
  // "Lip Makeup, Eye Makeup" ko tod do
  $parts = explode(",", $row['service']);
  foreach($parts as $p){
    $sname = trim($p);
    $sname = ucwords(strtolower($sname));
    if(isset($rate[$sname])){
      $org += $rate[$sname];
      $fin += getFinal($sname, $rate);
    }
  }
}
$disc = $org - $fin;
?>

<!-- ===== 4 BOX START ===== -->
<div style="background:white; display:inline-block; padding:10px 20px; border-radius:10px; margin:5px; border:2px solid hotpink;"><b>Bookings</b><br><?php echo count($all);?></div>
<div style="background:white; display:inline-block; padding:10px 20px; border-radius:10px; margin:5px; border:2px solid grey;"><b>Original</b><br><s>Rs.<?php echo $org;?></s></div>
<div style="background:white; display:inline-block; padding:10px 20px; border-radius:10px; margin:5px; border:2px solid orange;"><b>Discount</b><br>-Rs.<?php echo $disc;?></div>
<div style="background:white; display:inline-block; padding:10px 20px; border-radius:10px; margin:5px; border:2px solid green;"><b>Final</b><br><b style="color:green;">Rs.<?php echo $fin;?></b></div>

<!-- ===== SEARCH AND EXCEL START ===== -->
<div style="margin:15px 0;">
<input type="text" id="search" placeholder="🔍 Search Name..." onkeyup="searchTable()" style="padding:8px 15px; width:250px; border:2px solid hotpink; border-radius:20px;">
<button onclick="downloadExcel()" style="background:green; color:white; padding:8px 15px; border-radius:20px; border:none; margin-left:10px;">📥 Excel</button>
</div>

<!-- ===== CHART START ===== -->
<div style="background:white; width:400px; margin:15px auto; padding:15px; border-radius:15px; box-shadow:0 3px 10px pink;">
<h4 style="color:hotpink;">📊 Popular Service</h4>
<canvas id="myChart" style="max-height:200px;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let labels = [];
let values = [];
<?php
// ===== CHART FIX - Multiple wala, Other nahi =====
$chart_data = [];
$allowed = ["Face Makeup", "Eye Makeup", "Lip Makeup", "Bridal Makeup"];
$q2 = mysqli_query($conn, "SELECT service FROM bookings");
while($r = mysqli_fetch_assoc($q2)){
  $parts = explode(",", $r['service']); // comma se todo
  foreach($parts as $p){
    $s = trim($p);
    if($s == ""){ continue; }
    $s = ucwords(strtolower($s));
    if(!in_array($s, $allowed)){ continue; } // Other ko skip
    if(isset($chart_data[$s])){ $chart_data[$s]++; } else { $chart_data[$s]=1; }
  }
}
foreach($chart_data as $name => $count){
  echo "labels.push('$name');\n";
  echo "values.push($count);\n";
}
?>
if(labels.length==0){labels=['No Data']; values=[1];}
new Chart(document.getElementById('myChart'),{
  type:'pie',
  data:{labels:labels, datasets:[{data:values, backgroundColor:['#ff69b4','#ff1493','#ffb6d9','#ffc2d1']}]}
});
</script>

<!-- ===== TABLE START ===== -->
<div style="background:white; width:90%; margin:20px auto; padding:15px; border-radius:10px;">
<table id="bookingTable" style="width:100%; border-collapse:collapse; text-align:center;">
<tr style="background:hotpink; color:white;"><th>ID</th><th>Name</th><th>Service</th><th>Original</th><th>Final</th><th>Delete</th></tr>
<?php
$q = mysqli_query($conn, "SELECT * FROM bookings");
while($r = mysqli_fetch_assoc($q)){
  $full_service = trim($r['service']);
  if($full_service == ""){ continue; }

  // price nikalo multiple ka
  $o_total = 0; $f_total = 0; $show_tag = "";
  $parts = explode(",", $full_service);
  foreach($parts as $p){
    $sname = ucwords(strtolower(trim($p)));
    if(isset($rate[$sname])){
      $o_total += $rate[$sname];
      $f_total += getFinal($sname, $rate);
      if($sname=="Bridal Makeup"){ $show_tag = "<br><small style='color:red;'>25% OFF</small>"; }
    }
  }
  if($o_total==0){ continue; } // galat data skip

  $delId = urlencode($r['booking_id']);
  echo "<tr style='border-bottom:1px solid pink;'>";
  echo "<td><b>".$r['booking_id']."</b></td>";
  echo "<td>".$r['name']."</td>";
  echo "<td>".$full_service."</td>"; // pura dikhao "Lip + Eye"
  echo "<td>Rs.$o_total</td>";
  echo "<td style='color:green;'><b>Rs.$f_total</b>$show_tag</td>";
  echo "<td><a href='admin.php?del=$delId' style='background:red; color:white; padding:3px 8px; border-radius:10px; text-decoration:none;'>X</a></td>";
  echo "</tr>";
}
?>
</table>
</div>
</div>

<script>
function searchTable(){
  let input = document.getElementById("search").value.toLowerCase();
  let rows = document.querySelectorAll("#bookingTable tr");
  for(let i=1; i<rows.length; i++){
    let text = rows[i].innerText.toLowerCase();
    rows[i].style.display = text.includes(input)? "" : "none";
  }
}
function downloadExcel(){
  let table = document.getElementById("bookingTable");
  let csv = "";
  for(let row of table.rows){
    let cols = [];
    for(let j=0; j<row.cells.length-1; j++){ cols.push(row.cells[j].innerText); }
    csv += cols.join(",") + "\n";
  }
  let blob = new Blob([csv], {type:"text/csv"});
  let a = document.createElement("a");
  a.href = URL.createObjectURL(blob);
  a.download = "Bhavna_Bookings.csv";
  a.click();
}
</script>

<?php
if(isset($_GET['del'])){
  $id = urldecode($_GET['del']);
  mysqli_query($conn,"DELETE FROM bookings WHERE booking_id='$id'");
  echo "<script>window.location='admin.php';</script>";
}
include("footer.php");
?>