<h2><?php /*eh($thread->title)*/ ?></h2>
<p class="alert alert-success">
    You successfully deleted.
</p>
<!--a href="<?php //eh(url("thread/view", array("thread_id" => $thread->id))) ?>">
    &larr; Go to thread
</a-->
<a href="<?php eh(url("thread/index")) ?>">
    &larr; Back to thread list
</a>