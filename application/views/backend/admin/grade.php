<div class="row" style="color:#001911 ;font-family: system-ui;font-size:14px;">
    <div class="col-md-12">
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo ('Grade List'); ?>
                </a>
            </li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo ('Add Grade'); ?>
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
                                <div><?php echo ('Grade Name'); ?></div>
                            </th>
                            <th>
                                <div><?php echo ('Mark From'); ?></div>
                            </th>
                            <th>
                                <div><?php echo ('Mark Upto'); ?></div>
                            </th>
                            <th>
                                <div><?php echo ('Comment'); ?></div>
                            </th>
                            <th>
                                <div><?php echo ('Options'); ?></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        foreach ($grades as $row) : ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['mark_from']; ?></td>
                                <td><?php echo $row['mark_upto']; ?></td>
                                <td><?php echo $row['comment']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                            <!-- EDITING LINK -->
                                            <li>
                                                <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_grade/<?php echo $row['grade_id']; ?>');">
                                                    <i class="entypo-pencil"></i>
                                                    <?php echo ('Edit'); ?>
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <!-- DELETION LINK -->
                                            <li>
                                                <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/grade/delete/<?php echo $row['grade_id']; ?>');">
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
                    <?php echo form_open(base_url() . 'admin/grade/create', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Mark Name'); ?></label>
                        <div class="col-sm-5 controls">
                            <input placeholder="Enter Mark Name Here" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" type="text" class="form-control" name="name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Mark From'); ?></label>
                        <div class="col-sm-5 controls">
                            <input placeholder="Enter Minimum Range Here" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" type="text" class="form-control" name="mark_from" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Mark Upto'); ?></label>
                        <div class="col-sm-5 controls">
                            <input placeholder="Enter Maximum Range Here" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" type="text" class="form-control" name="mark_upto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Comment'); ?></label>
                        <div class="col-sm-5 controls">
                            <input placeholder="Enter Comment Here" data-validate="required" data-message-required="<?php echo ('*This Field is Required'); ?>" type="text" class="form-control" name="comment" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Add Grade'); ?></button>
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
