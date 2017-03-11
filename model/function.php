<?php

// Create a new student.
function create_student() {
    global $wpdb;

    // Create Wp User role=student.
    if (username_exists($_POST['username']) == null && email_exists($_POST['email']) == false) {
        $user_id = wp_create_user($_POST['username'], $_POST['password'], $_POST['email']);
        $user = get_user_by('id', $user_id);
        $user->remove_role('subscriber');
        $user->add_role('student');

        // Mailing the created user.
        $email_address = $_POST['email'];
        $email_subject = 'New account created!';
        $email_body = 'Login to your account here ' . admin_url() . 'admin.php?page=ekattor';
        $email_body .='Username : ' . $_POST['username'];
        $email_body .='Password : ' . $_POST['password'];

        wp_mail($email_address, $email_subject, $email_body);

        // Adding to student table.
        $data['ID'] = $user_id;
        $data['name'] = $_POST['name'];
        $data['class_id'] = $_POST['class_id'];
        $data['roll'] = $_POST['roll'];
        $data['birthday'] = strtotime($_POST['birthday']);
        $data['sex'] = $_POST['sex'];
        $data['address'] = $_POST['address'];
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];
        $data['password'] = sha1($_POST['password']);
        $data['username'] = $_POST['username'];

        $wpdb->insert($wpdb->prefix . 'ekattor_student', $data);
        $student_id = $wpdb->insert_id;

        $upload_dir = wp_upload_dir();
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir['basedir'] . '/ekattor/student_image/' . $student_id . '.jpg');

        return 'success';
    } else {
        return 'fail';
    }
}

// Get students of certain class.
function get_students($class_id = '') {
    global $wpdb;
    $school_student = $wpdb->prefix . 'ekattor_student';
    $query_result = $wpdb->get_results("SELECT * FROM $school_student WHERE class_id = '$class_id' ", ARRAY_A);
    return $query_result;
}

// Get all students.
function get_all_students() {
    global $wpdb;
    $school_student = $wpdb->prefix . 'ekattor_student';
    $query_result = $wpdb->get_results("SELECT * FROM $school_student", ARRAY_A);
    return $query_result;
}

// Get student information of certain student.
function get_student_info($student_id = '') {
    global $wpdb;
    $school_student = $wpdb->prefix . 'ekattor_student';
    $query_result = $wpdb->get_results("SELECT * FROM $school_student WHERE student_id = '$student_id' ", ARRAY_A);
    return $query_result;
}

// Get student name from student id.
function get_student_name_from_id($student_id = '') {
    global $wpdb;
    $school_student = $wpdb->prefix . 'ekattor_student';
    $query_result = $wpdb->get_results("SELECT * FROM $school_student WHERE student_id = '$student_id' ", ARRAY_A);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

// Edit student information.
function edit_student($student_id = '') {
    global $wpdb;
    $data['name'] = $_POST['name'];
    $data['class_id'] = $_POST['class_id'];
    $data['roll'] = $_POST['roll'];
    $data['birthday'] = strtotime($_POST['birthday']);
    $data['sex'] = $_POST['sex'];
    $data['address'] = $_POST['address'];
    $data['phone'] = $_POST['phone'];
    $data['email'] = $_POST['email'];

    $wpdb->update($wpdb->prefix . 'ekattor_student', $data, array('student_id' => $student_id));

    $upload_dir = wp_upload_dir();
    move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir['basedir'] . '/ekattor/student_image/' . $student_id . '.jpg');
}

// Delete a student.
function delete_student($student_id = '') {
    $upload_dir = wp_upload_dir();
    unlink($upload_dir['basedir'] . '/ekattor/student_image/' . $student_id . '.jpg');
    global $wpdb;
    $wpdb->delete($wpdb->prefix . 'ekattor_student', array('student_id' => $student_id));
}

