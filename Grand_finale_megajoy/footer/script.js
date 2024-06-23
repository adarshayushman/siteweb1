
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();

    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    // Check if all fields are filled
    if (!firstName || !lastName || !email || !message) {
        alert("Please fill out all the fields.");
    return;
    }

    // Validate email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = "Attention, the email is not correct";
    document.getElementById('email').focus();
    return;
    } else {
        document.getElementById('emailError').textContent = "";
    }

    // Ask for confirmation before submitting
    var isConfirmed = confirm("Do you want to submit the form?");
    if (isConfirmed) {
        // Here you can send the form data to your server
        // This part is not implemented as it requires server-side code
        alert("Form submitted successfully!");
    }
});

    document.getElementById('email').addEventListener('blur', function(event) {
    var email = event.target.value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = "Attention, the email is not correct";
    } else {
        document.getElementById('emailError').textContent = "";
    }
});
