<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('create');?>
	<label for="id">ID</label>
	<input type="input" name="id">

	<label for="todo">Todo</label>
	<input name="todo">

	<label for="description">Description</label>
	<input name="description">
	
	<input type="submit" name="submit" value="Create new todo list"/>
</form>
