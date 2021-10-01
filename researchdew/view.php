<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>


<div class="delete_fo">

<button class="btn_reth"  value="Go Back" onclick="history.back(-1)">Back</button>
<br>
<br>


<h2>View Crowd List</h2>
<table class="delete_form" width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>id</strong></th>
<th><strong>Name</strong></th>
<th><strong>location</strong></th>


</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from videos ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["location"]; ?></td>
<td align="center">

</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>

<h2>View Normal List</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>id</strong></th>
<th><strong>Name</strong></th>
<th><strong>location</strong></th>


</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from videos2 ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["location"]; ?></td>
<td align="center">

</td>
<td align="center">
<a href="delete2.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>