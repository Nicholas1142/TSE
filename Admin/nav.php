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
        <li><a href="#">Worker<i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                  <li><a href="aAllworker.php">Manage Worker</a></li>
                </ul>
              </div>
        </li>
       
        <li><a href="alogout.php" id="logout-link">Logout</a></li>
      </ul>
    </div>
    <script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
      var confirmation = confirm("Are you sure you want to log out?");
      if (!confirmation) {
        event.preventDefault();
      }
    });
  </script>
    
  </body>
</html>