<script src="assets/js/script.js"></script>
document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const skills = document.getElementById('skills').value;

    // Here you can add code to send this data to a server or database

    document.getElementById('message').innerText = `Thank you for signing up, ${name}!`;
    document.getElementById('signupForm').reset();
});