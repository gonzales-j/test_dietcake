<?php
    class Comment extends AppModel
    {
        public $validation = array(
            "username" => array(
                "length" => array(
                    "validate_between", 1, 16,
                ),
            ),
            "body" => array(
                "length" => array(
                    "validate_between", 1, 200,
                ),
            ),);


        //get specific thread
        public static function get($id)
        {
            $db = DB::conn();
            $row = $db->row("SELECT * FROM comment WHERE id = ?", array($id));
            return new self($row);
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

        //delete specific comment
        public static function delete_comment($id)
        {
            $db = DB::conn();
            $db->query(
                "DELETE FROM comment WHERE id = ?",
                array($id)
            );
            //return new self($row);
        }

        //edit specific comment
        public static function edit_comment($name,$body,$id)
        {

            $db = DB::conn();
            $db->query(
                "UPDATE comment SET username = ?, body =? WHERE id = ?",
                array($name,$body,$id)
            );
            //return new self($row);
        }


    }

