<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        <!-- Load CSS -->
        <?= $this->assets->outputCss() ?>
    </head>

    <body style="background-color: rgb(70, 140, 187);">
        <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="/" class="logo">Book'N'Meet</a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <?php if ($this->session->has('auth_id')) { ?>
                                    <li><a href="/" class="active">Home</a></li>
                                    <li class="submenu">
                                            <a href="javascript:;">Drop Down</a>
                                            <ul>
                                                <li><a href="">Profile</a></li>
                                                <li><a href="/reserve">Reserve</a></li>
                                                <li><a href="/reserve/history">History</a></li>
                                                <li><a href="/logout">Logout</a></li>
                                            </ul>
                                        </li>
                                <?php } else { ?>
                                    <li><a href="/" class="active">Home</a></li>
                                    <li><a href="/signup">Register</a></li>
                                    <li><a href="/login">Login</a></li>
                                <?php } ?>
                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            

<div class="container">
    <div class="forms">
            <br><br><br>
            <form action="/reserve/create" method="post">
                <h1 class="form-header">Confirmation</h1>
                
                <fieldset>
                    <label for="roomName1"><strong>Meeting Room:</strong>  <?= $room->name ?></label>
                    <label for="dates1"><strong>Reservation Date:</strong> <?= $dates ?></label>
                    <label for="start_time1"><strong>Start time:</strong> <?= $start_time ?></label>
                    <label for="end_time1"><strong>Finish time:</strong> <?= $end_time ?></label>
                    <label for="price1"><strong>Price:</strong> Rp. <?= $price ?></label>
                </fieldset>
                <input type="text" name="userid" value="<?= $userid ?>" hidden>
                <input type="text" name="roomid" value="<?= $roomid ?>" hidden>
                <input type="date" name="dates" value="<?= $dates ?>" hidden>
                <input type="time" name="start_time" value="<?= $start_time ?>" hidden>
                <input type="time" name="end_time" value="<?= $end_time ?>" hidden>
                <input type="text" name="price" value="<?= $price ?>" hidden>
                <button class="formsbutton" type="submit">Confirm</button>
            </form>
            <br>
    </div>
</div>

        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <p class="copyright">Octavianus Giovanni Yauanatan - 05111740000113 -- PBKK C FP Individu</p>
                    </div>
                </div>
            </div>
        </footer>
         <!-- Load JS -->
         <?= $this->assets->outputJs() ?>
    </body>

</html>
