<?php
function emp_create_db() {
    global $wpdb;
    $table = $wpdb->prefix . 'emp_events';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name text NOT NULL,
        email text NOT NULL,
        event_title text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function emp_handle_form_submission() {
    if (isset($_POST['emp_submit'])) {
        global $wpdb;
        $table = $wpdb->prefix . 'emp_events';

        $name = sanitize_text_field($_POST['emp_name']);
        $email = sanitize_email($_POST['emp_email']);
        $event_title = sanitize_text_field($_POST['emp_event']);

        $wpdb->insert($table, array(
            'name' => $name,
            'email' => $email,
            'event_title' => $event_title,
        ));

        $subject = "Event Registration Confirmed";
        $message = "Hi $name,

Thank you for registering for '$event_title'.

Best regards,
Event Team";
        wp_mail($email, $subject, $message);
    }
}
add_action('init', 'emp_handle_form_submission');

function emp_download_csv() {
    if (!current_user_can('manage_options')) wp_die('Unauthorized');

    global $wpdb;
    $table = $wpdb->prefix . 'emp_events';
    $results = $wpdb->get_results("SELECT * FROM $table");

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="registered_events.csv"');

    $output = fopen("php://output", "w");
    fputcsv($output, ['ID', 'Name', 'Email', 'Event Title', 'Registered At']);

    foreach ($results as $row) {
        fputcsv($output, [$row->id, $row->name, $row->email, $row->event_title, $row->created_at]);
    }

    fclose($output);
    exit;
}
