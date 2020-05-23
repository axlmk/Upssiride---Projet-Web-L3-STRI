<?php
    require_once 'functions/auth.php';
    require_once 'functions/sql_ride.php';
?>
    <head>
        <link rel="stylesheet" href="style/style.css"/>
    </head>

    <div class='header'>
         <a href="index.php" title="logo">
             <img src="svg/logo.svg" alt="logo" id="logo">
         </a>
         <nav>
            <ul>
                <?php if (is_connected() && $_SESSION['admin']==1): ?>
                    <li><a href="admin.php">Admin</a></li>
                <?php endif ?>
                <li><a href="index.php">New Ride</a></li>
                <li>
                    <a href="my_rides.php" id="notified">
                        My Rides
                        <?php if (is_connected() && check_notification($_SESSION['id'])):?>
                            <img src="svg/notification.svg" alt="notification" class="notification">
                        <?php endif ?>
                    </a>
                </li>
                <li><a href="sponsors.php">Sponsors</a></li>
                <?php if (is_connected()): ?>
                    <li><a href="my_account.php">Account</a></li>
                    <li><a href="scripts/logout.php">Log out</a></li>
                <?php else: ?>
                    <li><a href="connection.php">Log in</a></li>
                    <li><a href="register.php">Sign up</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
    <div class="empty_block">
        &nbsp;
    </div>


    <?php
    include_once 'footer.php';
?>