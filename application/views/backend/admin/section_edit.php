<?php
$edit_data = $this->db->get_where('section', array(
	'section_id' => $param2
))->result_array();
foreach ($edit_data as $row) :
?>
	<div class="row" style="color:#001911 ;font-family: system-ui;font-size:14px;">
		<div class="col-md-12">
			<div class="panel panel-primary" data-collapsed="0">
				<div class="panel-heading">
					<div class="panel-title">
						<i class="entypo-plus-circled"></i>
						<?php echo ('Edit Section'); ?>
					</div>
				</div>
				<div class="panel-body">
					<?php echo form_open(base_url() . 'admin/sections/edit/' . $row['section_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Section Name'); ?></label>
						<div class="col-sm-5">
							<input type="text" placeholder="Enter Section Name Here" class="form-control" name="name" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" value="<?php echo $row['name']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Nick Name'); ?></label>
						<div class="col-sm-5">
							<input placeholder="Enter Nick Name Here" type="text" class="form-control" name="nick_name" value="<?php echo $row['nick_name']; ?>" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Class'); ?></label>
						<div class="col-sm-5">
							<select name="class_id" class="form-control" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>">
								<option value=""><?php echo ('Select'); ?></option>
								<?php
								$classes = $this->db->get('class')->result_array();
								foreach ($classes as $row2) :
								?>
									<option value="<?php echo $row2['class_id']; ?>" <?php if ($row['class_id'] == $row2['class_id'])
																																			echo 'selected'; ?>>
										<?php echo $row2['name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Class Teacher'); ?></label>
						<div class="col-sm-5">
							<select name="teacher_id" class="form-control">
								<option value=""><?php echo ('Select'); ?></option>
								<?php
								$teachers = $this->db->get('teacher')->result_array();
								foreach ($teachers as $row3) :
								?>
									<option value="<?php echo $row3['teacher_id']; ?>" <?php if ($row['teacher_id'] == $row3['teacher_id'])
																																				echo 'selected'; ?>>
										<?php echo $row3['name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo ('Update Now'); ?></button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
