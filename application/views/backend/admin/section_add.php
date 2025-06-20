<div class="row" style="color:#001911 ;font-family: system-ui;font-size:14px;">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-plus-circled"></i>
					<?php echo ('Add New Section'); ?>
				</div>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url() . 'admin/sections/create/', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
				<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label"><?php echo ('Section Name'); ?></label>
					<div class="col-sm-5">
						<input placeholder="Enter Section Name Here" type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" value="" autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label"><?php echo ('Nick Name'); ?></label>
					<div class="col-sm-5">
						<input placeholder="Enter Nick Name Here" type="text" class="form-control" name="nick_name" value="" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label"><?php echo ('Class'); ?></label>
					<div class="col-sm-5">
						<select name="class_id" class="form-control" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>">
							<option value=""><?php echo ('Select'); ?></option>
							<?php
							$classes = $this->db->get('class')->result_array();
							foreach ($classes as $row) :
							?>
								<option value="<?php echo $row['class_id']; ?>">
									<?php echo $row['name']; ?>
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
						<select name="teacher_id" class="form-control" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>">
							<option value=""><?php echo ('Select'); ?></option>
							<?php
							$teachers = $this->db->get('teacher')->result_array();
							foreach ($teachers as $row) :
							?>
								<option value="<?php echo $row['teacher_id']; ?>">
									<?php echo $row['name']; ?>
								</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-5">
						<button type="submit" class="btn btn-info"><?php echo ('Add Section'); ?></button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
