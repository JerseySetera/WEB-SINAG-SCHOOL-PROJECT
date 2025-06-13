<h3>Provide Employee's Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your name.." required>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name.." required>

            <label for="access">Access Level</label>
            <select id="access" name="access">
            <option value="Manager">Baker</option>
              <option value="staff">Staff</option>
              <option value="supervisor">Cashier</option>
              <option value="Manager">Manager</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email.." required>

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password.." pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*$" title="Password must contain at least one uppercase letter, one lowercase letter, and one number" required>


            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password.." pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*$" title="Password must contain at least one uppercase letter, one lowercase letter, and one number" required oninput="checkPasswordMatch();">


        </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
        <script>
          <script>
function checkPasswordMatch() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmpassword").value;

  if (password !== confirmPassword) {
    document.getElementById("confirmpassword").setCustomValidity("Passwords do not match");
  } else {
    document.getElementById("confirmpassword").setCustomValidity("");
  }
}
</script>

          </script>
  </form>
</div>