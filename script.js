
console.log("Script.js is being run!"); // Log a message to the browser console

document.getElementById('contactForm').addEventListener('submit', function(event) {
    console.log("Script.js running inside event listener!"); // Log a message to the browser console



    event.preventDefault(); // Prevent form submission

    // Get form data
    var formData = new FormData(this);

    // Send email using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_email.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert('Email sent successfully!');
            // Optionally, reset the form
            document.getElementById('contactForm').reset();
        } else {
            alert('There was a problem sending the email. Please try again later.');
        }
    };
    xhr.onerror = function() {
        alert('There was a problem sending the email. Please try again later.');
    };
    xhr.send(formData);
});