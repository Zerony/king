
<section class="container" role="main" id="got_all_games">
    <?php
        echo $menu;
    ?>
    <div class="content-block" role="main">
        <table class="table">
            <tr>
                <td>Game name</td>
                <td>Date</td>
                <td>Winner</td>
                <td>Win Family</td>

            </tr>
            <?php
            if ($games && sizeof($games) > 0) {
                foreach ($games as $game) {
                    $game->createddate = substr($game->createddate, 0, 10);//.substring(0, 10);
                    echo "<tr>
                                                                          <td><a href='/gotadmin/editgame/$game->id'>$game->name</a></td>
                                                                          <td><b>$game->createddate</b></td>
                                                                          <td>$game->username</td>
                                                                          <td><img src=\"/images/gerb/$game->family.png\" class=\"gerb\"/></td>

                                                                      </tr>";
                }
            }
            ?>
        </table>
    </div>
</section>