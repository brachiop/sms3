<div class="row" style="color:#001911 ;font-family: system-ui;font-size:14px;">
    <div class="col-md-12">
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-user"></i>
                    <?php echo ('Modifier Profil'); ?>
                </a>
            </li>
        </ul>
        <!------CONTROL TABS END------>
        <div class="tab-content" style="margin-top:0px; margin-bottom:0px;">
            <!----EDITING FORM STARTS---->
            <div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content">
                    <?php
                    foreach ($edit_data as $row) :
                    ?>
                        <?php echo form_open(base_url() . 'index.php?admin/manage_profile/update_profile_info', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ('Nom'); ?></label>
                            <div class="col-sm-5">
                                <input placeholder="Saisir Nom ici" data-validate="required" data-message-required="<?php echo ('*Ce champ est obligatoire'); ?>" type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ('Email'); ?></label>
                            <div class="col-sm-5">
                                <input type="text" placeholder="Saisir Email ici" data-validate="required" data-message-required="<?php echo ('*Ce champ est obligatoire'); ?>" class="form-control" name="email" value="<?php echo $row['email']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo ('Mise à jour Profil'); ?></button>
                            </div>
                        </div>
                        </form>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!----EDITING FORM ENDS-->
        </div>
    </div>
</div>
<!--password-->
<div class="row" style="color:#001911 ;font-family: system-ui;font-size:14px;">
    <div class="col-md-12">
        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-lock"></i>
                    <?php echo ('Modifier Mot de passe'); ?>
                </a>
            </li>
        </ul>
        <!------CONTROL TABS END------->
        <div class="tab-content" style="margin-top:0px; margin-bottom:0px;">
            <!----EDITING FORM STARTS---->
            <div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content padded">
                    <?php
                    foreach ($edit_data as $row) :
                    ?>
                        <?php echo form_open(base_url() . 'index.php?admin/manage_profile/change_password', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ('Mot de passe Actuel'); ?></label>
                            <div class="col-sm-5">
                                <input placeholder="Saisir ancien Mot de passe ici" data-validate="required" data-message-required="<?php echo ('*Ce champ est obligatoire'); ?>" type="password" class="form-control" name="password" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ('Nouveau Mot de passe'); ?></label>
                            <div class="col-sm-5">
                                <input placeholder="Saisir Nouveau Mot de passe ici" data-validate="required" data-message-required="<?php echo ('*Ce champ est obligatoire'); ?>" type="password" class="form-control" name="new_password" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ('Confirmer Nouveau Mot de passe'); ?></label>
                            <div class="col-sm-5">
                                <input placeholder="Re-Saisir Nouveau Mot de passe ici" data-validate="required" data-message-required="<?php echo ('*Ce champ est obligatoire'); ?>" type="password" class="form-control" name="confirm_new_password" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo ('Mise à jour Mot de passe'); ?></button>
                            </div>
                        </div>
                        </form>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!----EDITING FORM ENDS--->
        </div>
    </div>
</div>
