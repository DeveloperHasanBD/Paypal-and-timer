<?php

function srt_assesment_form_data_sending()
{

    global $wpdb;
    $srt_assesmentn             = $wpdb->prefix . 'srt_assesmentn';


    $mcq_query_check = new WP_Query([
        'post_type' => 'mcq',
    ]);

    $check_row_count = 1;
    $get_total_num = 0;

    while ($mcq_query_check->have_posts()) {
        $final_check_row_count = $check_row_count++;
        global $post;
        $mcq_query_check->the_post();
        $get_post_id_check = $post->ID;
        $asmt_mcq_right_answer = strtolower(get_post_meta($get_post_id_check, 'asmt_mcq_right_answer', true));
        $get_marked_value = strtolower($_POST["name_$final_check_row_count"]);
        if ($asmt_mcq_right_answer == $get_marked_value) {
            $get_total_num += 1;
        }
    }

    $get_total_num;


    $param              = sanitize_text_field($_POST['param']);
    if ('mcq_form_data' == $param) {
        $name       = sanitize_text_field($_POST['name']);
        $email       = sanitize_text_field($_POST['email']);
        $course       = sanitize_text_field($_POST['course']);
        $date       = sanitize_text_field($_POST['date']);
        $date_of_assesment       = sanitize_text_field($_POST['date_of_assesment']);
        $time       = sanitize_text_field($_POST['time']);
        $mark       = $get_total_num;

        $asses_result       = $wpdb->get_row("SELECT * FROM {$srt_assesmentn} WHERE email ='{$email}'");
        $is_email           = $asses_result->email;

        if ($is_email) {
?>
            <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
                <strong>Oppp!</strong> exam already done with this email address. Please try with another email
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="try_agn text-center"><a class="btn btn-warning" href="">Please try again</a></div>
            </div>
            <style>
                .srt_assesment_section {
                    display: none;
                }
            </style>
        <?php
        } else {
            $ases_data = [
                'name' => $name,
                'email' => $email,
                'course' => $course,
                'date' => $date,
                'get_date_of_assesment' => $date_of_assesment,
                'time' => $time,
                'mark' => $mark,
            ];
            $wpdb->insert($srt_assesmentn, $ases_data);
        ?>

            <div class="notice_ass">
                <p><i class="fas fa-check"></i></p>
                <h2>Success</h2>
            </div>
            <style>
                .srt_assesment_section {
                    display: none;
                }
            </style>
        <?php
        }
    }


    die;
}


add_action('wp_ajax_srt_assesment_form', 'srt_assesment_form_data_sending');
add_action('wp_ajax_nopriv_srt_assesment_form', 'srt_assesment_form_data_sending');

function srt_payment_form_form_data()
{
    global $wpdb;

    $srt_user_payments              = $wpdb->prefix . 'srt_user_payments';
    $param                          = sanitize_text_field($_POST['param']);
    if ('srt_paypal' == $param) {
        $course_name                = sanitize_text_field($_POST['course_name']);
        $course_location            = sanitize_text_field($_POST['course_location']);
        $course_date                = sanitize_text_field($_POST['course_date']);
        $course_payment_type        = sanitize_text_field($_POST['course_payment_type']);
        $pay_amount                 = sanitize_text_field($_POST['pay_amount']);
        $get_course_pay             = sanitize_text_field($_POST['get_course_pay']);
        $fname                      = sanitize_text_field($_POST['fname']);
        $address1                   = sanitize_text_field($_POST['address1']);
        $address2                   = sanitize_text_field($_POST['address2']);
        $city                       = sanitize_text_field($_POST['city']);
        $post_code                  = sanitize_text_field($_POST['post_code']);
        $email                      = sanitize_text_field($_POST['email']);
        $phone                      = sanitize_text_field($_POST['phone']);
        $rg_mail_text               = $_POST['rg_mail_text'];
        $rg_mail_image              = $_POST['rg_mail_image'];



        // start user creation 
        // Are we updating or creating?
        $srt_users            = $wpdb->prefix . 'users';
        $generate_user_pass = time();
        $user_hash_password = wp_hash_password($generate_user_pass);
        $data = [
            'user_login'    => $generate_user_pass,
            'user_email'    => $email,
            'user_pass'     => $user_hash_password,
        ];
        $wpdb->insert($srt_users, $data);

        $user_id = $wpdb->insert_id;


        $payments_data = [
            'user_id' => $user_id,
            'course_name' => $course_name,
            'course_location' => $course_location,
            'course_date' => $course_date,
            'course_payment_type' => $course_payment_type,
            'course_price' => $pay_amount,
            'course_pay' => $get_course_pay,
            'fname' => $fname,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'post_code' => $post_code,
            'email' => $email,
            'phone' => $phone,
        ];
        $wpdb->insert($srt_user_payments, $payments_data);

        if (!empty($userdata['ID'])) {
            $update = true;
        } else {
            $update = false;
        }

        $user = new WP_User($user_id);
        $userdata = array(
            'role' => 'contributor',
        );
        if (isset($userdata['role'])) {
            $user->set_role($userdata['role']);
        } elseif (!$update) {
            $user->set_role(get_option('default_role'));
        }

        $get_site_url_img = site_url();
        $get_site_url = site_url() . '/wp-admin';
        $joining_ins = site_url() . '/joining-instruction';
        $to_mail = $email;
        $headers = '';
        $headers .= "From: 1ALS Security  <noreply@1alssecurity.co.uk> \r\n";
        $subject = "Registration mail";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $msg = '';
        $msg .= 'Congratulations: ' . "<br>";
        $msg .= 'Your urser name is: ' . $generate_user_pass . "<br>";
        $msg .= 'Your password is: ' . $generate_user_pass . "<br>";
        $msg .= '<a href="' . $get_site_url . '">' . 'Login now' . '</a>' . "<br><br>";
        $msg .= '<a href="' . $joining_ins . '">' . 'Joining Instruction' . '</a>' . "<br><br>";
        $msg .= 'After logged in, you can change your user and password';



        $msg .= "<br><br>";
        $msg .= "1 ALS Joining Instruction" . "<br>";
        $msg .= "----------------------------------" . "<br>";

        $msg .= $rg_mail_text;
        $msg .= "<img src='" . $rg_mail_image . "' >";

        mail($to_mail, $subject, $msg, $headers, '1alssecurity.co.uk');

        // admin mail 

        $ad_headers = '';
        $ad_headers .= "From: Course registration  <noreply@1alssecurity.co.uk> \r\n";

        $ad_msg = '';
        $ad_msg .= 'Course name: ' . $course_name . "<br>";
        $ad_msg .= 'Location: ' . $course_location . "<br>";
        $ad_msg .= 'Course date: ' . $course_date . "<br>";
        $ad_msg .= 'User mail: ' . $email . "<br>";
        $ad_msg .= 'User phone: ' . $phone . "<br>";
        mail('developer.hasan.bd"gmail.com', $subject, $ad_msg, $ad_headers, '1alssecurity.co.uk');


        // end user creation 


        ?>

        <div class="alert alert-success">
            <strong>Payment Successfully done! Please check your mail ( <?php echo $email; ?> )</strong>
        </div>
        <style>
            .course_detail_inner {
                display: none;
            }
        </style>
    <?php
    }


    die;
}


add_action('wp_ajax_srt_payment_form', 'srt_payment_form_form_data');
add_action('wp_ajax_nopriv_srt_payment_form', 'srt_payment_form_form_data');
