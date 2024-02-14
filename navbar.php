<!-- Navbar Section -->
<style>
  .text-button {
    background-color: transparent;
    border: none;
  }

  .navbar-dark .navbar-nav .nav-link:hover {
    color: white;
  }

  /* 
  @media (min-width: 992px){
	.dropdown-menu .dropdown-toggle:after{
		border-top: .3em solid transparent;
	    border-right: 0;
	    border-bottom: .3em solid transparent;
	    border-left: .3em solid;
	}
	.dropdown-menu .dropdown-menu{
		margin-left:0; margin-right: 0;
	}
	.dropdown-menu li{
		position: relative;
	}
	.nav-item .submenu{ 
		display: none;
		position: absolute;
		left:100%; top:-7px;
	}
	.nav-item .submenu-left{ 
		right:100%; left:auto;
	}
	.dropdown-menu > li:hover{ background-color: #f1f1f1 }
	.dropdown-menu > li:hover > .submenu{
		display: block;
	}
} */
</style>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">BCA Quiz</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Play Quiz
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="quiz.php?subject=Random">Random Quiz</a></li>
              <li><a class="dropdown-item" href="quiz.php?subject=DBMS">DBMS</a></li>
              <li><a class="dropdown-item" href="quiz.php?subject=ComputerNetwork">Computer Network</a></li>
              <li><a class="dropdown-item" href="quiz.php?subject=NepalHistory">History</a></li>
              <li><a class="dropdown-item" href="quiz.php?subject=Geography">Geography</a></li>
              <li><a class="dropdown-item" href="index.php#quiz">More Subjects</a></li>
            </ul>
          </li> -->

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="semDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
              Play Quiz
            </a>
            <ul class="dropdown-menu">

              <li class="dropend">
                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Semester 1 </a>
                <ul class="dropdown-menu">
                  <li><a href="quiz.php?subject=Fundamental" class="dropdown-item">Fundamental</a></li>
                  <li><a href="quiz.php?subject=Society" class="dropdown-item">Society & Technology</a></li>
                  <li><a href="quiz.php?subject=English" class="dropdown-item">English</a></li>
                  <li><a href="quiz.php?subject=Math" class="dropdown-item">Mathematics</a></li>
                  <li><a href="quiz.php?subject=DigitalLogic" class="dropdown-item">Digital Logic</a></li>
                </ul>
              </li>
              <li class="dropend">
                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Semester 2 </a>
                <ul class="dropdown-menu">
                  <li><a href="quiz.php?subject=C" class="dropdown-item">C Programming</a></li>
                  <li><a href="quiz.php?subject=Account" class="dropdown-item">Financial Accounting</a></li>
                  <li><a href="quiz.php?subject=English" class="dropdown-item">English II</a></li>
                  <li><a href="quiz.php?subject=Math" class="dropdown-item">Mathematics II</a></li>
                  <li><a href="quiz.php?subject=Microprocessor" class="dropdown-item">Microprocessor</a></li>
                </ul>
              </li>
              <li class="dropend">
                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Semester 3</a>
                <ul class="dropdown-menu">
                  <li><a href="quiz.php?subject=DSA" class="dropdown-item">Data Structure</a></li>
                  <li><a href="quiz.php?subject=Probability" class="dropdown-item">Probability & Statistics</a></li>
                  <li><a href="quiz.php?subject=SAD" class="dropdown-item">Sytem Analysis & Design</a></li>
                  <li><a href="quiz.php?subject=Java" class="dropdown-item">OOP in Java</a></li>
                  <li><a href="quiz.php?subject=WebTechnology" class="dropdown-item">Web Technology</a></li>
                </ul>
              </li>
              <li class="dropend">
                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Semester 4</a>
                <ul class="dropdown-menu">
                  <li><a href="quiz.php?subject=OS" class="dropdown-item">Operating System</a></li>
                  <li><a href="quiz.php?subject=NM" class="dropdown-item">Numerical Methods</a></li>
                  <li><a href="quiz.php?subject=SonftwareEngineering" class="dropdown-item">Software Engineering</a></li>
                  <li><a href="quiz.php?subject=ScriptingLanguage" class="dropdown-item">Scripting Language</a></li>
                  <li><a href="quiz.php?subject=DBMS" class="dropdown-item">Database Management System</a></li>
                </ul>
              </li>
              <li class="dropend">
                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Semester 5</a>
                <ul class="dropdown-menu">
                  <li><a href="quiz.php?subject=MIS" class="dropdown-item">MIS & E-Business</a></li>
                  <li><a href="quiz.php?subject=DotNet" class="dropdown-item">DotNet</a></li>
                  <li><a href="quiz.php?subject=ComputerNetwork" class="dropdown-item">Computer Networking</a></li>
                  <li><a href="quiz.php?subject=Management" class="dropdown-item">Introduction to Management</a></li>
                  <li><a href="quiz.php?subject=ComputerGraphics" class="dropdown-item">Computer Graphics</a></li>
                </ul>
              </li>
              <li class="dropend">
                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Semester 6</a>
                <ul class="dropdown-menu">
                  <li><a href="quiz.php?subject=MobileProgramming" class="dropdown-item">Mobile Programming</a></li>
                  <li><a href="quiz.php?subject=DistributedSystem" class="dropdown-item">Distributed System</a></li>
                  <li><a href="quiz.php?subject=AppliedEconomics" class="dropdown-item">Applied Economics</a></li>
                  <li><a href="quiz.php?subject=AdvancedJava" class="dropdown-item">Advanced Java</a></li>
                  <li><a href="quiz.php?subject=NetworkProgramming" class="dropdown-item">Network Programming</a></li>
                </ul>
              </li>
              <li class="dropend">
                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Semester 7</a>
                <ul class="dropdown-menu">
                  <li><a href="quiz.php?subject=CyberLaw" class="dropdown-item">Cyber Law & Professional Ethics</a></li>
                  <li><a href="quiz.php?subject=CloudComputing" class="dropdown-item">Cloud Computing</a></li>
                </ul>
              </li>
              <li class="dropend">
                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Semester 8</a>
                <ul class="dropdown-menu">
                  <li><a href="quiz.php?subject=OperationsResearch" class="dropdown-item">Operations Research</a></li>
                </ul>
              </li>
              <div class="dropdown-divider"></div>
              <li><a class="dropdown-item" href="quiz.php?subject=Random">Random Quiz</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="leaderboard.php">Leaderboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#contact">Contact Us</a>
          </li>
        </ul>

        <?php
        if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
          // User is logged in, show user details and logout button
          $username = $_SESSION['username'];
          echo '<div class="dropdown">';
          echo '<span class="dropdown-toggle text-white" data-bs-toggle="dropdown">' . $username . '</span>';
          echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
          echo '<li><a class="dropdown-item" href="#" onclick="showMyProfile(this)" data-userid="' . $username . '">My Profile</a></li>';
          echo '<li><a class="dropdown-item" href="#" onclick="showQuizHistory(this)" data-userid="' . $username . '">Quiz History</a></li>';
          echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal" data-userid="' . $username . '">Change Password</a></li>';

          echo '<li><hr class="dropdown-divider"></li>';

          echo '
          <li>
          <form action="engine.php" method="post" id="logout-form">
            <button type="submit" class="nav-link dropdown-item text-button" name="logout">Logout</button>
          </form>
          </li>
          ';
          echo '</ul>';
          echo '</div>';
        } else {
          // User is not logged in, show login and register form
          echo '<form class="d-flex flex-column flex-sm-row" action="engine.php" method="POST">';
          echo '<input class="form-control mb-2 me-2" type="text" name="email" id="email" placeholder="Email" aria-label="Username">';
          echo '<input class="form-control mb-2 me-2" type="password" name="password" placeholder="Password" aria-label="Password">';
          echo '<button class="btn btn-primary mb-2 me-2" type="submit" name="login">Login</button>';
          echo '<button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#registerModal" style="border-width:2px;">Register</button>';
          echo '</form>';
        }

        ?>

        <!-- Register Modal Body -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="engine.php" method="POST">
                  <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Enter full name">
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="emailRegister" placeholder="Enter email">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm password">
                  </div>

                  <div class="mb-3" id="gender">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                      <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                      <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                      <label class="form-check-label" for="other">Other</label>
                    </div>
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="termsAndConditions">
                    <label class="form-check-label" for="termsAndConditions">I agree to the terms and conditions</label>
                  </div>
                  <div class="button">
                    <input type="hidden" name="signup" value="submit">
                    <center><button type="submit" name="signup" class="btn btn-primary btn-block">Register</button></center>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </nav>
