<!DOCTYPE html>
<html>
<head>
 <!-- Bootstrap -->
 <link href="css/bootstrap.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
 <div class="row">
  <div class="span1"></div>
   <div class="span11">
    <center><h3>MANAGE USERS</h3></center>
    <?php if (!empty($_GET['update'])){
      if ($_GET['update']==1)
        echo "<p class='message'> <h4>Data user berhasil diupdate</h4></p>";
      else if ($_GET['update']==2)
        echo "<p class='message'> <h4>Data user berhasil ditambahkan</h4></p>";
      else if ($_GET['update']==3)
        echo "<p class='message'> <h4>Data user berhasil dihapus</h4></p>";
    }?>
    <?php
      $no=1;
      $host="localhost"; // Host name
      $username="root"; // Mysql username
      $password=""; // Mysql password
      $db_name="praktikum8"; // Database name
      $conn = mysqli_connect($host, $username, $password, $db_name);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $sqlCount = "select count(username) from user";
      // untuk membaca sintaks database
      $query = mysqli_query($conn, $sqlCount) or die(mysqli_error($conn));
      $rsCount = mysqli_fetch_array($query);
      $banyakData = $rsCount[0];
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 5;
      $mulai_dari = $limit * ($page - 1);
      $sql_limit = "select * from user order by
      username limit $mulai_dari, $limit";
      $hasil = mysqli_query($conn, $sql_limit) or die(mysqli_error($conn));
      if (mysqli_num_rows($hasil) == 0){
        echo "<p class='message'>Data tidak ditemukan!</p>";
      }
    ?>
  <table class="table table-hover">
   <thead>
     <tr class="success">
       <td><b>No</b></td>
       <td><b>Username</b></td>
       <td><b>Password</b></td>
       <td><b>Level</b></td>
       <td><b>Action</b></td>
     </tr>
   </thead>
  <tbody>
  <?php $no=$no+(($page-1)*$limit);
    //Buang field ke dalam array
    while ($data=mysqli_fetch_array($hasil)){
  ?>
  <tr class="success">
    <td><?php echo $no;?></td>
    <td><?php echo $data[1]; ?></td>
    <td><?php echo $data[2]; ?></td>
    <td><?php echo $data[3]; ?></td>
    <td>
     <a href= "updateUser.php?id=<?php echo $data[0];?>" button class="update btn-sm btn-primary">Update</a></button>
     <a href= "hapusUser.php?id=<?php echo $data[0];?>" button class="delete btn-sm btn-warning" onclick= "return confirm('Do you want to delete user <?php echo $data[1];?>?')">Delete</a></button>
    </td>
   </tr>
   <?php $no++;
    }?>
   </tbody>
  </table>
<?php {}?>
<div class="pagination pagination-right">
 <?php
  // untuk pembulatan keatas
  $banyakHalaman = ceil($banyakData / $limit);
  echo 'Page ';
  for($i = 1; $i <=$banyakHalaman; $i++){
    if($page != $i){
      echo '<a href="index.php?page='.$i.'">'.$i.' </a> ';
    }else{
     echo "$i ";
    }
  }
 ?>
</div>
<a href="tambahUser.php" button class="btn btn-success" type="button">Add Data</a></button>
</div>
</div>
</body>
</html>
