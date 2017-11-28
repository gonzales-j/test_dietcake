<h1>All threads</h1>
<ul>
    <?php foreach ($threads as $v): ?>
        <li>
            <a href="<?php eh(url("thread/view", array("thread_id" => $v->id))) ?>">
                <?php eh($v->title) ?>
            </a>
            <a class="btn btn-primary" href="<?php eh(url("thread/delete", array("thread_id" => $v->id))) ?>">
                <?php echo "Delete"; ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>
<a class="btn btn-large btn-primary" href="<?php eh(url("thread/create")) ?>">Create</a>