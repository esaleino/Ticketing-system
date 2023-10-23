<?php
$verify_company = "SELECT company_id FROM companies WHERE company_name = ? AND registration_key = ?";
$register_user = "INSERT INTO users (username, email, full_name, password_hash, company_id, email_activation_token) VALUES (?, ?, ?, ?, ?, ?)";
$get_email = "SELECT email FROM users WHERE email = ?";
$get_user = "SELECT username FROM users WHERE username = ?";
$get_companies = "SELECT company_name FROM companies";
$post_login = "SELECT password_hash FROM users WHERE username = ?";
$get_user_details = "SELECT username, company_id, role, email_verified, company_verified  FROM users WHERE username = ?";
$add_company_reg_ticket = "INSERT INTO admin_tickets (company_name, contact_name, contact_email, contact_phone, contact_reason, company_email, company_username, company_password_hash, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$get_admin_tickets = "SELECT * FROM admin_tickets";
$get_company_reg_ticket = "SELECT id FROM admin_tickets WHERE company_name = ? AND contact_reason = 'registration'";
$add_company = "INSERT INTO companies (company_name, registration_key) VALUES (?, ?)";
$get_hash = "SELECT company_password_hash FROM admin_tickets WHERE id = ?";
$get_company = "SELECT * FROM companies WHERE company_name = ?";
$close_admin_ticket = "UPDATE admin_tickets SET state = 'closed' WHERE id = ?";
$verify_user = "UPDATE users SET email_verified = 1 WHERE email_activation_token = ?";
?>