// Create new teacher.
function create_teacher() {
    global $wpdb;

    // Create Wp User role=teacher.
    if (username_exists($_POST['username']) == null && email_exists($_POST['email']) == false) {
        $user_id = wp_create_user($_POST['username'], $_POST['password'], $_POST['email']);
        $user = get_user_by('id', $user_id);
        $user->remove_role('subscriber');
        $user->add_role('teacher');

        // Mailing the created user.
        $email_address = $_POST['email'];
        $email_subject = 'New account created!';
        $email_body = 'Login to your account here ' . admin_url() . 'admin.php?page=ekattor';
        $email_body .='Username : ' . $_POST['username'];
        $email_body .='Password : ' . $_POST['password'];

        wp_mail($email_address, $email_subject, $email_body);

        // Adding to teacher table.
        $data['ID'] = $user_id;
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['password'] = sha1($_POST['password']);
        $data['address'] = $_POST['address'];
        $data['phone'] = $_POST['phone'];
        $data['birthday'] = strtotime($_POST['birthday']);
        $data['sex'] = $_POST['sex'];
        $data['username'] = $_POST['username'];

        $wpdb->insert($wpdb->prefix . 'ekattor_teacher', $data);
        $teacher_id = $wpdb->insert_id;

        $upload_dir = wp_upload_dir();
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir['basedir'] . '/ekattor/teacher_image/' . $teacher_id . '.jpg');

        return 'success';
    } else {
        return 'fail';
    }
}

// Get all teachers.
function get_teachers() {
    global $wpdb;
    $school_teacher = $wpdb->prefix . 'ekattor_teacher';
    $query_result = $wpdb->get_results("SELECT * FROM $school_teacher", ARRAY_A);
    return $query_result;
}

// Get information of certain teacher.
function get_teacher_info($teacher_id = '') {
    global $wpdb;
    $school_teacher = $wpdb->prefix . 'ekattor_teacher';
    $query_result = $wpdb->get_results("SELECT * FROM $school_teacher WHERE teacher_id = '$teacher_id' ", ARRAY_A);
    return $query_result;
}

// Get teacher name from teacher id.
function get_teacher_name_from_id($teacher_id = '') {
    global $wpdb;
    $school_teacher = $wpdb->prefix . 'ekattor_teacher';
    $query_result = $wpdb->get_results("SELECT * FROM $school_teacher WHERE teacher_id = '$teacher_id' ", ARRAY_A);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

// Edit teacher information.
function edit_teacher($teacher_id = '') {
    global $wpdb;
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['address'] = $_POST['address'];
    $data['phone'] = $_POST['phone'];
    $data['birthday'] = strtotime($_POST['birthday']);
    $data['sex'] = $_POST['sex'];

    $wpdb->update($wpdb->prefix . 'ekattor_teacher', $data, array('teacher_id' => $teacher_id));

    $upload_dir = wp_upload_dir();
    move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir['basedir'] . '/ekattor/teacher_image/' . $teacher_id . '.jpg');
}

// Delete a teacher.
function delete_teacher($teacher_id = '') {
    global $wpdb;
    $wpdb->delete($wpdb->prefix . 'ekattor_teacher', array('teacher_id' => $teacher_id));
}

// Create a new parent.
function create_parent() {
    global $wpdb;

    // Create Wp User role=parent.
    if (username_exists($_POST['username']) == null && email_exists($_POST['email']) == false) {
        $user_id = wp_create_user($_POST['username'], $_POST['password'], $_POST['email']);
        $user = get_user_by('id', $user_id);
        $user->remove_role('subscriber');
        $user->add_role('parent');

        // Mailing the created user.
        $email_address = $_POST['email'];
        $email_subject = 'New account created!';
        $email_body = 'Login to your account here ' . admin_url() . 'admin.php?page=ekattor';
        $email_body .='Username : ' . $_POST['username'];
        $email_body .='Password : ' . $_POST['password'];

        wp_mail($email_address, $email_subject, $email_body);

        // Adding to parent table.
        $data['ID'] = $user_id;
        $data['student_id'] = $_POST['student_id'];
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['password'] = sha1($_POST['password']);
        $data['relation_with_student'] = $_POST['relation_with_student'];
        $data['profession'] = $_POST['profession'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];
        $data['username'] = $_POST['username'];

        $wpdb->insert($wpdb->prefix . 'ekattor_parent', $data);

        return 'success';
    } else {
        return 'fail';
    }
}

// Get parent information of certain student.
function get_parent_info_of_student($student_id = '') {
    global $wpdb;
    $school_parent = $wpdb->prefix . 'ekattor_parent';
    $query_result = $wpdb->get_results("SELECT * FROM $school_parent WHERE student_id = '$student_id' ", ARRAY_A);

    foreach ($query_result as $row) {
        return $row;
    }
}

