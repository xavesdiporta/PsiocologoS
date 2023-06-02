<?php
require 'verify.php';
require "../inc/connect.php";
?>
<!DOCTYPE html>
<html>

     
    <!-- head things -->
    <head>
        <meta charset="utf-8" />
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Psicologo da Mosca - Login</title>
        <link rel = "stylesheet" href = "../inc/css.css">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    </head>


    <!-- body things -->
    <body>

        <div class = "wrapperUsers">
            <section class = "users">
                <header>
                    <div class = "content">
                        <img src = "<?php echo "../inc/images/".$_SESSION['mainUserName'].".jpg"; ?>" alt = "">
                        <div class = "details">
                            <?php
                            if($_SESSION['mainUserStatus'] == "Active")
                            {
                                echo "<span>" . $_SESSION['mainUserName'] . "</span>";
                                echo "<p>" . $_SESSION['mainUserStatus'] ."</p>";
                            }
                            elseif($_SESSION['mainUserStatus'] == "Anonymous")
                            {
                                echo "<span>" . $_SESSION['mainUserStatus'] . "</span>";
                            }
                            ?>
                        </div>
                    </div>
                    <a href = "logout.php" class = "logout">Logout</a>
                </header>
                <div class = "search">
                    <span class = "text">Select an user to start chat</span>
                    <input type = "text" placeholder = "Enter name to search...">
                    <button><i class = "fas fa-search"></i></button>
                </div>
                <div class = "users-list">
                <?php
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        if(!($row['username'] == $_SESSION['mainUserName']) && $row['status'] == "Active"){
                            echo '<a href="#" onclick="openChat(\'' . $row['username']. ',' . $row['status'] . "," . $_SESSION['mainUserName'] . '\')">';
                            echo '<div class="content">';
                            echo '<img src="../inc/images/'. $row['username'] .'.jpg" alt="">';
                            echo '<div class="details">';
                            echo '<span>' . $row['username'] . '</span>';
                            echo '<p>' . $row['status'] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="status-dot"><i class="fas fa-circle"></i></div>';
                            echo '</a>';
                        }elseif($row['status'] == "Anonymous")
                        {
                            echo '<a href="#" onclick="openChat(\'' . $row['username']. ',' . $row['status'] . "," . $_SESSION['mainUserName'] . '\')">';
                            echo '<div class="content">';
                            echo '<img src="../inc/images/'. $row['username'] .'.jpg" alt="">';
                            echo '<div class="details">';
                            echo '<span>' . $row['status'] . '</span>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="status-dot"><i class="fas fa-circle"></i></div>';
                            echo '</a>';
                        }
                    }
                ?>
                </div>
            </section>
        </div>
        <div id="chatContent"></div>
        <script src = "../inc/users.js"></script>

    </body>
</html>