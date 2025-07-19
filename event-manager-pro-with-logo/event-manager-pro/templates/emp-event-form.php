<img src="<?php echo plugin_dir_url(__FILE__) . '../assets/logo.png'; ?>" alt="Logo" class="emp-logo" />
<form method="post" class="emp-form">
    <label>Name:</label>
    <input type="text" name="emp_name" required />
    <label>Email:</label>
    <input type="email" name="emp_email" required />
    <label>Event Title:</label>
    <input type="text" name="emp_event" required />
    <button type="submit" name="emp_submit">Register</button>
</form>
