<section id="get_all_users">
<div class="container" style="margin-bottom:3%;">
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
