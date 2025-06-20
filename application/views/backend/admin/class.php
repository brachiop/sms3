<div class="row" style="color:#001911 ;font-family: system-ui;font-size:14px;">
    <div class="col-md-12">
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo ('Class List'); ?>
                </a>
            </li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo ('Add Class'); ?>
                </a>
            </li>
        </ul>
        <!------CONTROL TABS END------>
        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table class="table table-bordered table-hover table-striped datatable" id="table_export">
                    <thead>
                        <tr>
                            <th>
                                <div>#</div>
                            </th>
                            <th>
                                <div><?php echo ('Class name'); ?></div>
                            </th>
                            <th>
                                <div><?php echo ('Numeric Name'); ?></div>
                            </th>
                            <th>
                                <div><?php echo ('Class Teacher'); ?></div>
                            </th>
                            <th>
                                <div><?php echo ('Options'); ?></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        foreach ($classes as $row) : ?>
                            <tr>
                                <td style="vertical-align:middle;"><?php echo $count++; ?></td>
                                <td style="vertical-align:middle;"><?php echo $row['name']; ?></td>
                                <td style="vertical-align:middle;"><?php echo $row['name_numeric']; ?></td>
                                <td style="vertical-align:middle;"><?php echo $this->crud_model->get_type_name_by_id('teacher', $row['teacher_id']); ?></td>
                                <td style="vertical-align:middle;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                            <!-- EDITING LINK -->
                                            <li>
                                                <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_class/<?php echo $row['class_id']; ?>');">
                                                    <i class="entypo-pencil"></i>
                                                    <?php echo ('Edit'); ?>
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <!-- DELETION LINK -->
                                            <li>
                                                <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/classes/delete/<?php echo $row['class_id']; ?>');">
                                                    <i class="entypo-trash"></i>
                                                    <?php echo ('Delete'); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->
            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'admin/classes/create', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ('Class Name'); ?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="Enter Class Name Here" name="name" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ('Numeric Name'); ?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="Enter Numeric Name Here" name="name_numeric" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ('Class Teacher'); ?></label>
                            <div class="col-sm-5">
                                <select name="teacher_id" class="form-control" style="width:100%;">
                                    <?php
                                    $teachers = $this->db->get('teacher')->result_array();
                                    foreach ($teachers as $row) :
                                    ?>
                                        <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Add Class'); ?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
        </div>
    </div>
</div>
<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var datatable = $("#table_export").dataTable();
        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>
