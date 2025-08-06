# mikrotik-hotspot

This project contains web pages and scripts for managing a MikroTik Hotspot login portal. It includes HTML, CSS, JavaScript, and PHP files for user authentication, package selection, and status display.

## Features
- Custom login and logout pages
- User creation and package selection
- Status and error pages
- Responsive design with CSS
- JavaScript for client-side logic

## File Structure
- `login.html`, `logout.html`, `alogin.html`, `rlogin.html`: Login/logout pages
- `create-user.php`: PHP script for user creation
- `packages.html`, `pkgprice.js`: Package selection and pricing
- `status.html`, `error.html`, `success.html`: Status and feedback pages
- `css/style.css`: Main stylesheet
- `img/`: Images and icons
- `xml/`: XML files and schemas


## Usage
### 1. Clone the repository
```sh
git clone https://github.com/fahim8401/mikrotik-hotspot.git
```

### 2. Place files in your web server
Copy all files to your web server's root directory (e.g., `htdocs` for XAMPP, `www` for IIS, or `/var/www/html` for Apache on Linux).

### 3. Configure MikroTik Hotspot
- Log in to your MikroTik router.
- Go to IP > Hotspot > Server Profiles > HTML Directory.
- Set the HTML Directory to the path where you placed these files.
- Make sure the router is set to use your server's IP for HTTP redirects.

### 4. Set up the backend (PHP)
- Ensure your web server supports PHP (e.g., XAMPP, WAMP, LAMP, IIS with PHP).
- Edit `create-user.php` to connect to your user database or RADIUS server as needed.
- If using a database, update connection details in `create-user.php` (host, username, password, db name).
- Make sure the web server has permission to execute PHP scripts.

### 5. Test the portal
- Connect a device to your hotspot WiFi.
- Try to access any website; you should be redirected to the custom login page.
- Register or log in as a user.
- Check that authentication and redirection work as expected.

### 6. Troubleshooting
- If pages do not load, check web server and MikroTik router settings.
- For PHP errors, check your server's error logs.
- Ensure firewall rules allow HTTP/HTTPS traffic between router and web server.

## Backend Integration
- The backend is handled by `create-user.php` and any other PHP scripts you add.
- You can connect to a MySQL/MariaDB database, RADIUS server, or use MikroTik's API for user management.
- Adjust the PHP code to match your backend requirements.

## Security Note
Do not expose sensitive backend scripts to the public internet. Always secure your server and sanitize user input.

## License
This project is for educational and personal use. Please check MikroTik's terms and your local regulations before deploying in production.