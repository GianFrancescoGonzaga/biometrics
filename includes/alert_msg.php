<?php

	if (isset($_GET['msg'])) :

		$msg = $_GET['msg'];
		if (!empty($_GET['msg_class'])) {
			$msg_class = $_GET['msg_class'];
		}
?>

		<div class="alert alert-<?php echo $msg_class; ?> mt-2 w-50 mx-auto" id="alertMsg">
			<?php echo $msg; ?>
		</div>

		<script>
			const alert = document.getElementById("alertMsg");

			if(alert) {
			    setTimeout(() => {
					alert.style.display = "none";
				}, 3000);
			}
		</script>

<?php endif; ?>