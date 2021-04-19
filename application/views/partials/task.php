<?php foreach($task as $work): ?>
    <div class="task" data-id="<?=$work->id?>">
<?php   if($work->completed == "false"): ?>
    <a href="/tasks/delete_task"><img src="<?=base_url()?>images/delete.png" alt="delete"></a>
    <a class="<?= $work->completed == "true" ? 'hidden':''?>" href="/tasks/edit/<?=$work->id?>"><img src="<?=base_url()?>images/edit.png" alt="pencil photo"></a>
<?php   endif ?>
        <form id="toggle" data-id="<?=$work->id?>" action="/tasks/is_complete" method="post">
<?php       if($work->completed == "true"): ?>
                <input type="checkbox" name="task" checked disabled>
<?php       endif ?>
<?php       if($work->completed == "false"): ?>
                <input type="checkbox" name="task">
<?php       endif ?>
        </form>
        <h4 class="<?= $work->completed == "true" ? 'complete':''?>"><?=$work->name?></h4>
      
    </div>
<?php endforeach ?>