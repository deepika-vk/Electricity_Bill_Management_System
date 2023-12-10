  <?php include 'include/header.php'; ?>
<!-- 
   <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div> -->
    <style type="text/css">
        
        .addusers{
            padding:  5px;
    background:#080710;
    display: flex;
    justify-content: center;
        }
        .addusers form{
            width:  500px;
        }
        .addusers form input{
    background-color: rgba(255,255,255,0.07);
    width: 100%;
    color:white;
        }
    </style>
    <div class="addusers">
        <fieldset>

        <form method="post" action="Api/adduser.api.php">
  <div class="form-group">
    <label for="formGroupExampleInput">Username</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username" name="name" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Phone</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Phone" name="phone" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Address</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address" name="address" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Email</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="E-mail" name="email">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Password</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password" name="password">
  </div>

    <div class="form-group">
      <label for="inputState">UserType</label>
      <select id="inputState" class="form-control" name="types">
        <option value="admin" selected>Admin</option>
        <option value="biller">Biller</option>
        <option value="consumer">Consumer</option>
        <option value="manager">Manager</option>
      </select>
    </div>
  <button type="submit" class="btn btn-primary" name="submit">Add User</button>
</form>


</fieldset>
        
  
    </div>

    
    <?php include 'include/footer.php'; ?>