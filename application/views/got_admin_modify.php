<script>
    $(function () {
        $(".gerb").on("click", function (e) {
            var id = "#" + $(this).attr("id");
            var gerbclass = $(this).attr("class");
            hanleOpacity(id, gerbclass);
//            gerbclass = "." + gerbclass.replace("gerb", "").trim();
//            $(gerbclass).css('opacity', '1');
//            $(gerbclass).not(id).css('opacity', '0.1');
//            $(id).parent().children().not(id).css('opacity', '0.1');
        });
    });

    function hanleOpacity(id, gerbclass) {
        //var id = "#" + $(this).attr("id");
        //var gerbclass = $(this).attr("class");
        gerbclass = "." + gerbclass.replace("gerb", "").trim();
        $(gerbclass).css('opacity', '1');
        $(gerbclass).not(id).css('opacity', '0.1');
        $(id).parent().children().not(id).css('opacity', '0.1');
    }


    $(function () {
        $("#got_new_game_form").on("submit", function (e) {
            var haserrors = false;
            $(".gerb").not("img[style$='0.1;']").each(function (index) {
                var id = $(this).attr("id");
                var family = id.substr(0, id.length - 1);
                var number = id.replace(family, "");
                $('[name=family' + number + ']').val(family);
            });

            $(".user_select").each(function (index) {
                if (haserrors) {
                    return;
                }
                if (!$(this).val()) {
                    haserrors = true;

                    alert('Fill all users');
                    return;
                }
            });

            $(".family").each(function (index) {
                if (haserrors) {
                    return;
                }
                if (!$(this).val()) {
                    haserrors = true;

                    alert('Fill all familys!');
                    return;
                }
            });

            $(".totalpoints").each(function (index) {
                if (haserrors) {
                    return;
                }
                if (!$(this).val()) {
                    haserrors = true;

                    alert('Fill all points!');
                    return;
                }
            });


            $(".place").each(function (index) {
                if (haserrors) {
                    return;
                }
                if (!$(this).val()) {
                    haserrors = true;

                    alert('Fill all places!');
                    return;
                } else {
                    placevalues.add($(this).val());
                }
            });

            if (!$("#gameId").val()) {
                haserrors = true;
                alert('Name is required!');
            }
            placevalues.sort()
            for (var i = 0; i < 6; i++) {
                if (placevalues[i] != 1) {
                    haserrors = true;
                    break;
                }
            }

            return !haserrors;
        });
    });

</script>
<section id="got_rating_section" class="container">
    <?php
        echo $menu;
    ?>
    <div class="content-block" role="main">
        <?
        if (isset($gameid)) {
            echo "<h1>Редагування гри номер $gameid</h1>";
        }
        ?>
        <form id="got_new_game_form" action="<?php echo $action; ?>" class="form-horizontal" method="post">
            <table class="table">
                <tr>
                    <td>User</td>
                    <td>Family</td>
                    <td>Points</td>
                    <td>Place</td>
                </tr>
                <?php

                for ($i = 0; $i < TOTAL_GOT_USERS; $i++) {
                    echo "
		<tr>
			<td>
				<input type=\"text\" name=\"user$i\" id=\"user$i\" class=\"user_select\"/>
			</td>
			<td width=\"200\">
				<img src=\"/images/gerb/$familys[0].png\" class=\"gerb $familys[0]\" id=\"$familys[0]$i\"/>
				<img src=\"/images/gerb/$familys[1].png\" class=\"gerb $familys[1]\" id=\"$familys[1]$i\"/>
				<img src=\"/images/gerb/$familys[2].png\" class=\"gerb $familys[2]\" id=\"$familys[2]$i\"/>
				<img src=\"/images/gerb/$familys[3].png\" class=\"gerb $familys[3]\" id=\"$familys[3]$i\"/>
				<img src=\"/images/gerb/$familys[4].png\" class=\"gerb $familys[4]\" id=\"$familys[4]$i\"/>
				<img src=\"/images/gerb/$familys[5].png\" class=\"gerb $familys[5]\" id=\"$familys[5]$i\"/>
				<input type=\"hidden\" name=\"family$i\" value=\"\" class=\"family\" id=\"family$i\"/>
			</td>
			<td><input type=\"number\" name=\"totalpoints$i\" class=\"totalpoints\" id=\"totalpoints$i\"></td>
			<td><input type=\"number\" name=\"place$i\" class=\"place\"></td>
		</tr>";
                }


                ?>

                <script type="text/javascript">
                    $(document).ready(function () {
                        var isEditMode = <?php echo (isset($game_id)?"true":"false"); ?>;
                        if (!isEditMode) {
                            $(".user_select").tokenInput(
                                "/Gotadmin/searchuser"
                            );
                        } else {
                            var data = JSON.parse('<?php if(isset($game_id)) echo json_encode($gamedata);?>');

                            var i = 0;

                            for (item of
                            data
                        )
                            {
                                var user = "#user" + i;
                                $(user).tokenInput(
                                    "/Gotadmin/searchuser", {
                                        prePopulate: [
                                            {id: item.userid, name: item.username}
                                        ]
                                    }
                                );
                                console.log($(user));

                                var totalpoints = "#totalpoints" + i;
                                $(totalpoints).val(item.totalpoints);

                                var family = "#family" + i;
                                $(family).val(item.family);

                                var place = "[name='place" + i + "']";
                                $(place).val(item.place);
                                var familyId = "#" + item.family + i;

                                hanleOpacity(familyId, $(familyId).attr("class"));

                                i++;
                            }
                            $("#gameName").val(data[0].name);
                            $("#date").val(data[0].createddate.substr(0, 10));
                            $("#description").val(data[0].description);

                        }
                    });
                </script>

            </table>
            <div class="control-group">
                <label class="control-label" for="input">Name:</label>

                <div class="controls">
                    <input id="gameName" name="name" class="input-xlarge" type="text">

                    <p class="help-block">Назва гри</p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="date">Date:</label>

                <div class="controls">
                    <input type="date" name="date" id="date" class="input-xlarge"/>

                    <p class="help-block">Дата проведення гри</p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="description">Description:</label>

                <div class="controls">
                    <textarea rows="10" cols="45" name="description" id="description" class="input-xlarge"></textarea>

                    <p class="help-block">Опис гри</p>
                </div>
            </div>
            <div class="form-actions">
                <input id="gameId" name="game_id" value="<?php echo $game_id; ?>" type="hidden">
                <input type="submit" value="Save" class="btn btn-alt btn-large btn-primary" style="margin: 0px auto;"/>
            </div>
        </form>
    </div>
</section>



