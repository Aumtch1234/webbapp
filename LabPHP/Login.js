// Initialize attempt counter
let loginAttempts = 3;

// Function to handle form submission
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    // Retrieve email and password values
    let email = document.getElementById('exampleInputEmail1').value;
    let password = document.getElementById('exampleInputPassword1').value;

    // Check if email and password are correct
    if (email === 'a@gmail.com' && password === '123') {
        alert('Login Successfully');
        window.location.href = 'MainForm.html'; // Redirect to MainForm.html upon successful login
    } else {
        // Decrement attempt counter
        loginAttempts--;

        // Display remaining attempts message
        if (loginAttempts > 0) {
            alert(`You have left ${loginAttempts} attempt(s).`);
        } else {
            alert('You have exhausted all login attempts.');
            // Disable form fields and submit button
            document.getElementById('exampleInputEmail1').disabled = true;
            document.getElementById('exampleInputPassword1').disabled = true;
            document.querySelector('button[type="submit"]').disabled = true;
        }
    }
});
