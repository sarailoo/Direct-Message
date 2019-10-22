<?php
function drt_main_page()
{
    global $wpdb,$table_prefix;
    $has_error=false;
    $message="";
    $success=false;
    if(isset($_GET['action'])){
        $action=$_GET['action'];
        switch ($action){
            case 'delete':
                $item_id=isset($_GET['item_id']) ? intval($_GET['item_id']):0;
                if($item_id){
                    $result=$wpdb->delete($table_prefix.'drt_msg',array('ID'=>$item_id),array('%d'));
                    if($result){
                        $success=true;
                        $message= esc_html__('پیام مورد نظر با موفقیت حذف گردید', 'direct-message');
                    }
                    else{
                        $has_error=true;
                        $message=esc_html__('خطایی رخ داده است', 'direct-message');
                    }
                }
        }
    }
    $all_messages=$wpdb->get_results("SELECT * FROM {$table_prefix}drt_msg");
    include DRT_TPL_DIR. 'html_admin_main.php';
}

function drt_setting_page()
{
    $tabs = array('general'=> esc_html__('عمومی', 'direct-message'));
    $current_tab = isset($_GET['tab']) ? $_GET['tab']:'general';
    if(isset($_POST['submit'])){
        wp_verify_nonce($_POST['drt_nounce'],'save_drt_setting') || wp_die(esc_html__('درخواست شما نا معتبر می باشد','direct-message')); // for security reasons
        #general
        update_option('drt_active',isset($_POST['drt_active'])? 1:0);
         }
    include DRT_TPL_DIR. 'html_admin_setting.php';
}