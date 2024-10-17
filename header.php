<?php include("mainheader.php"); ?>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link">
              <font size="5">Home</font>
            </a></li>
          <?php require 'con1.php';
          session_start();
          if (isset($_SESSION['user_id'])) { ?>
            <li class="nav-item "><a href="logout.php" class="nav-link" onclick="return confirm('logout from this website?');"> <img class="icon" src="../icon/logout.png" style="width: 60px;"></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->