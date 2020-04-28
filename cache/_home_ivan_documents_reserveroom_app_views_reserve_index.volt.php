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
            <form action="/reserve/confirm" method="post">
                <h1 class="form-header">Reservation</h1>
                
                <fieldset>
                    <label for="room">Choose a meeting room:</label>
                    <select id="room" name="room">
                        <?php foreach ($rooms as $room) { ?>
                            <option value='<?= $room->id ?>'><?= $room->name ?></option>
                        <?php } ?>
                    </select>

                    <label for="reserveDate">Choose reservation date:</label>
                    <input type="date" id="reserveDate" name="reserveDate"
                        value="<?= date('Y-m-d', time()) ?>""
                        min="2020-01-01" max="2030-12-31" required>

                    <label for="start_time">Choose starting time:</label>
                    <input type="time" id="start_time" name="start_time"
                        value="<?= date('H:i', time()) ?>"
                        min="07:00" max="20:00" required>

                    <label for="end_time">Choose finish time:</label>
                    <input type="time" id="end_time" name="end_time"
                        value="<?= date('H:i', time() + 3600) ?>"
                        min="08:00" max="21:00" required>
                </fieldset>
                <button class="formsbutton" type="submit">Submit</button>
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
