<?php

class HomePage
{

  static function displayHeader()
  {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="css/home.css">
      <link rel="icon" href="images/favicon.png" type="images/ico">
      <title>WalkinClinic</title>
    </head>

    <body>
      <div class="container">
        <div>
          <header>
            <h1>Walk-in Clinic</h1>
          </header>
        <?php
      }

      static function displayContent()
      {
        ?>
          <div id="flexbox">
            <div id="navList">
              <nav>
                <ul>
                  <li id="selectedIndex"><a href="Menu.php">Home</a></li>
                  <li><a href="Patient.php">Patient</a></li>
                  <li><a href="AddPatient.php">New Patient</a></li>
                  <li><a href="Agenda.php">Agenda</a></li>
                  <li><a href="AddAppointment.php">New Appointment</a></li>
                  <?php
                  //only admin can use features below
                  if (SessionManager::isUserAdmin()) {
                    echo "<li><a href=\"User.php\">User</a></li>";
                    echo "<li><a href=\"AddUser.php\">New User</a></li>";
                    echo "<li><a href=\"Profit.php\">Profit</a></li>";
                  }
                  $link = $_SERVER['PHP_SELF'] . "?action=logout";
                  echo "<li><a href=\"" . $link . "\">Logout</a></li>";
                  ?>
                </ul>
              </nav>
            </div>
            <main>
              <div>
                <figure>
                  <img id="welcomeImage" src="images/background.jpg" alt="Walk-in Clinic">
                </figure>
              </div>
            </main>
          </div>

        <?php
      }

      static function displayFooter()
      {
        ?>
          <footer>
            Copyright &copy;2022 Andre Piccolo 300347025
          </footer>
        </div>
      </div>
    </body>

    </html>
<?php
      }
    }

?>