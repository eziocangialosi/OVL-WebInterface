<!-- Background image section-->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-color: #647295;
        height: 300px;
        "></div>
        
  <!-- Design block for the login form -->
  <div class="card mx-4 mb-5 mx-md-auto shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        max-width: 900px;
        ">
    <!--Card body with form -->
    <div class="card-body py-5 px-md-5">
      <div class="row d-flex justify-content-center">
        <!-- Login form -->
        <div class="col-lg-8">
          <!-- Form header -->
          <h2 class="fw-bold mb-5">Login</h2>
          <form  action="php/verifyConnect.php" method="POST">
            <!-- Email input field with validation error-->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control <!-- PHP code to check if the connexion is valid, if not then show error message. --> <?php if(["connexion"] == 2){ ?> is-invalid <?php } ?>" name="email" required/>
              <label class="form-label" for="form3Example3">Email</label>
            </div>

            <!-- Password input field with validation error-->
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control <!-- PHP code to check if the connexion is valid, if not then show error message. --> <?php if(["connexion"] == 1){ ?> is-invalid <?php } ?>" name="password" required/>
              <label class="form-label" for="form3Example4">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">
              Login
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
