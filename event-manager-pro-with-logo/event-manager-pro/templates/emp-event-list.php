<?php
global $wpdb;
$table = $wpdb->prefix . 'emp_events';
$results = $wpdb->get_results("SELECT * FROM $table ORDER BY created_at DESC");

$download_link = admin_url('admin-post.php?action=emp_download_csv');
?>

<h2>Registered Events</h2>
<a href="<?php echo esc_url($download_link); ?>" class="button button-primary" target="_blank">Download CSV</a>
<ul class="emp-event-list">
<?php foreach ($results as $row): ?>
    <li><strong><?php echo esc_html($row->event_title); ?></strong> - <?php echo esc_html($row->name); ?> (<?php echo esc_html($row->email); ?>)</li>
<?php endforeach; ?>
</ul>
