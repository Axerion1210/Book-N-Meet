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
            

<br><br><br><br>
<?php if (($books->count() > 0)) { ?>
<!-- <div class="welcome-area" id="welcome"> -->
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
            <tr>
                <th>Room Name</th>
                <th>Room Location</th>
                <th>Reserve Date</th>
                <th>Start Time</th>
                <th>Finish Time</th>
                <th>Price</th>
                <th colspan="3"></th>
            </tr>
            </thead>
            
            <tbody class="table-secondary">
            <?php foreach ($books as $data) { ?>
                <?php foreach ($rooms as $room) { ?>
                    <?php if ($room->id == $data->RoomID && $userid == $data->userID) { ?>
                        <tr>
                            <td><?= $room->name ?></td>
                            <td><?= $room->location ?></td>
                            <td><?= $data->reserveDate ?></td>
                            <td><?= date('H:i', strtotime($data->start_time)) ?></td>
                            <td><?= date('H:i', strtotime($data->end_time)) ?></td>
                            <td>Rp.<?= $data->price ?></td>
                            <?php if (!$data->paid) { ?>
                            <td>
                                <form action="/reserve/update" method="post">
                                    <input type="text" name="id" value="<?= $data->id ?>" hidden>
                                    <button class="updatebutton" type="submit">Update</button>
                                </form>
                            </td>
                            <td>
                                <form action="/reserve/delete" method="post">
                                    <input type="text" name="id" value="<?= $data->id ?>" hidden>
                                    <button class="deletebutton" type="submit">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="/reserve/payment" method="post">
                                    <input type="text" name="id" value="<?= $data->id ?>" hidden>
                                    <button class="updatebutton" type="submit">Payment</button>
                                </form>
                            </td>
                            <?php } else { ?>
                            <td>
                                <button class="offbutton" type="submit" disabled>Update</button>
                            </td>
                            <td>
                                <button class="offbutton" type="submit" disabled>Delete</button>
                            </td>
                            <td>
                                <button class="offbutton" type="submit" disabled>Completed</button>
                            </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
        <br>
    </div>
<!-- </div> -->
<?php } else { ?>

<?php } ?>

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
