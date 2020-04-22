<h1>All threads</h1>
<!--ul>
    <?php// foreach ($threads as $v): ?>
        <li>
            <a href="<?php //eh(url("thread/view", array("thread_id" => $v->id))) ?>">
                <?php// eh($v->title) ?>
            </a>
            <a class="btn btn-primary" href="<?php //eh(url("thread/delete", array("thread_id" => $v->id))) ?>">
                <?php// echo "Delete"; ?>
            </a>
        </li>
    <?php// endforeach ?>
</ul-->
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Thread</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($threads as $v): ?>
        <tr>
            <td>
                <a href="<?php eh(url("thread/view", array("thread_id" => $v->id))) ?>">
                    <?php eh($v->title) ?>
                </a>
            </td>
            <td>
                <a class="btn btn-primary" href="<?php eh(url("thread/edit_thread", array("thread_id" => $v->id))) ?>">
                    <?php echo "Edit"; ?>
                </a>
                <a class="btn btn-primary" href="<?php eh(url("thread/delete", array("thread_id" => $v->id))) ?>">
                    <?php echo "Delete"; ?>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<a class="btn btn-large btn-primary" href="<?php eh(url("thread/create")) ?>">Create</a>