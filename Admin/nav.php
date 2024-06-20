<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="nav.css" />
    <title>dropdown Menu</title>
  </head>
  <body>
    <div class="menu-bar">
      <h1 class="logo">Admin Dashboard</span></h1>
      <ul>
      <li><a href="admin.php">Home</a></li>
        <li><a href="#">All worker<i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                  <li><a href="#">Pricing</a></li>
                  <li><a href="#">Portfolio</a></li>
                  <li><a href="#">FAQ</a></li>
                </ul>
              </div>
        </li>
       
        <li><a href="alogout.php">Logout</a></li>
      </ul>
    </div>

    
  </body>
</html>