</header>
<!-- Change PW Modal Body -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="engine.php" method="POST">
          <div class="mb-3">
            <label for="password" class="form-label">Current Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter current password">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" name="npassword" id="password" placeholder="Enter new password">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm new password">
          </div>
          <div class="button">
            <input type="hidden" name="" value="submit">
            <center><button type="submit" name="changePassword" class="btn btn-primary btn-block">Change Password</button></center>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>






<script src="js/validate.js"></script>
<script>
  /*
document.addEventListener("DOMContentLoaded", function(){
// make it as accordion for smaller screens
if (window.innerWidth < 992) {

  // close all inner dropdowns when parent is closed
  document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
    everydropdown.addEventListener('hidden.bs.dropdown', function () {
      // after dropdown is hidden, then find all submenus
        this.querySelectorAll('.submenu').forEach(function(everysubmenu){
          // hide every submenu as well
          everysubmenu.style.display = 'none';
        });
    })
  });

  document.querySelectorAll('.dropdown-menu a').forEach(function(element){
    element.addEventListener('click', function (e) {
        let nextEl = this.nextElementSibling;
        if(nextEl && nextEl.classList.contains('submenu')) {	
          // prevent opening link if link needs to open dropdown
          e.preventDefault();
          if(nextEl.style.display == 'block'){
            nextEl.style.display = 'none';
          } else {
            nextEl.style.display = 'block';
          }

        }
    });
  })
}
// end if innerWidth
}); 

*/
</script>