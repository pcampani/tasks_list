
<form id="edit" action="/tasks/process_edit" method="post">
    <input type="hidden" name="id" value=<?=$task[0]->id?>>
    <label for="task">Edit Task</label>
    <textarea name="task"><?=$task[0]->name?></textarea>
    <span><?=form_error("task")?></span>
    <input type="submit" value="Edit Task">
    <a href="/tasks">Cancel</a>
</form>