// Get information of certain parent.
function get_parent_info($parent_id = '') {
    global $wpdb;
    $school_parent = $wpdb->prefix . 'ekattor_parent';
    $query_result = $wpdb->get_results("SELECT * FROM $school_parent WHERE parent_id = '$parent_id' ", ARRAY_A);
    return $query_result;
}

// Get all parents.
function get_parents() {
    global $wpdb;
    $school_parent = $wpdb->prefix . 'ekattor_parent';
    $query_result = $wpdb->get_results("SELECT * FROM $school_parent ", ARRAY_A);
    return $query_result;
}

// Edit parent information.
function edit_parent($parent_id = '') {
    global $wpdb;
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['relation_with_student'] = $_POST['relation_with_student'];
    $data['profession'] = $_POST['profession'];
    $data['phone'] = $_POST['phone'];
    $data['address'] = $_POST['address'];

    $wpdb->update($wpdb->prefix . 'ekattor_parent', $data, array('parent_id' => $parent_id));
}

// Delete a parent.
function delete_parent($parent_id = '') {
    global $wpdb;
    $wpdb->delete($wpdb->prefix . 'ekattor_parent', array('parent_id' => $parent_id));
}

// Create new class.
function create_class() {
    global $wpdb;

    if ($_POST['name'] != "") {

        $data['name'] = $_POST['name'];
        $data['name_numeric'] = $_POST['name_numeric'];
        $data['teacher_id'] = $_POST['teacher_id'];

        $wpdb->insert($wpdb->prefix . 'ekattor_class', $data);
    }
}

// Get all classes.
function get_classes() {
    global $wpdb;
    $school_class = $wpdb->prefix . 'ekattor_class';
    $query_result = $wpdb->get_results("SELECT * FROM $school_class ", ARRAY_A);
    return $query_result;
}

// Get information of certain class.
function get_class_info($class_id = '') {
    global $wpdb;
    $school_class = $wpdb->prefix . 'ekattor_class';
    $query_result = $wpdb->get_results("SELECT * FROM $school_class WHERE class_id = '$class_id' ", ARRAY_A);
    return $query_result;
}

