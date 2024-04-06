<?php
	
	class TodoListView extends AbstractView {
				
		public function displayWeb(Array $do_list) {
			?>
				<?php $this->getWebHeader(); ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Deadline at</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
				
                    <?php foreach($do_list as $do) { ?>
                        <tr>
                            <td>#<?php echo $do->id; ?></td>
                            <td><?php echo $do->deadline_at; ?></td>
                            <td><?php echo $do->description; ?></td>
                            <td>
                                <?php
                                    if (isset($do->location)) {
                                        echo("<a href=\"https://www.google.com/maps/search/" . $do->location . "\" target=\"_blank\">" . $do->location . "</a>");
                                    }
                                ?>
                            </td>
                            <td><?php echo $do->status; ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
				
				<?php $this->getWebFooter(); ?>
			<?php
		}

	}
?>