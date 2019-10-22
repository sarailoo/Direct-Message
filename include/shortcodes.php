<?php
add_shortcode('drt_msg','drt_msg');
function drt_msg()
{
    $drt_active = intval(get_option('drt_active'));
    if (!$drt_active) {
        return esc_html__('فرم پرداخت در دسترس نیست', 'direct-message');;
    }
    $has_error = false;
    $success = false;
    $message = "";
    if (isset($_POST['drt_submit'])) {
        wp_verify_nonce($_POST['drt_nounce'], 'drt_msg') || wp_die(esc_html__('درخواست شما نا معتبر می باشد', 'direct-message')); // for security reasons
        $fullname = sanitize_text_field($_POST['fullname']); // sanitize for security reasons
        $email = sanitize_text_field($_POST['email']);
        $mobile = sanitize_text_field($_POST['mobile']);
        $usermessage = sanitize_text_field($_POST['usermessage']);
        $status = esc_sql($_POST['status']); // prevent sql attacks
        $date = date('Y-m-d H:i:s');
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $has_error = true;
                $message = esc_html__('تکمیل فرم الزامی می باشد', 'direct-message');
            }
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $has_error = true;
            $message = esc_html__('لطفا یک ایمیل معتبر وارد کنید', 'direct-message');
        }

        if (empty($fullname)) {
            $has_error = true;
            $message = esc_html__('لطفا فیلد نام را پر کنید', 'direct-message');
        }
        if (!$has_error) {
            $success= true;
            $message= esc_html__('پیام شما با موفقیت ارسال شد', 'direct-message');
            global $wpdb, $table_prefix; // typically table prefix is wp in wordpress but maybe user changes it.
            $data = array(
                'status' => $status,
                'name' => $fullname,
                'email' => $email,
                'mobile' => $mobile,
                'usermessage' => $usermessage,
                'date' => $date
            );
            $result = $wpdb->insert($table_prefix . 'drt_msg', $data, array('%s', '%s', '%s', '%s', '%s', '%s'));
        }
    }
    ?>
    <div id="drt_wrap">
        <?php

        include DRT_TPL_DIR . 'html_user_form.php';

        ?>
    </div>
    <?php
}
    ?>