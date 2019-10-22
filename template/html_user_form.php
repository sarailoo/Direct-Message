<?php if($has_error): ?>
    <div class="message error">
        <p><?php echo $message; ?></p>
    </div>
<?php endif; ?>
<?php if($success): ?>
    <div class="message success">
        <p><?php echo $message; ?></p>
    </div>
<?php endif; ?>
<form id="drt_form" action="" method="post">
    <p>
        <span><?php esc_html_e('نام و نام خانوادگی:', 'direct-message'); ?> </span>
        <span><input type="text" name="fullname"></span>
    </p>
    <p>
        <span><?php esc_html_e('ایمیل:', 'direct-message'); ?></span>
        <span><input type="text" name="email"></span>
    </p>
    <p>
        <span><?php esc_html_e('شماره همراه:', 'direct-message'); ?></span>
        <span><input type="text" name="mobile"></span>
    </p>
    <p>
        <span><?php esc_html_e('پیام:', 'direct-message'); ?></span>
        <span><textarea name="usermessage"></textarea></span>
    </p>
    <p>
        <span><?php esc_html_e('نوع پیام:', 'direct-message'); ?></span>
        <span>
                    <input type="radio" name="status" value="<?php esc_html_e('معمولی', 'direct-message'); ?>" id="normal" checked>
                    <label for="normal"><?php esc_html_e('معمولی', 'direct-message'); ?></label>
                    <input type="radio" name="status" value="<?php esc_html_e('فوری', 'direct-message'); ?>" id="emergency">
                    <label for="emergency"><?php esc_html_e('فوری', 'direct-message'); ?></label>
        </span>
    </p>
    <p>
        <?php wp_nonce_field('drt_msg','drt_nounce'); // prevent CSRF attacks ?>
        <input type="submit" name="drt_submit" value="<?php esc_html_e('ارسال', 'direct-message'); ?>">
    </p>
</form>