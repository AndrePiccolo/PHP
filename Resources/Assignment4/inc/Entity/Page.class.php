<?php

class Page
{

    public static $heading = "";
    public static $studentID = "300347025";
    public static $studentName = "Andre Piccolo";
    public static $notifications = "";


    static function displayHeader()
    { ?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="author" content="">
            <link rel="stylesheet" href="css/styles.css">
        </head>

        <body>

            <section>
                <h1><?php echo "Assignment 4 - " . self::$studentName . " (" . self::$studentID . ")"; ?></h1>
            </section>
        <?php }


    static function displayFooter()
    { ?>
        </body>

        </html>
    <?php }


    static function displayProfile(User $user, array $question)
    { ?>
        <section>
            <div>
                <form action="" method="post">

                    <div>
                        <img src="images/<?php echo $user->getPicture(); ?>.png" width="30%">
                        <div>
                            <h2>Hi <?php echo $user->getUserName(); ?></h2>
                            <p>Email Address: <strong><?php echo $user->getEmail(); ?></strong></p>
                            <p>The not security question:<br> <strong><?php echo $question[$user->getQuestion()]; ?></strong></p>
                            <p>Answer of the not security question: <strong><?php echo $user->getAnswer(); ?></strong></p>
                            <input type="hidden" name="username" value="<?php echo $user->getUserName(); ?>">
                            <p><input type="submit" name="submit" value="Logout"></p>
                        </div>

                    </div>
                </form>
            </div>

        </section>
    <?php }


    static function displayLogin()
    { ?>
        <section>
            <div>
                <form action="" method="post">
                    <h2>Please Sign in</h2>
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="user name for login" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Login">
                    </div>
                    <p class="error"><?php
                                        echo self::$notifications;
                                        ?></p>
                    <p>Don not have an account? Please <a href="Assignment4_register_APi47025.php">register</a></p>
                </form>
            </div>
        </section>
    <?php }


    static function displayRegistration()
    { ?>
        <section>
            <div>
                <p>Have an account? Please <a href="Assignment4_login_APi47025.php">login</a></p>
                <p class="error"><?php
                                    if (strcmp(self::$notifications, "") != 0) {
                                        echo self::$notifications;
                                    } ?></p>
                <form action="" method="post">
                    <h2>Please fill the form</h2>
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Enter username with no whitespace" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <label for="password">Password confirm</label>
                        <input type="password" name="password2" placeholder="Password confirm" required>
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="Email address for login" required>
                    </div>
                    <div>
                        <label for="picture">Profile Picture</label>
                        <span>
                            <input type="radio" name="picture" value="profile1"><img src="images/profile1.png">
                            <input type="radio" name="picture" value="profile2"><img src="images/profile2.png">
                            <input type="radio" name="picture" value="profile3"><img src="images/profile3.png">
                            <br>
                            <input type="radio" name="picture" value="profile4"><img src="images/profile4.png">
                            <input type="radio" name="picture" value="profile5"><img src="images/profile5.png">
                            <input type="radio" name="picture" value="profile6"><img src="images/profile6.png">
                        </span>
                    </div>
                    <div>
                        <label for="question">Not a security question</label>
                        <select name="question" required>
                            <option value="Q1">What is your favorite security question?</option>
                            <option value="Q2">What is your favorite villain movie character?</option>
                            <option value="Q3">Which planet do you want to go for your next vacation?</option>
                            <option value="Q4">What is the purpose of this question?</option>
                            <option value="Q5">When did you stop trying hard to pass this course?</option>
                        </select>
                    </div>
                    <div>
                        <label for="answer">Answer of the not security question</label>
                        <input type="text" name="answer" placeholder="Answer of of not security question" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Register">
                    </div>
                </form>
            </div>
        </section>
    <?php }

    static function displayLogout()
    {
    ?>
        <section>
            <div>
                <h2>Thank you for your visit <?php echo self::$heading; ?>!</h2>
            </div>
        </section>
<?php }
}
