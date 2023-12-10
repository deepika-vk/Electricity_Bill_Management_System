  <?php include 'include/header.php'; ?>
<!-- 
   <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div> -->
    <div class="applycontainer">
        
    <form action="Api/application.api.php" method="post">
        <h3>Register</h3>

        <label for="username">Name</label>
        <input type="text" placeholder="Username " id="username" name='name'>

        <label for="username">Phone</label>
        <input type="text" placeholder="Phone " id="username" name='phone'>

        <label for="username">E-mail</label>
        <input type="text" placeholder="E-mail " id="username" name='email'>

        <label for="username">Password</label>
        <input type="text" placeholder="Password " id="username" name='password'>

        <label for="password">Address</label>
        <input type="text" placeholder="Address" id="username" name="address">

        <label for="password">Message</label>
        <textarea id="username" name="message" rows="4" cols="50">
        Messages...
        </textarea>

        <button type="submit" name="submit">Send message</button>
    </form>

    </div>

    
    <?php include 'include/footer.php'; ?>