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
 $adminList = allAdmins();  

 foreach ($adminList as $admin){?>
    <tr>
        <td><?= $admin["adminID"]?></td>
        <td><?= $admin["Username"]?></td>
        <td>
            <form action="indexAdmin.php" method='post'>
                <button name='editAdmin' value=<?php echo $admin['adminID']; ?>>Delete</button>
            </form>
        </td>
    </tr>
  <?php } ?>
  </tbody>
</table>