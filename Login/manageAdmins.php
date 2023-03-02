<?php require 'checkTestLogins.php'?>
<?php include_once 'manageAdminsClass.php'?>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">AdminID</th> 
        <th scope="col">Username</th>
        <th scope="col"></th>
      </tr>
    </thead>
  <tbody>
<?php
 //GET ALL REGISTRED ADMINS
 $adminList = allAdmins();  

 //DISPLAYS ALL ADMINS
 foreach ($adminList as $admin){?>
    <tr>
        <td><?= $admin["adminID"]?></td>
        <td><?= $admin["Username"]?></td>
        <td>
            <form action="indexAdmin.php" method='POST'>
                <input type="hidden" name='deleteAdmin' value="<?php echo $admin['adminID']; ?>">
                <input type="submit" name="submit" value="Delete">
            </form>
        </td>
    </tr>
  <?php } ?>
  </tbody>
</table>