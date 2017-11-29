<h1>Edit thread</h1>



<?php if ($thread->hasError()): ?>
    <div class="alert alert-block">
        <h4 class="alert-heading">Validation error!</h4>
        <?php if (!empty($thread->validation_errors["title"]["length"])): ?>
            <div><em>Title</em> must be
                between
                <?php eh($thread->validation["title"]["length"][1]) ?> and
                <?php eh($thread->validation["title"]["length"][2]) ?> characters in length.
            </div>
        <?php endif ?>
    </div>
<?php endif ?>


<form class="well" method="post" action="<?php eh(url())  ?>">
    <label>Title</label>
    <input type="text" class="span2" name="title" value="<?php eh($thread->title);/*eh(Param::get("title"))*/ ?>">
    <input type="hidden" name="thread_id" value="<?php eh($thread->id) ?>">
    <input type="hidden" name="page_next" value="edit_end">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
