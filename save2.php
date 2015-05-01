<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
  <input name="fichier" id="fichier_a_uploader" type="file" onchange="this.form.submit()" name="myFile"/>
</form>
