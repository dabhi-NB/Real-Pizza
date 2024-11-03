<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
?>
	<script type="text/javascript">
		window.location = "ad_login.php";
	</script>
<?php
} else {
	session_destroy();
?>
	<script type="text/javascript">
		window.location = "ad_login.php";
	</script>
<?php } ?>