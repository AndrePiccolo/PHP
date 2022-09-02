<?php

class LoginPage
{
    static $notifications = "";

    static function displayHeader()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/form.css">
            <link rel="icon" href="images/favicon.png" type="images/ico">
            <title>WalkinClinic</title>
        </head>

    <?php
    }

    static function displayContent()
    {
    ?>

        <body>
            <div class="container">
                <div>
                    <header>
                        <h1>Walk-in Clinic</h1>
                    </header>
                    <div id="flexbox">
                    <?php
                }

                static function displayForm()
                {
                    ?>
                        <main>
                            <div id="contentStyle">
                                <fieldset id="informationDetails">
                                    <legend>Login</legend>
                                    <p class="error"><?php
                                                        if (strcmp(self::$notifications, "") != 0) {
                                                            echo self::$notifications;
                                                        } ?></p>
                                    <form action="" method="post">
                                        <div class="fieldStyle">
                                            <label for="user">User:</label>
                                            <input type="text" name="user" id="user" required>
                                        </div>
                                        <div class="fieldStyle">
                                            <label for="password">Password:</label>
                                            <input type="password" name="password" id="password" required>
                                        </div>
                                        <div class="buttonStyle">
                                            <input type="submit" name="submit" class="buttonConfig" value="Login">
                                        </div>
                                    </form>
                                </fieldset>
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