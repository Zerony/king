<section id="get_all_users" class="container" role="main">
	<?php
		echo $menu;
	?>
	<div class="content-block" role="main">
    	<table class="got_rating_table">
        	<tr>
              <td>User</td>
              <td>Photo</td>
        
            </tr>
                <?php
                if ($allUsers && sizeof($allUsers) > 0) {
                    foreach ($allUsers as $user) {
                        echo "<tr>
                                  <td><a href=\"#\">".$user["name"]."</a></td>
                                  <td></td>
                              </tr>";
                    }
                }
                ?>
    	</table>
    </div>
</section>
