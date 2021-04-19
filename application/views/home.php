<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?=base_url()?>css/styles.css">
	<title>Task List</title>
</head>
<body>
	<div class="wrapper">
		<header>
			<img src="<?=base_url()?>images/task.png" alt="clipboard">
			<h2>Tasks List App</h2>
		</header>
		<div class="container">
		<div class="tasks">
			<h2>Tasks List</h2>
			<div class="tasks-list">
<?php		if($tasks != "No tasks yet"): ?>
<?php 		foreach($tasks as $task): ?>
				<div class="task" data-id="<?=$task->id?>">
					<a id="delete" href="/tasks/delete_task/<?=$task->id?>"><img src="<?=base_url()?>images/delete.png" alt="delete"></a>
					<a id="beginEdit" class="<?= $task->completed == "true" ? 'hidden':''?>" href="/tasks/edit/<?=$task->id?>"><img src="<?=base_url()?>images/edit.png" alt="pencil photo"></a>
					<form id="toggle" data-id="<?=$task->id?>" action="/tasks/is_complete" method="post">
<?php       			if($task->completed == "true"): ?>
							<input type="checkbox" name="task" checked disabled>
<?php       			endif ?>
<?php       			if($task->completed == "false"): ?>
							<input type="checkbox" name="task">
<?php       			endif ?>
					</form>
					<h4 class="<?= $task->completed == "true" ? 'complete':''?>"><?=$task->name?></h4>
					
				</div>
<?php 		endforeach ?>
<?php 		endif ?>
			</div>
		</div>
		
			<div class="add-task">
				<form id="add" action="/tasks/addTask" method="post">
					<label for="task">Create a New Task</label>
					<textarea name="task"></textarea>
					<span><?=form_error("task")?></span>
					<input type="submit" value="Add Task">
				</form>
			</div>
		</div>
		
	</div>
	<script src="<?=base_url()?>js/index.js"></script>
</body>
</html>