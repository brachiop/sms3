<div class="sidebar-menu" style="font-family: system-ui;font-size:14px;">
    <header class="logo-env">
        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="uploads/logo.png" style="max-height:60px;" />
            </a>
        </div>
        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>
    <div style=""></div>
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/dashboard" style='font-weight:550;font-size:14px'>
                <i class="fa fa-desktop"></i>
                <span><?php echo ('Tableau de bord'); ?></span>
            </a>
        </li>
        <!-- NOTICEBOARD -->
        <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/noticeboard" style='font-weight:550;font-size:14px'>
                <i class="fa fa-bullhorn"></i>
                <span><?php echo ('Annonces'); ?></span>
            </a>
        </li>
        <!-- CLASS -->
        <li class="<?php
                    if (
                        $page_name == 'class' ||
                        $page_name == 'section'
                    )
                        echo 'opened active';
                    ?> ">
            <a href="#" style='font-weight:550;font-size:14px'>
                <i class="fa fa-sitemap"></i>
                <span><?php echo ('Niveaux'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'class') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/classes" style='font-weight:550;font-size:14px'>
                        <span><i class="fa fa-chevron-circle-right"></i> <?php echo ('Gestion Niveaux'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'section') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/section" style='font-weight:550;font-size:14px'>
                        <span><i class="fa fa-chevron-circle-right"></i> <?php echo ('Gestion Sections'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- STUDENT -->
        <li class="<?php if (
                        $page_name == 'student_add' ||
                        $page_name == 'student_information' ||
                        $page_name == 'student_marksheet'
                    )
                        echo 'opened active has-sub'; ?> ">
            <a href="#" style='font-weight:550;font-size:14px'>
                <i class="fa fa-group"></i>
                <span><?php echo ('Étudiants'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'student_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/student_add" style='font-weight:550;font-size:14px'>
                        <span><i class="fa fa-chevron-circle-right"></i> <?php echo ('Ajout Étudiant'); ?></span>
                    </a>
                </li>
                <!-- STUDENT INFORMATION -->
                <li class="<?php if ($page_name == 'student_information') echo 'opened active'; ?> ">
                    <a href="#" style='font-weight:550;font-size:14px'>
                        <span><i class="fa fa-chevron-circle-right"></i> <?php echo ('Information Étudiant'); ?></span>
                    </a>
                    <ul>
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row) :
                        ?>
                            <li class="<?php if ($page_name == 'student_information' && $class_id == $row['class_id']) echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>admin/student_information/<?php echo $row['class_id']; ?>">
                                    <span> <?php echo $row['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <!-- STUDENT MARKSHEET -->
                <li class="<?php if ($page_name == 'student_marksheet') echo 'opened active'; ?> ">
                    <a href="#" style='font-weight:550;font-size:14px'>
                        <span><i class="fa fa-chevron-circle-right"></i> <?php echo ('Student Marksheet'); ?></span>
                    </a>
                    <ul>
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row) :
                        ?>
                            <li class="<?php if ($page_name == 'student_marksheet' && $class_id == $row['class_id']) echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>admin/student_marksheet/<?php echo $row['class_id']; ?>">
                                    <span> <?php echo $row['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </li>
        <!-- TEACHER -->
        <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/teacher" style='font-weight:550;font-size:14px'>
                <i class="fa fa-users"></i>
                <span><?php echo ('Enseignants'); ?></span>
            </a>
        </li>

        <!-- EXAMS -->
        <li class="<?php
                    if (
                        $page_name == 'exam' ||
                        $page_name == 'grade' ||
                        $page_name == 'marks'
                    )
                        echo 'opened active';
                    ?> ">
            <a href="#" style='font-weight:550;font-size:14px'>
                <i class="fa fa-puzzle-piece"></i>
                <span><?php echo ('Examens'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/exam" style='font-weight:550;font-size:14px'>
                        <span><i class="fa fa-chevron-circle-right"></i> <?php echo ('Liste Examens '); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'grade') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/grade" style='font-weight:550;font-size:14px'>
                        <span><i class="fa fa-chevron-circle-right"></i> <?php echo ('Gestion Résultat'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'marks') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/marks" style='font-weight:550;font-size:14px'>
                        <span><i class="fa fa-chevron-circle-right"></i> <?php echo ('Gestion Notes'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/manage_profile" style='font-weight:550;font-size:14px'>
                <i class="fa fa-user"></i>
                <span><?php echo ('Profil de compte'); ?></span>
            </a>
        </li>
        <!-- SETTINGS -->
        <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/system_settings" style='font-weight:550;font-size:14px'>
                <i class="fa fa-cogs"></i>
                <span> <?php echo ('Paramètres'); ?></span>
            </a>
        </li>
    </ul>
</div>
