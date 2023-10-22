<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$page = "contact";
$style_forms = true;
$js = array("contact.js", "contact_listeners.js");
$components_path = "../components/";
include $components_path . "header.php";
echo "<script>var contactPost = '" . POST_REQUESTS . "contact-post.php';</script>";
?>
<div class="form-container">
    <div class="form-box">
        <div class="tab-selector">
            <button id="individual-tab" class="active-tab"> Individuals</button>
            <button id="company-tab" class="inactive-tab"> Companies</button>
        </div>
        <form id="individual-form" class="form-content active-form">
            <input type="hidden" name="form_source" value="individual">
            <div class="in-form-row">
                <div class="column">
                    <div class="input-container">
                        <label class="l-text" for="name">Your Name</label>
                        <input class="input-box" placeholder="Name" type="text" id="name" />
                    </div>
                    <div class="input-container">
                        <label class="l-text" for="email">Your Email</label>
                        <input class="input-box" placeholder="Email" type="text" id="email" />
                    </div>
                    <div class="input-container">
                        <label class="l-text" for="reason">Contact Reason</label>
                        <select class="input-box" id="reason">
                            <option value="ticket">Ticket</option>
                            <option value="feedback">Feedback</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label class="l-text" for="r_company">Recipient Company</label>
                        <input class="input-box" placeholder="Company name" type="text" id="r_company" required />
                    </div>
                </div>
                <div class="column">
                    <div class="input-container">
                        <label class="l-text" for="message">Message</label>
                        <textarea class="input-box" placeholder="Message" rows="20" type="text" id="message"></textarea>
                        <span id="char-count">0/2000 characters</span>
                    </div>
                </div>
            </div>
            <div class="form-submit">
                <button class="s-button">Submit</button>
            </div>
        </form>
        <form id="company-form" class="form-content">
            <input type="hidden" name="form_source" value="company">
            <div class="form-row">
                <div class="input-container">
                    <label class="l-text" for="company_name">Company Name</label>
                    <input class="input-box" placeholder="Company name" type="text" name="company_name"
                        id="company_name" />
                </div>
                <div class="input-container">
                    <label class="l-text" for="contact_name">Contact Name</label>
                    <input class="input-box" placeholder="Contact name" type="text" name="contact_name"
                        id="contact_name" />
                </div>
            </div>
            <div class="form-row">
                <div class="input-container">
                    <label class="l-text" for="contact_email">Contact Email</label>
                    <input class="input-box" placeholder="Email" type="email" name="contact_email" id="contact_email" />
                </div>
                <div class="input-container">
                    <label class="l-text" for="contact_phone">Phone</label>
                    <input class="input-box" placeholder="Phone" type="tel" name="contact_phone" id="contact_phone" />
                </div>
            </div>
            <div class="form-row">
                <label class="l-text" for="company-reason">Reason</label>
                <select class="input-box" name="c-reason" id="company-reason">
                    <option value="registration">Registration</option>
                    <option value="feedback">Feedback</option>
                    <option value="complaint">Complaint</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div id="registration-content">
                <div class="form-row">
                    <div class="input-container">
                        <label class="l-text" for="m-uname">Username for management</label>
                        <input class="input-box" placeholder="Username" type="text" name="m-uname" id="m-uname"
                            required />
                    </div>
                    <div class="input-container">
                        <label class="l-text" for="m-email">Email for management</label>
                        <input class="input-box" placeholder="Email" type="email" name="m-email" id="m-email"
                            required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-container">
                        <label class="l-text" for="m-pass">Password</label>
                        <input class="input-box" placeholder="Password" type="password" name="m-pass" id="m-pass"
                            required />
                    </div>
                    <div class="input-container">
                        <label class="l-text" for="m-cpass">Confirm password</label>
                        <input class="input-box" placeholder="Confirm password" type="password" name="m-cpass"
                            id="m-cpass" required />
                    </div>
                </div>
            </div>
            <div id="other-content" style="display: none">
            </div>
            <div class="form-row">
                <label class="l-text" for="c-desc">Message</label>
                <textarea class="input-box" placeholder="Message" rows="10" type="text" name="c-msg" id="c-msg"
                    required></textarea>
            </div>
            <div class="form-submit">
                <button type="submit" class="s-button">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php
include $components_path . "footer.php"; ?>