<?php
class Page
{

    public static $developerName = "Andre Piccolo";
    public static $developerID = "300347025";

    static function header()
    {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="author" content="Bambang">
            <title></title>
            <link href="css/styles.css" rel="stylesheet">
        </head>

        <body>
            <header>
                <h1>Practice that Rules out all assignments -- Andre (300347025)</h1>
            </header>
            <article>
            <?php
        }

        static function footer()
        {
            ?>
                <!-- Start the page's footer -->
            </article>
        </body>

        </html>
    <?php
        }

        static function displayStudentList(array $studentObjectArrays)
        {
    ?>
        <section class="main">
            <h2>Current Data</h2>
            <table id="data">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Department</th>
                        <?php
                        if (LoginManager::verifySession()) {
                            echo "<th>Detail</th>";
                            echo "<th>Delete</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $i = 0;
                    foreach ($studentObjectArrays as $student) {
                        // make sure to use the correct tr class
                        // echo "<tr class=
                        if ($i % 2 == 1) {
                            echo "<tr class=\"oddRow\">";
                        } else {
                            echo "<tr class=\"evenRow\">";
                        }

                        echo "<td>" . $student->getStudentID() . "</td>";
                        echo "<td>" . $student->getFullName() . "</td>";
                        echo "<td>" . $student->LongName . "</td>";

                        if (LoginManager::verifySession()) {
                            $linkDetail = $_SERVER['PHP_SELF'] . '?action=detail&id=' . $student->getStudentID();
                            echo "<td><a href=\"" . $linkDetail . "\">Detail</td>";
                            $linkDelete = $_SERVER['PHP_SELF'] . '?action=delete&id=' . $student->getStudentID();
                            echo "<td><a href=\"" . $linkDelete . "\">Delete</td>";
                        }

                        echo "</tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </section>
    <?php
        }

        static function displayAddStudentForm(array $departmentObjects)
        {
    ?>
        <section class="form1">
            <h3>Add Student</h3>
            <form action="" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td>Student ID</td>
                            <td><input type="text" name="id" placeholder="300XXXXXX"></td>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td><input type="text" name="fullName"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td>Date of Join</td>
                            <td><input type="date" name="doj"></td>
                        </tr>
                        <tr>
                            <td>Terms</td>
                            <td><input type="number" min="1" max="8" step="1" name="terms"></td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td>
                                <select name="deptID">
                                    <?php
                                    foreach ($departmentObjects as $department) {
                                        echo "<option value=\"" . $department->getDeptID() . "\">"
                                            . $department->getLongName() . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="action" value="create">
                <input type="submit" value="Add Student">
            </form>
        </section>
    <?php
        }

        static function displayFilterForm(array $departmentObjects)
        {
    ?>
        <section class="form_filter">
            <form action="" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td>Department</td>
                            <td>
                                <select name="deptID">
                                    <option value=''>All</option>
                                    <?php
                                    foreach ($departmentObjects as $department) {
                                        echo "<option value=\"" . $department->getDeptID() . "\">"
                                            . $department->getLongName() . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td width="20%">
                                <input type="hidden" name="sortby" value="">
                                <input type="hidden" name="sortorder" value="">
                                <input type="submit" name="filter" value="Filter Data">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </section>
    <?php
        }

        static function displayStudentDetail(Student $student, Department $department)
        {
    ?>
        <section class="detail">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">
                            Detail for student with ID <?php echo $student->getStudentID(); ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Full Name</td>
                        <?php echo "<td>" . $student->getFullName() . "</td>"; ?>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <?php echo "<td>" . $student->getEmail() . "</td>"; ?>
                    </tr>
                    <tr>
                        <td>Date of Join</td>
                        <?php echo "<td>" . $student->getDateJoin() . "</td>"; ?>
                    </tr>
                    <tr>
                        <td>Number of Terms</td>
                        <?php echo "<td>" . $student->getNumberOfTerms() . "</td>"; ?>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <?php echo "<td>" . $department->getLongName() . "</td>"; ?>
                    </tr>
                </tbody>
            </table>
        </section>
    <?php
        }

        static function displayLogin()
        {
    ?>
        <section class="form_login">
            <h3>Login</h3>
            <form action="" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" placeholder="Enter Username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" placeholder="Enter password"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="login" value="Login"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </section>
    <?php
        }

        static function displayLogout()
        {
    ?>
        <section class="form_logout">
            <h3>Logout</h3>
            <form action="" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td>Hi <?php echo $_SESSION['loggedin']; ?>!</td>
                            <td><input type="submit" name="logout" value="Logout"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </section>
<?php
        }
    }
