<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="signup">
      <h1 class="form-title">Register</h1>
      
      <?php if(isset($_GET['error'])): ?>
          <div class="error-message">
              <?php echo htmlspecialchars($_GET['error']); ?>
          </div>
      <?php endif; ?>
      
      <?php if(isset($_GET['success'])): ?>
          <div class="success-message">
              <?php echo htmlspecialchars($_GET['success']); ?>
          </div>
      <?php endif; ?>
      
      <form method="post" action="register.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="fName" id="fName" placeholder="First Name" required>
           <label for="fname">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      <p class="or">----------or--------</p>

      <div class="links">
        <p>Already Have Account ?</p>
        <a href="signin.php"><button id="signINButton">Sign In</button></a>
      </div>
    </div>
</body>
</html>