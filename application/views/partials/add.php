<form id="add" action="/tasks/addTask" method="post">
    <label for="task">Create a New Task</label>
    <textarea name="task"></textarea>
    <span><?=form_error("task")?></span>
    <input type="submit" value="Add Task">
</form>