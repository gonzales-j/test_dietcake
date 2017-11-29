<?php
class Thread extends AppModel
{

    //get all threads
    public static function getAll()
    {
        $threads = array();
        $db = DB::conn();
        $rows = $db->rows("SELECT * FROM thread");
        foreach ($rows as $row) {
            $threads[] = new Thread($row);
        }
        return $threads;
    }

    //get all comments
    public function getComments()
    {
        $comments = array();
        $db = DB::conn();
        $rows = $db->rows(
            "SELECT * FROM comment WHERE thread_id = ? ORDER BY created ASC",
            array($this->id)
        );
        foreach ($rows as $row) {
            $comments[] = new Comment($row);
        }
        return $comments;
    }


    //get specific thread
    public static function get($id)
    {
        $db = DB::conn();
        $row = $db->row("SELECT * FROM thread WHERE id = ?", array($id));
        return new self($row);
    }

    //get specific comment
    public static function getComment($id)
    {
        $db = DB::conn();
        $row = $db->row("SELECT * FROM comment WHERE id = ?", array($id));
        return new self($row);
    }


    public static function edit_thread($thread,$id)
    {

        $db = DB::conn();
        $db->query(
            "UPDATE thread SET title =? WHERE id = ?",
            array($thread,$id)
        );
    }


    //delete thread
    public static function delete($id)
    {
        $db = DB::conn();
        $db->query(
            "DELETE FROM thread WHERE id = ?",
            array($id)
        );
    }

    //delete specific comment
    public static function delete_comment($id)
    {
        $db = DB::conn();
        $db->query(
            "DELETE FROM comment WHERE id = ?",
            array($id)
        );
    }

    //create thread
    public function create(Comment $comment)
    {
        $this->validate();
        $comment->validate();

        $db = DB::conn();
        $db->begin();
        $db->query("INSERT INTO thread SET title = ?, created = NOW()", array($this->title));
        $this->id = $db->lastInsertId();
        // write first comment at the same time
        $this->write($comment);
        $db->commit();
    }

    //write/create a comment
    public function write(Comment $comment)
    {
        if (!$comment->validate()) {
            throw new ValidationException("invalid comment");
        }
        $db = DB::conn();
        $db->query(
            "INSERT INTO comment SET thread_id = ?, username = ?, body = ?, created = NOW()",
            array($this->id, $comment->username, $comment->body)
        );
    }

}
