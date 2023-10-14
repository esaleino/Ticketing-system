<?php
$page = "contact";
$style_forms = true;
$js = array("contact.js", "contact_listeners.js");
$components_path = "../components/";
include $components_path . "header.php";
?>
<div class="form-container">
    <div class="form-box">
        <div class="tab-selector">
            <button id="individual-tab" class="active-tab"> Individuals</button>
            <button id="company-tab" class="inactive-tab"> Companies</button>
        </div>
        <form id="individual-form" class="form-content active-form">
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
        </form>
        <form id="company-form" class="form-content">
            <div class="form-row">
                <div class="input-container">
                    <label class="l-text" for="input-1">Company name</label>
                    <input class="input-box" placeholder="Company name" type="text" id="input-1" />
                </div>
                <div class="input-container">
                    <label class="l-text" for="input-2">Contact name</label>
                    <input class="input-box" placeholder="Contact name" type="text" id="input-2" />
                </div>
            </div>
            <div class="form-row">
                <div class="input-container">
                    <label class="l-text" for="input-3">Email</label>
                    <input class="input-box" placeholder="Email" type="email" id="input-3" />
                </div>
                <div class="input-container">
                    <label class="l-text" for="input-4">Phone</label>
                    <input class="input-box" placeholder="Phone" type="tel" id="input-4" />
                </div>
                <div class="input-container">
                    <label class="l-text" for="input-5">Reason</label>
                    <select class="input-box" id="input-5">
                        <option value="1">General</option>
                        <option value="2">Feedback</option>
                        <option value="3">Complaint</option>
                        <option value="4">Other</option>
                    </select>
                    <div class="input-container">
                        <label class="l-text" for="input-6">Message</label>
                        <textarea class="input-box" placeholder="Message" rows="10" type="text" id="input-6"></textarea>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<?php
include $components_path . "footer.php"; ?>