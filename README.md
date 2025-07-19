# Event_manager_pro

#  Event Manager Pro – WordPress Plugin

Event Manager Pro is a lightweight and user-friendly WordPress plugin to manage event registrations. It includes a styled registration form, confirmation email to users, CSV export for admin, and shortcode support for easy setup.

---

##  Features

-  Event registration form (Name, Email, Event Title)
-  Sends confirmation email on submission
-  Stores data in a custom database table
-  Admin CSV download of all registrations
-  Logo support above the form
-  Customizable CSS design
-  Easy to use with WordPress shortcodes

---

##  Installation Instructions

###  Using LocalWP or Any WordPress Server:

1. Download and install [LocalWP](https://localwp.com/) or use your existing WordPress setup.
2. Create or open a local WordPress site.
3. Place the plugin folder `event-manager-pro` inside:
       wp-content/plugins/
4.  Go to WordPress Admin Panel:
       http://your-local-site.local/wp-admin
5.   Activate the plugin via:
      Plugins → Installed Plugins → Activate


   
---

##  Shortcodes

Add these shortcodes to WordPress pages:

| Page Name          | Shortcode            | Description                         |
|-------------------|----------------------|-------------------------------------|
| **Event Register** | `[emp_event_form]`   | Shows the event registration form   |
| **Event List**     | `[emp_event_list]`   | Displays all registrations + CSV    |

---

##  Add Your Logo

1. Rename your logo image to `logo.png`
2. Place it in:
    event-manager-pro/assets/logo.png



---

##  Customizing CSS

To update styles:

1. Open the CSS file:
event-manager-pro/assets/style.css


2. Customize form, buttons, list, and layout
3. Save the file and refresh the page

---

##  Email Notifications

- After registration, a confirmation email is sent to the user's email address.
- The email includes the name and event title they registered for.

> Note: On local servers (like WAMP or LocalWP), emails may not send without SMTP setup. Use plugins like:
> - WP Mail SMTP  
> - WP Mail Logging

---

## CSV Export for Admin

- Admin can download all registration data in CSV format.
- CSV contains: ID, Name, Email, Event Title, Date
- Only users with admin privileges can access the CSV download.

---

## 🛢 Database Table

A custom table is created on plugin activation:
```sql
Table name: wp_emp_events
Columns: id, name, email, event_title, created_at


You can view this via phpMyAdmin or Adminer:
http://localhost/phpmyadmin → Select wp_emp_events


Screenshots:

🔹 Registration Form UI


<img width="1913" height="926" alt="Screenshot 2025-07-19 213317" src="https://github.com/user-attachments/assets/89b70cc6-c5e0-45be-b6d9-a2341cb67631" />


🔹 Registered Events List


<img width="1883" height="850" alt="Screenshot 2025-07-19 213147" src="https://github.com/user-attachments/assets/ce70761e-21c5-45a2-b281-d9e953557b8d" />


🔹 Database Table View


<img width="1913" height="849" alt="Screenshot 2025-07-19 213401" src="https://github.com/user-attachments/assets/f760ef6c-f431-408b-b1cc-89ee9ab88733" />


 Plugin Folder Structure
csharp
Copy
Edit
event-manager-pro/
├── assets/
│   ├── style.css
│   └── logo.png
├── includes/
│   └── emp-functions.php
├── templates/
│   ├── emp-event-form.php
│   └── emp-event-list.php
├── event-manager-pro.php
├── README.md




 License
This plugin is open-source and free to use under the MIT License.

Support
If you face any issue or need enhancements, feel free to:

Customize the code in the plugin folder

Extend the plugin with admin controls, filter options, or Google Sheets export

Author
E Poojith Kumar Reddy






