<div class="wrap">
    <h2><?php esc_html_e('مدیریت پیام ها', 'direct-message'); ?></h2>
    <?php if($has_error): ?>
        <div class="error">
            <p><?php echo $message;?></p>
        </div>
    <?php elseif($success): ?>
        <div class="updated">
            <p><?php echo $message;?></p>
        </div>
    <?php endif; ?>
    <table class="wp-list-table widefat fixed drt">
        <thead>
        <tr>
            <th scope="col" id="title" class="manage-column"><?php esc_html_e('نام و نام خانوادگی', 'direct-message'); ?></th>
            <th scope="col" id="title" class="manage-column"><?php esc_html_e('ایمیل', 'direct-message'); ?></th>
            <th scope="col" id="title" class="manage-column"><?php esc_html_e('موبایل', 'direct-message'); ?></th>
            <th scope="col" id="title" class="manage-column"><?php esc_html_e('پیام', 'direct-message'); ?></th>
            <th scope="col" id="title" class="manage-column"><?php esc_html_e('تاریخ', 'direct-message'); ?></th>
            <th scope="col" id="title" class="manage-column"><?php esc_html_e('وضیعت', 'direct-message'); ?></th>
            <th scope="col" id="title" class="manage-column"><?php esc_html_e('حذف', 'direct-message'); ?></th>
        </tr>
        </thead>
        <tbody>
            <?php if(count($all_messages)>0):?>
                <?php foreach($all_messages as $msg):?>
                    <tr>
                        <td><?php echo $msg->name;?></td>
                        <td><?php echo $msg->email;?></td>
                        <td><?php echo $msg->mobile;?></td>
                        <td><?php echo $msg->usermessage;?></td>
                        <td><?php echo $msg->date;?></td>
                        <td><?php echo $msg->status;?></td>
                        <td><a title="<?php esc_html_e('حذف کردن این پیام', 'direct-message'); ?>" href="<?php echo admin_url('admin.php?page=drt_main&action=delete&item_id='.$msg->ID); ?>"><span class="dashicons dashicons-trash"></span></a></td>

                    </tr>
                <?php endforeach;?>
            <?php else:?>
                <tr class="no-items">
                    <td class="colspanchange" colspan="9"><?php esc_html_e('هیچ موردی یافت نشد', 'direct-message'); ?></td>
                </tr>
            <?php endif;?>
        </tbody>
    </table>
</div>