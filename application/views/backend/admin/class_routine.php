<div class="row" style="color:#001911 ;font-family: system-ui;font-size:14px;"">
	<div class=" col-md-12">
    <!------CONTROL TABS START------>
    <ul class="nav nav-tabs bordered">
        <li class="active">
            <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                <?php echo ('Class Routine List'); ?>
            </a>
        </li>
        <li>
            <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                <?php echo ('Add Class Routine'); ?>
            </a>
        </li>
    </ul>
    <!------CONTROL TABS END------>
    <div class="tab-content">
        <!----TABLE LISTING STARTS-->
        <div class="tab-pane active" id="list">
            <div class="panel-group joined" id="accordion-test-2">
                <?php
                $toggle = true;
                $classes = $this->db->get('class')->result_array();
                foreach ($classes as $row) :
                ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php echo $row['class_id']; ?>">
                                    <i class="fa fa-calendar"></i> <?php echo $row['name']; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $row['class_id']; ?>" class="panel-collapse collapse <?php if ($toggle) {
                                                                                                                echo 'in';
                                                                                                                $toggle = false;
                                                                                                            } ?>">
                            <div class="panel-body">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped table-bordered">
                                    <tbody>
                                        <?php
                                        for ($d = 1; $d <= 7; $d++) :
                                            if ($d == 1) $day = 'Monday';
                                            else if ($d == 2) $day = 'Tuesday';
                                            else if ($d == 3) $day = 'Wednesday';
                                            else if ($d == 4) $day = 'Thursday';
                                            else if ($d == 5) $day = 'Friday';
                                            else if ($d == 6) $day = 'Saturday';
                                            else if ($d == 7) $day = 'Sunday';
                                        ?>
                                            <tr class="gradeA" style="font-weight:600; vertical-align:middle;">
                                                <td style="font-weight:600; vertical-align:middle;" width="100"><?php echo strtoupper($day); ?></td>
                                                <td style="font-weight:600; vertical-align:middle;">
                                                    <?php
                                                    $this->db->order_by("time_start", "asc");
                                                    $this->db->where('day', $day);
                                                    $this->db->where('class_id', $row['class_id']);
                                                    $routines    =    $this->db->get('class_routine')->result_array();
                                                    foreach ($routines as $row2) :
                                                    ?>
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="vertical-align:middle;">
                                                                <?php echo $this->crud_model->get_subject_name_by_id($row2['subject_id']); ?>
                                                                <?php echo '(' . $row2['time_start'] . '-' . $row2['time_end'] . ')'; ?>
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_class_routine/<?php echo $row2['class_routine_id']; ?>');">
                                                                        <i class="entypo-pencil"></i>
                                                                        <?php echo ('Edit'); ?>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/class_routine/delete/<?php echo $row2['class_routine_id']; ?>');">
                                                                        <i class="entypo-trash"></i>
                                                                        <?php echo ('Delete'); ?>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
        <!----TABLE LISTING ENDS--->
        <!----CREATION FORM STARTS---->
        <div class="tab-pane box" id="add" style="padding: 5px">
            <div class="box-content">
                <?php echo form_open(base_url() . 'admin/class_routine/create', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Class'); ?></label>
                    <div class="col-sm-5">
                        <select data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" name="class_id" class="form-control" style="width:100%;" onchange="return get_class_subject(this.value)">
                            <option value=""><?php echo ('Select Class'); ?></option>
                            <?php
                            $classes = $this->db->get('class')->result_array();
                            foreach ($classes as $row) :
                            ?>
                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Subject'); ?></label>
                    <div class="col-sm-5">
                        <select data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" name="subject_id" class="form-control" style="width:100%;" id="subject_selection_holder">
                            <option value=""><?php echo ('Select Class First'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Day'); ?></label>
                    <div class="col-sm-5">
                        <select name="day" class="form-control" style="width:100%;" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Start Time'); ?></label>
                    <div class="col-sm-5">
                        <select name="time_start" class="form-control" style="width:100%;" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>">
                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="starting_ampm" class="form-control" style="width:100%">
                            <option value="1">AM</option>
                            <option value="2">PM</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('End Time'); ?></label>
                    <div class="col-sm-5">
                        <select name="time_end" class="form-control" style="width:100%;">
                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="ending_ampm" class="form-control" style="width:100%">
                            <option value="1">AM</option>
                            <option value="2">PM</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo ('Add Class Routine'); ?></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!----CREATION FORM ENDS-->
    </div>
</div>
<script type="text/javascript">
    function get_class_subject(class_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/get_class_subject/' + class_id,
            success: function(response) {
                jQuery('#subject_selection_holder').html(response);
            }
        });
    }
</script>
