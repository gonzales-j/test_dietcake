 <h1><?php eh($thread->title) ?></h1>

 <div class="container">
     <table class="table">
         <thead>
         <tr>
             <th>No.</th>
             <th>Username</th>
             <th>Created</th>
             <th>Comment</th>
             <th>Action</th>
         </tr>
         </thead>
         <tbody>
         <?php foreach ($comments as $k => $v): ?>
         <tr>
             <td><?php eh($k + 1) ?></td>
             <td><?php eh($v->username) ?></td>
             <td><?php eh($v->created)?></td>
             <td><?php eh($v->body)?></td>
             <td>
                 <a class="btn btn-primary" href="<?php eh(url("thread/edit_comment", array("comment_id" => $v->id))) ?>">
                     <?php echo "Edit"; ?>
                 </a>
                 <a class="btn btn-primary" href="<?php eh(url("thread/delete_comment", array("comment_id" => $v->id))) ?>">
                     <?php echo "Delete"; ?>
                 </a>
             </td>
         </tr>
         <?php endforeach;?>
         </tbody>
     </table>
 </div>


 <hr>
 <form class="well" method="post" action="<?php eh(url("thread/write")) ?>">
     <label>Your name</label>
     <input type="text" class="span2" name="username" value="<?php eh(Param::get("username")) ?>">
     <label>Comment</label>
     <textarea name="body"><?php eh(Param::get("body")) ?></textarea>
     <br />
     <input type="hidden" name="thread_id" value="<?php eh($thread->id) ?>">
     <input type="hidden" name="page_next" value="write_end">
     <button type="submit" class="btn btn-primary">Submit</button>
 </form>
 <a href="<?php eh(url("thread/index")) ?>">
     &larr; Back to thread list
 </a>
 <div>
     <?php // echo readable_text($v->body) ?>
 </div>