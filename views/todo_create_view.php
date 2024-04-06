<?php
	
	class TodoCreateView extends AbstractView {
				
		public function displayWeb(TodoDo $do) {
			?>
				<?php $this->getWebHeader(); ?>
				
				<form action="" method="post">
                    <label for="deadline_at">Deadline at:</label>
                    <input type="datetime-local" id="deadline_at" name="deadline_at" value="<?php echo($do->deadline_at); ?>"><br><br>
                    
                    <label for="description">Description:</label>
                    <textarea id="description" name="description"><?php echo($do->description); ?></textarea><br><br>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" value="<?php echo($do->location); ?>"><br><br>

                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="new" <?php if ($do->status === "new") {echo("selected");} ?>>New</option>
                        <option value="done" <?php if ($do->status === "done") {echo("selected");} ?>>Done</option>
                        <option value="blocked" <?php if ($do->status === "blocked") {echo("selected");} ?>>Blocked</option>
                    </select><br><br>
                    
                    <input type="submit" name="create" value="Create">
				</form>
				
				<?php $this->getWebFooter(); ?>
			<?php
		}
	}
?>