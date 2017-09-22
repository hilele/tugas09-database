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
<div class="container">
  <div class="row">
    <div class="span2"></div>
    <div class="span8">
      <center><h3>ADD USER DATA</h3>
        <form action="tambahUser2.php" method="post">
          <table width="319" border="0">
            <tr>
              <td width="152">Username</td>
              <td width="157"><input name="username" type="text" id="username" size="20" /></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input name="password" type="password" id="password" size="20" /></td>
            </tr>
            <tr>
              <td>Level</td>
              <td>
                <select name='level'>
                  <option value='user'>User</option>
                  <option value='admin'>Admin</option>
                </select>
              </td>
            </tr>
          </table>
          <br/>
      <table width border="0">
        <tr>
          <td width="92"><button class="btn btn-default" type="submit">Save</a></button></td>
          <td width="92"><a href="index.php" <button class="btn btn-warning" type="button">Cancel</a></button></td>
        </tr>
      </table>
      </center>
      </form>
    </div>
  </div>
</div>
</body>
</html>
