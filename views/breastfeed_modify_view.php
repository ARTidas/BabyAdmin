<?php
	
	class BreastfeedModifyView extends AbstractView {
				
		public function displayWeb(array $do_list, BreastFeedDo $do) {
			?>
				<?php $this->getWebHeader(); ?>

                <h2>Select record to modify</h2>
                <form action="" method="post">
                    <label for="id">#ID:</label>
                    <select id="id" name="id">
                        <option value="" <?php if ($do->id === "") {echo("selected");} ?>>--</option>
                        <?php foreach($do_list as $do_record) { ?>
                            <option 
                                value="<?php echo($do_record->id); ?>"
                                <?php if ($do_record->id == $do->id) { echo("selected"); } ?>
                            >
                                #<?php echo($do_record->id); ?> - 
                                <?php echo($do_record->breast); ?> - 
                                <?php echo($do_record->feeding_start); ?> - 
                                <?php echo($do_record->feeding_end); ?> - 
                                <?php echo($do_record->weight_start); ?> - 
                                <?php echo($do_record->weight_end); ?>
                            </option>
                        <?php } ?>
                    </select><br><br>

                    <input type="submit" name="select" value="Select">
				</form>

                <?php if (isset($do->id) && !empty($do->id)) { ?>
                    <form action="" method="post">
                        <label for="is_active">Is active:</label>
                        <select id="is_active" name="is_active">
                            <option value="0" <?php if ($do->is_active == 0) {echo("selected");} ?>>Deleted</option>
                            <option value="1" <?php if ($do->is_active == 1) {echo("selected");} ?>>Active</option>
                        </select><br><br>

                        <label for="breast">Breast:</label>
                        <select id="breast" name="breast">
                            <option value="" <?php if ($do->breast === "") {echo("selected");} ?>>--</option>
                            <option value="left" <?php if ($do->breast === "left") {echo("selected");} ?>>Left</option>
                            <option value="right" <?php if ($do->breast === "right") {echo("selected");} ?>>Right</option>
                        </select><br><br>
                        
                        <label for="feeding_start">Feeding Start:</label>
                        <input type="datetime-local" id="feeding_start" name="feeding_start" value="<?php echo($do->feeding_start); ?>"><br><br>
                        
                        <label for="feeding_end">Feeding End:</label>
                        <input type="datetime-local" id="feeding_end" name="feeding_end" value="<?php echo($do->feeding_end); ?>"><br><br>
                        
                        <label for="weight_start">Weight Start:</label>
                        <input type="number" step="1" id="weight_start" name="weight_start" value="<?php echo($do->weight_start); ?>"><br><br>
                        
                        <label for="weight_end">Weight End:</label>
                        <input type="number" step="1" id="weight_end" name="weight_end" value="<?php echo($do->weight_end); ?>"><br><br>
                        
                        <input type="hidden" name="id" value="<?php echo($do->id); ?>">
                        <input type="submit" name="modify" value="Modify">
				    </form>
                <?php } ?>

				<?php $this->getWebFooter(); ?>
			<?php
		}

	}
?>