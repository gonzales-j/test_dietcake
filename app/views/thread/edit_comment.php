<h1>Edit comment</h1>



<?php if ($comment->hasError()): ?>
    <div class="alert alert-block">
        <h4 class="alert-heading">Validation error!</h4>
        <?php if (!empty($comment->validation_errors["username"]["length"])): ?>
            <div><em>Your name</em> must be
                between
                <?php eh($comment->validation["username"]["length"][1]) ?> and
                <?php eh($comment->validation["username"]["length"][2]) ?> characters in length.
            </div>
        <?php endif ?>
        <?php if (!empty($comment->validation_errors["body"]["length"])): ?>
            <div><em>Comment</em> must be
                between
                <?php eh($comment->validation["body"]["length"][1]) ?> and
                <?php eh($comment->validation["body"]["length"][2]) ?> characters in length.
            </div>
        <?php endif ?>
    </div>
<?php endif ?>


<form class="well" method="post" action="<?php eh(url())  ?>">
    <label>Your name</label>
    <input type="text" class="span2" name="username" value="<?php eh($comment->username) ?>">
    <label>Comment</label>
    <textarea name="body"><?php eh($comment->body) ?></textarea>
    <br /-->
    <input type="hidden" name="thread_id" value="<?php eh($comment->thread_id) ?>">
    <input type="hidden" name="comment_id" value="<?php eh($comment->id) ?>">
    <input type="hidden" name="page_next" value="edit_comment_end">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
