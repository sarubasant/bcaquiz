<footer class="bg-dark text-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h5>About BCA Quiz</h5>
        <p>This is a webapp designed for students preparing for BCA exams. It provides a platform to test their knowledge and improve their skills in various subjects.</p>
      </div>
      <div class="col-md-3">
        <h5>Related Links</h5>
        <ul class="list-unstyled">
          <li><a href="#">Home</a></li>
          <li><a href="#quiz">Take Quiz</a></li>
          <li><a href="#">Results</a></li>
          <li><a href="#">FAQs</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Support</h5>
        <ul class="list-unstyled">
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Newsletter</h5>
        <form method="post" action="#">
          <div class="input-group mb-3">
          <input type="email" id="emailInput" class="form-control rounded-pill" placeholder="Enter your email" aria-label="Enter your email" aria-describedby="button-addon2" required>
          
          <button class="btn btn-primary rounded-pill ms-2" type="button" id="button-addon2" onclick="newsLetter()">Subscribe</button>
          <span id="emailError" style="color: red;"></span>  
          
        </div>
       </form>
      </div>
      <hr class="bg-light">
      <div class="row">
      <div class="col-md-12 text-center">
        <p>&copy; 2023, Basanta Saru &amp; Sagun Khatri. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>

<script>

function newsLetter() {
  var emailInput = document.getElementById("emailInput");
  var email = emailInput.value.trim();
  var emailError = document.getElementById("emailError");
  
  if (!validateEmail(email)) {
    emailError.innerHTML = "Please enter a valid email address.";
    return false;
  }
  emailError.innerHTML = "";
  
}
</script>
