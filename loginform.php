  <?php include 'include/header.php'; ?>
<!-- 
   <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div> -->
    <div class="logcontainer">
        
    <form action="Api/login.php" method="post">
        <h3>Login Here</h3>

        <label for="username">E-mail</label>
        <input type="email" placeholder="Email " id="username" name='email'>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <button type="submit" name="submit">Log In</button>
    </form>

    </div>

    
    <?php include 'include/footer.php'; ?>