// Get class name from class id.
function get_class_name_from_id($class_id = '') {
    global $wpdb;
    $school_class = $wpdb->prefix . 'ekattor_class';
    $query_result = $wpdb->get_results("SELECT * FROM $school_class WHERE class_id = '$class_id' ", ARRAY_A);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

// Get class information of logged in student.
function get_classes_of_loggedin_student() {
    global $wpdb;
    $school_class = $wpdb->prefix . 'ekattor_class';
    $school_student = $wpdb->prefix . 'ekattor_student';
    global $current_user;
    get_currentuserinfo();
    $current_user_name = $current_user->user_login;

    $query_result = $wpdb->get_results("SELECT * FROM $school_student WHERE username = '$current_user_name' ", ARRAY_A);

    foreach ($query_result as $row) {
        $current_user_class_id = $row['class_id'];
    }

    $query_result = $wpdb->get_results("SELECT * FROM $school_class WHERE class_id = '$current_user_class_id' ", ARRAY_A);
    return $query_result;
}

// Get class information of student of logged in parent.
function get_classes_of_student_of_loggedin_parent() {
    global $wpdb;
    $school_class = $wpdb->prefix . 'ekattor_class';
    $school_student = $wpdb->prefix . 'ekattor_student';
    $school_parent = $wpdb->prefix . 'ekattor_parent';
    global $current_user;
    get_currentuserinfo();
    $current_user_name = $current_user->user_login;

    $query_result = $wpdb->get_results("SELECT * FROM $school_parent WHERE username = '$current_user_name' ", ARRAY_A);

    foreach ($query_result as $row) {
        $student_id = $row['student_id'];
    }

    $query_result = $wpdb->get_results("SELECT * FROM $school_student WHERE student_id = '$student_id' ", ARRAY_A);

    foreach ($query_result as $row) {
        $current_user_class_id = $row['class_id'];
    }

    $query_result = $wpdb->get_results("SELECT * FROM $school_class WHERE class_id = '$current_user_class_id' ", ARRAY_A);
    return $query_result;
}

// Edit class information.
function edit_class($class_id = '') {
    global $wpdb;
    $data['name'] = $_POST['name'];
    $data['name_numeric'] = $_POST['name_numeric'];
    $data['teacher_id'] = $_POST['teacher_id'];

    $wpdb->update($wpdb->prefix . 'ekattor_class', $data, array('class_id' => $class_id));
}

// Delete a class.
function delete_class($class_id = '') {
    global $wpdb;
    $school_class = $wpdb->prefix . 'ekattor_class';
    $wpdb->delete($wpdb->prefix . 'ekattor_class', array('class_id' => $class_id));
}

// Create new subject.
function create_subject() {
    global $wpdb;

    if ($_POST['name'] != "") {

        $data['name'] = $_POST['name'];
        $data['class_id'] = $_POST['class_id'];
        $data['teacher_id'] = $_POST['teacher_id'];

        $wpdb->insert($wpdb->prefix . 'ekattor_subject', $data);
    }
}

// Get all subjects.
function get_subjects() {
    global $wpdb;
    $school_subject = $wpdb->prefix . 'ekattor_subject';
    $query_result = $wpdb->get_results("SELECT * FROM $school_subject", ARRAY_A);
    return $query_result;
}

// Get subjects of certain class.
function get_subjects_by_class($class_id = '') {
    global $wpdb;
    $school_subject = $wpdb->prefix . 'ekattor_subject';
    $query_result = $wpdb->get_results("SELECT * FROM $school_subject WHERE class_id = '$class_id' ", ARRAY_A);
    return $query_result;
}

// Get information of certain subject.
function get_subject_info($subject_id = '') {
    global $wpdb;
    $school_subject = $wpdb->prefix . 'ekattor_subject';
    $query_result = $wpdb->get_results("SELECT * FROM $school_subject WHERE subject_id = '$subject_id' ", ARRAY_A);
    return $query_result;
}

// Get subjects of logged in student.
function get_subjects_of_loggedin_student() {
    global $wpdb;
    $school_subject = $wpdb->prefix . 'ekattor_subject';
    $school_student = $wpdb->prefix . 'ekattor_student';
    global $current_user;
    get_currentuserinfo();
    $current_user_name = $current_user->user_login;

    $query_result = $wpdb->get_results("SELECT * FROM $school_student WHERE username = '$current_user_name' ", ARRAY_A);

    foreach ($query_result as $row) {
        $current_user_class_id = $row['class_id'];
    }

    $query_result = $wpdb->get_results("SELECT * FROM $school_subject WHERE class_id = '$current_user_class_id' ", ARRAY_A);
    return $query_result;
}

// Get subject information of student of logged in parent.
function get_subjects_of_student_of_loggedin_parent() {
    global $wpdb;
    $school_subject = $wpdb->prefix . 'ekattor_subject';
    $school_parent = $wpdb->prefix . 'ekattor_parent';
    $school_student = $wpdb->prefix . 'ekattor_student';
    global $current_user;
    get_currentuserinfo();
    $current_user_name = $current_user->user_login;

    $query_result = $wpdb->get_results("SELECT * FROM $school_parent WHERE username = '$current_user_name' ", ARRAY_A);

    foreach ($query_result as $row) {
        $student_id = $row['student_id'];
    }

    $query_result = $wpdb->get_results("SELECT * FROM $school_student WHERE student_id = '$student_id' ", ARRAY_A);

    foreach ($query_result as $row) {
        $current_user_class_id = $row['class_id'];
    }

    $query_result = $wpdb->get_results("SELECT * FROM $school_subject WHERE class_id = '$current_user_class_id' ", ARRAY_A);
    return $query_result;
}










// Create new notice.
function create_noticeboard() {
    global $wpdb;

    if ($_POST['notice_title'] != "") {

        $data['notice_title'] = $_POST['notice_title'];
        $data['notice'] = $_POST['notice'];
        $data['create_timestamp'] = strtotime($_POST['create_timestamp']);
        $data['end_timestamp'] = strtotime($_POST['end_timestamp']);

        $wpdb->insert($wpdb->prefix . 'ekattor_noticeboard', $data);
    }
}

// Get all notices.
function get_noticeboards() {
    global $wpdb;
    $school_noticeboard = $wpdb->prefix . 'ekattor_noticeboard';
    $query_result = $wpdb->get_results("SELECT * FROM $school_noticeboard ", ARRAY_A);
    return $query_result;
}

// Get information of certain notice.
function get_noticeboard_info($notice_id = '') {
    global $wpdb;
    $school_noticeboard = $wpdb->prefix . 'ekattor_noticeboard';
    $query_result = $wpdb->get_results("SELECT * FROM $school_noticeboard WHERE notice_id = '$notice_id' ", ARRAY_A);
    return $query_result;
}

// Edit notice information.
function edit_noticeboard($notice_id = '') {
    global $wpdb;
    $data['notice_title'] = $_POST['notice_title'];
    $data['notice'] = $_POST['notice'];
    $data['create_timestamp'] = strtotime($_POST['create_timestamp']);
    $data['end_timestamp'] = strtotime($_POST['end_timestamp']);

    $wpdb->update($wpdb->prefix . 'ekattor_noticeboard', $data, array('notice_id' => $notice_id));
}

// Delete a notice.
function delete_noticeboard($notice_id = '') {
    global $wpdb;
    $wpdb->delete($wpdb->prefix . 'ekattor_noticeboard', array('notice_id' => $notice_id));
}

// Get all class routines.
function get_class_routines($class_id, $day) {
    global $wpdb;
    $school_class_routine = $wpdb->prefix . 'ekattor_class_routine';
    $query_result = $wpdb->get_results("SELECT * FROM $school_class_routine WHERE class_id = '$class_id' AND day = '$day' ORDER BY hour_start ASC ", ARRAY_A);
    return $query_result;
}

// Get infortain of certain class routine.
function get_class_routine_info($class_routine_id = '') {
    global $wpdb;
    $school_class_routine = $wpdb->prefix . 'ekattor_class_routine';
    $query_result = $wpdb->get_results("SELECT * FROM $school_class_routine WHERE class_routine_id = '$class_routine_id' ", ARRAY_A);
    return $query_result;
}

// Create new class routine.
function create_class_routine() {
    global $wpdb;
    $data['class_id'] = $_POST['class_id'];
    $data['subject_id'] = $_POST['subject_id'];
    $data['hour_start'] = $_POST['hour_start'];
    $data['hour_end'] = $_POST['hour_end'];
    $data['minute_start'] = $_POST['minute_start'];
    $data['minute_end'] = $_POST['minute_end'];
    $data['day'] = $_POST['day'];

    $wpdb->insert($wpdb->prefix . 'ekattor_class_routine', $data);
}

// Edit class routine information.
function edit_class_routine($class_routine_id = '') {
    global $wpdb;
    $data['class_id'] = $_POST['class_id'];
    $data['subject_id'] = $_POST['subject_id'];
    $data['hour_start'] = $_POST['hour_start'];
    $data['hour_end'] = $_POST['hour_end'];
    $data['minute_start'] = $_POST['minute_start'];
    $data['minute_end'] = $_POST['minute_end'];
    $data['day'] = $_POST['day'];

    $wpdb->update($wpdb->prefix . 'ekattor_class_routine', $data, array('class_routine_id' => $class_routine_id));
}

// Delete a class routine.
function delete_class_routine($class_routine_id = '') {
    global $wpdb;
    $wpdb->delete($wpdb->prefix . 'ekattor_class_routine', array('class_routine_id' => $class_routine_id));
}

// Create new exam.
function create_exam() {
    global $wpdb;

    if ($_POST['name'] != "") {

        $data['name'] = $_POST['name'];
        $data['date'] = strtotime($_POST['date']);
        $data['comment'] = $_POST['comment'];

        $wpdb->insert($wpdb->prefix . 'ekattor_exam', $data);
    }
}

// Get all exams.
function get_exams() {
    global $wpdb;
    $school_exam = $wpdb->prefix . 'ekattor_exam';
    $query_result = $wpdb->get_results("SELECT * FROM $school_exam ", ARRAY_A);
    return $query_result;
}

// Get information of certain exam.
function get_exam_info($exam_id = '') {
    global $wpdb;
    $school_exam = $wpdb->prefix . 'ekattor_exam';
    $query_result = $wpdb->get_results("SELECT * FROM $school_exam WHERE exam_id = '$exam_id' ", ARRAY_A);
    return $query_result;
}

// Edit exam information.
function edit_exam($exam_id = '') {
    global $wpdb;
    $data['name'] = $_POST['name'];
    $data['date'] = strtotime($_POST['date']);
    $data['comment'] = $_POST['comment'];

    $wpdb->update($wpdb->prefix . 'ekattor_exam', $data, array('exam_id' => $exam_id));
}

// Delete an exam.
function delete_exam($exam_id = '') {
    global $wpdb;
    $wpdb->delete($wpdb->prefix . 'ekattor_exam', array('exam_id' => $exam_id));
}

// Create new grade.
function create_grade() {
    global $wpdb;

    if ($_POST['name'] != "") {

        $data['name'] = $_POST['name'];
        $data['grade_point'] = $_POST['grade_point'];
        $data['mark_from'] = $_POST['mark_from'];
        $data['mark_upto'] = $_POST['mark_upto'];
        $data['comment'] = $_POST['comment'];

        $wpdb->insert($wpdb->prefix . 'ekattor_grade', $data);
    }
}

// Get all grades.
function get_grades() {
    global $wpdb;
    $school_grade = $wpdb->prefix . 'ekattor_grade';
    $query_result = $wpdb->get_results("SELECT * FROM $school_grade ", ARRAY_A);
    return $query_result;
}

// Get grade information according to mark obtained.
function get_grade($mark_obtained = '') {
    $grades = get_grades();
    foreach ($grades as $row) {
        if ($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
            return $row;
    }
}

// Get information of certain grade.
function get_grade_info($grade_id = '') {
    global $wpdb;
    $school_grade = $wpdb->prefix . 'ekattor_grade';
    $query_result = $wpdb->get_results("SELECT * FROM $school_grade WHERE grade_id = '$grade_id' ", ARRAY_A);
    return $query_result;
}














// Get settings information.
function get_school_settings() {
    global $wpdb;
    $school_settings = $wpdb->prefix . 'ekattor_settings';
    $query_result = $wpdb->get_results("SELECT * FROM $school_settings ", ARRAY_A);
    return $query_result;
}

// Edit settings information.
function edit_settings() {
    global $wpdb;

    $data['description'] = $_POST['system_name'];
    $wpdb->update($wpdb->prefix . 'ekattor_settings', $data, array('type' => 'system_name'));

    $data['description'] = $_POST['address'];
    $wpdb->update($wpdb->prefix . 'ekattor_settings', $data, array('type' => 'address'));

    $data['description'] = $_POST['phone'];
    $wpdb->update($wpdb->prefix . 'ekattor_settings', $data, array('type' => 'phone'));

    $data['description'] = $_POST['system_email'];
    $wpdb->update($wpdb->prefix . 'ekattor_settings', $data, array('type' => 'system_email'));
}

// Get settings information of certain type.
function get_settings_info($type = '') {
    global $wpdb;
    $school_settings = $wpdb->prefix . 'ekattor_settings';
    $query_result = $wpdb->get_results("SELECT * FROM $school_settings WHERE type = '$type' ", ARRAY_A);

    foreach ($query_result as $row) {
        return $row['description'];
    }
}

// Get image url.
function get_image_url($type = '', $id = '') {
    $upload_dir = wp_upload_dir();
    if (file_exists($upload_dir['basedir'] . '/ekattor/' . $type . '_image/' . $id . '.jpg'))
        $image_url = $upload_dir['baseurl'] . '/ekattor/' . $type . '_image/' . $id . '.jpg';
    else
        $image_url = plugins_url() . '/ekattor/assets/images/user.jpg'; //plugins_url( 'assets/images/user.jpg', __FILE__ );

    return $image_url;
}

// Get plugin logo
function get_logo_url() {
    $image_url = plugins_url() . '/evento/assets/images/logo.png';
    return $image_url;
}

// Create new document.
function create_document() {
    global $wpdb;
    $school_teacher = $wpdb->prefix . 'ekattor_teacher';

    if ($_POST['title'] != "") {

        $data['timestamp'] = strtotime($_POST['timestamp']);
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['class_id'] = $_POST['class_id'];
        $data['file_name'] = $_FILES["file_name"]["name"];
        $data['file_type'] = $_POST['file_type'];

        global $current_user;
        get_currentuserinfo();
        $current_user_name = $current_user->user_login;

        $query_result = $wpdb->get_results("SELECT * FROM $school_teacher WHERE username = '$current_user_name' ", ARRAY_A);

        foreach ($query_result as $row) {
            $data['teacher_id'] = $row['teacher_id'];
        }
        $wpdb->insert($wpdb->prefix . 'ekattor_document', $data);

        $upload_dir = wp_upload_dir();
        move_uploaded_file($_FILES['file_name']['tmp_name'], $upload_dir['basedir'] . '/ekattor/document/' . $_FILES["file_name"]["name"]);
    }
}



