<!-- THIS IS THE BAR ON TOP WHERE THE SVG FOR ADMIN IS LOCATED. -->
<style>
     .offcanvas {width:10% !important;}
     #category { text-align: left; background-color: White; color: black;}
     .navbar{
    min-height:3vh;
    max-height:3vh;}
</style>

<nav class="navbar navbar-light bg-white">
<table>
    <tr>
        <th class="adminRow"> <style> .adminRow { width: 5vw;} </style>
            <a class="navbar-brand" href="indexAdmin.php">
                <img src="sinusmaterial/sinus assets/logo/person-gear.svg" width="40" height="40" class="adminImg" alt="Small image of a torso and head with a small gearhead on it.">
            </a>
        </th>
        <th class="fillOutMiddleRow"><style> .fillOutMiddleRow { width: 52vw;} </style>
        </th>

<!-- Search-function -->
        <th class="searchRow"><style> .searchRow { width: 10vw;} </style>
            <form action="zindex.php" method="POST">
                <input type="text" class="form-control" name="search" placeholder="Search..">
        </th> 

<!-- Submit-button -->
        <th class="submitRow"><style> .submitRow { width: 3vw;} </style>
                <button class="btn btn-outline-secondary" input type="submit">Search</button>
            </form> 
        </th>
<!-- Offcanvas for Filter-function -->
        <th class="filterRow"><style> .filterRow { width: 3vw;} </style>
            <div class="offcanvas offcanvas-end" id="filterCanvas">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                <form method="POST">
                    <select id="category" name="category" class="btn btn-secondary dropdown-toggle">
                        <h3 class="canvasTitle">Category</h3>
                        <?php $categories = viewFilterCategories();
                        $counter = 1; // Counts up options-value
                        foreach ($categories as $category) { ?>
                            <li><option value="<?php echo $counter?>"><?php echo $category?></option></li>
                            <?php $counter++; ?>
                            <?php echo $category;
                        }?>
                        <li><option value="0">None</option></li>
                    </select>

                    <br><hr><br>

                    <h3 class="canvasTitle">Colors</h3>
                    <?php $colors = viewFilterColors();
                    $counterColor = 1; // Counts up options-value
                    foreach ($colors as $color) { ?>
                        <input type="radio" name="color" value="<?php echo $color?>">
                        <label for="html"><?php echo $color?></label><br>
                        <?php $counterColor++; ?>
                 <?php } ?>
                    <input type="radio" name="color" value="0">
                    <label for="html">None</label><br>
                    
                    <input type="submit" class="btn btn-outline-secondary">
                    </form>
                </div>
            </div>
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterCanvas">
                Filter
            </button>
        </th> 

        </th>
            <th class="fillOutRightRow"><style> .fillOutRightRow { width: 22vw;} </style>
        </th>
        <th class="cartRow"> <style> .cartRow { width: 5vw;} </style>
            <a class="navbar-brand" href="cart.php"> 
                <img src="sinusmaterial/sinus assets/logo/cart4.svg" width="40" height="40" class="adminImg" alt="Small image of a torso and head with a small gearhead on it.">
            </a>
        </th>
  </tr>
</table>
</nav>



