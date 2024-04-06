<?php
	
	class BreastfeedListView extends AbstractView {
				
		public function displayWeb(Array $do_list) {
			?>
				<?php $this->getWebHeader(); ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Breast</th>
                            <th>Feeding Start</th>
                            <th>Feeding End</th>
                            <th>Weight Start</th>
                            <th>Weight End</th>

                            <th>Feeding time</th>
                            <th>Weight gain</th>
                        </tr>
                    </thead>
                    <tbody>
				
                    <?php foreach($do_list as $do) { ?>
                        <tr>
                            <td>#<?php echo $do->id; ?></td>
                            <td><?php echo $do->breast; ?></td>
                            <td><?php echo $do->feeding_start; ?></td>
                            <td><?php echo $do->feeding_end; ?></td>
                            <td><?php echo $do->weight_start; ?></td>
                            <td><?php echo $do->weight_end; ?></td>

                            <td><?php echo($this->calculateFeedingDuration(
                                $do->feeding_start,
                                $do->feeding_end
                            )); ?></td>
                            <td><?php echo($do->weight_end - $do->weight_start); ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
				
				<?php $this->getWebFooter(); ?>
			<?php
		}

        // Function to calculate feeding duration
        private function calculateFeedingDuration($start, $end) {
            return(
                (new DateTime($start))->diff(new DateTime($end))
                    ->format('%I')
            );
        }
	}
?>