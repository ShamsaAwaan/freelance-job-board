<form action="register_process.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <label for="role">Role:</label>
    <select id="role" name="role">
        <option value="freelancer">Freelancer</option>
        <option value="client">Client</option>
    </select>
    
    <button type="submit">Register</button>
</form>
