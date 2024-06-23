<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Megajoy</title>
<link rel="stylesheet" href="../style/contact.css">


</head>
<body>

<?php require '../header/header.php'; ?>

<!-- Main content of oour page go here -->
<h1>Contact</h1>
<p>Welcome to MegaJoy! We value your inquiries and feedback. If you have any questions, suggestions, or just want to share your excitement about PulseTracker, please feel free to reach out to us. Our team is here to assist you.</p>

<h2>Customer Suport</h2>
<p>For general inquiries and assistance, contact our customer support team:</p>
<p>Email: support@megajoy.com </p>
<p>Phone: 1-800-634-2569</p>
<p>Business Hours: Monday to Friday, 9:00 AM to 6:00 PM (UTC)</p>

<h2>Technical Suport</h2>
<p>If you encounter any technical issues or need help with PulseTracker, our technical support team is ready to assist:</p>
<p>Email: techsupport@megajoy.com</p>
<p>Phone: 1-800-554-2569</p>
<p>Live chat coming soon!</p>

<h2>Write to us directly</h2>
<p>You can share your queries below along with your contact details and we will get back to you as soon as we can</p>

<form id="contactForm" method="POST" action="submit_contact.php">
    <div>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
    </div>
    <div>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <span id="emailError" style="color: red;"></span>
    </div>
    <div>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

<script src:"../header/script.js"> </script>



<?php require '../footer/footer.php'; ?>

</body>
</html>