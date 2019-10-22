<div class="wrap">
    <h2><?php esc_html_e('مدریت پیام ها','direct-message');?></h2>
    <h2 class="nav-tab-wrapper">
        <?php foreach($tabs as $tab=>$title):
            $class = ($tab == $current_tab) ? ' nav-tab-active' : '';
            echo "<a class='nav-tab $class' href='?page=drt_setting&tab=$tab'>$title</a>";
            endforeach; ?>
    </h2>
    <form action="" method="post">
    <table class="form-table">
        <?php switch ($current_tab){
            case 'general':
        ?>
        <tr valign="top">
            <th scope="row"><?php esc_html_e('فعال بودن فرم پیام','direct-message');?> </th>
            <td><input type="checkbox" name="drt_active" <?php echo intval(get_option('drt_active'))?'checked':'';  ?> /></td>
        </tr>
                <?php break; ?>
        <?php } ?>
    </table>
        <?php wp_nonce_field('save_drt_setting','drt_nounce'); //for security reasons ?>
        <?php submit_button(esc_html__('ذخیره تنظیمات','direct-message'));// a wordpress function for create submit button ?>
    </form>
</div>