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
            <form action="Post">
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
                    <h3 class="canvasTitle">Category</h3>
                    <form action="index.php" method="POST" class="filterForm">
                        <select id="category" name="category" class="btn btn-secondary dropdown-toggle">
                        <li><option value="1">Hoodies</option></li>
                            <li><option value="3">Skateboards</option></li>
                            <li> <option value="4">Wheels</option></li>
                            <li><option value="5">Caps</option></li>
                            <li><option value="0">None</option></li>
                        </select>
                        <br><br><hr>

                    <h3 class="canvasTitle">Color</h3>
                        <input type="radio" id="html" name="color" value="green">
                        <label for="html">Green</label><br>
                        <input type="radio" id="css" name="color" value="purple">
                        <label for="css">Purple</label><br>
                        <input type="radio" id="javascript" name="color" value="red">
                        <label for="javascript">Red</label><br>
                        <input type="radio" id="javascript" name="color" value="grey">
                        <label for="javascript">Grey</label><br>
                        <input type="radio" id="javascript" name="color" value="blue">
                        <label for="javascript">Blue</label><br>
                        <input type="radio" id="javascript" name="color" value="multicolor">
                        <label for="javascript">Multicolor</label><br>
                        <input type="radio" id="javascript" name="color" value="black">
                        <label for="javascript">Black</label><br>
                        <input type="radio" id="javascript" name="color" value="yellow">
                        <label for="javascript">Yellow</label><br>
                        <input type="radio" id="javascript" name="color" value="pink">
                        <label for="javascript">Pink</label><br>
                        <input type="radio" id="javascript" name="color" value="white">
                        <label for="javascript">White</label><br>
                        <input type="radio" id="javascript" name="color" value="0">
                        <label for="javascript">None</label>  
                        <br><br>
                        <input name="btn" class="btn btn-outline-secondary" type="submit" value="Filter">
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
            <a class="navbar-brand" href="indexAdmin.php"> 
                <img src="sinusmaterial/sinus assets/logo/cart4.svg" width="40" height="40" class="adminImg" alt="Small image of a torso and head with a small gearhead on it.">
            </a>
        </th>
  </tr>
</table>
</nav>



