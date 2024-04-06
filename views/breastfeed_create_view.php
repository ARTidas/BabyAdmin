<?php
	
	class BreastfeedCreateView extends AbstractView {
				
		public function displayWeb(BreastfeedDo $do) {
			?>
				<?php $this->getWebHeader(); ?>
				
				<form action="" method="post">
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
                    
                    <input type="submit" name="create" value="Create">
				</form>
				
				<?php $this->getWebFooter(); ?>
			<?php
		}
	}
?>