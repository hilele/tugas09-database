<?php
session_start();
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "praktikum8"; // Database name
$conn = mysqli_connect($host, $username, $password, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = $_POST['username'];
if(isset($_POST['password'])) {
  $password = $_POST['password'];
} else {
  $password = $_SESSION['password'];
}
$level = $_POST['level'];
$id = $_SESSION['id'];
$_SESSION['id'] = $id;

$sql_find_uname = "select count(username) from user where username='$username'";
$queryFind = mysqli_query($conn, $sql_find_uname)->fetch_assoc();
foreach ($queryFind as $key) {
  $tot = $key;
}

if($tot == 0) {
  if(isset($password)) {
    $sql_update = "update user set username = '$username', password = '$password', level = '$level' where id='$id'";
  } else {
    $sql_update = "update user set username = '$username', level = '$level' where id='$id'";
  }
  if ($username == ""){
  ?>
      <script type="text/javascript">
      alert("Data masih belum lengkap")
      window.location = "updateUser.php?id=<?php echo $id ?>";
      </script>;
  <?php
  }else{
    $query = mysqli_query($conn, $sql_update);
    header('location:index.php?update=1');
  }
}
?>
