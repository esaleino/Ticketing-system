<?php
$verify_company = "SELECT company_id FROM companies WHERE company_name = ? AND registration_key = ?";
$register_user = "INSERT INTO users (username, email, full_name, password_hash, company_id) VALUES (?, ?, ?, ?, ?)";
$get_email = "SELECT email FROM users WHERE email = ?";
$get_user = "SELECT username FROM users WHERE username = ?";
$get_companies = "SELECT company_name FROM companies";
$post_login = "SELECT password_hash FROM users WHERE username = ?";
$get_user_details = "SELECT username, company_id, role, email_verified, company_verified  FROM users WHERE username = ?";
?>