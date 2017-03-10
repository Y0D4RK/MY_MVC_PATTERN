<?php foreach($errors as $error): ?>

	<?php
	if(isset($errors_msg[$error])){
		echo "<li>".$errors_msg[$error] ."</li>";
	}
	?>
<?php endforeach;?>

<?php
if(isset($_POST))
	$data = $_POST;
elseif(isset($_GET)){
	$data = $_GET;
}
?>

<div class="panel panel-default">
	<div class="panel-heading"> <h2 class="title-form"><?= $form["title"]; ?></h2> </div>

	<form
		action="<?php echo $form["options"]["action"]; ?>"
		method="<?php echo $form["options"]["method"]; ?>"
		<?= isset($form["options"]["enctype"]) ? "enctype=\"".$form["options"]["enctype"]."\"" : "" ?>
		class="<?= isset($form['options']['class']) ? $form['options']['class']: '' ?>";
	>

		<div class="panel-body">
			<?php foreach ($form["struct"] as $name => $option ) :?>

				<div class="form-group form-inline">
					<?php if ($option["type"] != "hidden"): ?>
						<label for="<?= $name ?>"><?= $option["label"] ?> :</label>
					<?php endif; ?>

					<?php if($option["type"] == "text" ||
						$option["type"] == "checkbox" ||
						$option["type"] == "color" ||
						$option["type"] == "email" ||
						$option["type"] == "password" ||
						$option["type"] == "date" ||
						$option["type"] == "hidden" ||
						$option["type"] == "file" ): ?>

						<input name="<?= $name ?>"
							   id="<?= $name ?>"
							   type="<?= $option["type"] ;?>"
							   class="<?= $option["class"] ;?>"
							   placeholder="<?= $option["placeholder"] ;?>"
							<?= ($option["required"])?"required='required'":""?>
							   value= "<?php if((isset($data[$name]) && $option["type"]!="password" && $option["type"]!="hidden")){echo $data[$name];}else if(isset($option["value"])){echo $option["value"];}?>"
							<?php isset($option["disabled"])? $option["disabled"] : ""; ?>
						>
					<?php elseif($option["type"] == "select"): ?>
						<select name="<?= $name ?>">
							<?php foreach($option["option"] as $key => $pos): ?>
								<option value="<?= $pos ?>"> <?= $pos ?> </option>
							<?php endforeach; ?>
						</select>
					<?php elseif($option["type"] == "textarea"): ?>
						<textarea class="<?= $option["class"]; ?>"
								  id="<?= $name ?>"
								  name="<?= $name ?>"><?php if((isset($data[$name]) && $option["type"]!="password" && $option["type"]!="hidden")){echo $data[$name];}else if(isset($option["value"])){echo $option["value"];} ?></textarea>
					<?php endif; ?>
				</div>

			<?php endforeach;?>
		</div>
		<div class="form-group">
			<input type="submit" value="<?php echo $form["buttonTxt"] ?>" name="submit" class="btn btn-success"><br>
		</div>
	</form>
</div>