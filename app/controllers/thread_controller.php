<?php
class ThreadController extends AppController
{
    public function index()
    {
        // TODO: Get all threads
        $threads = Thread::getAll();
        $this->set(get_defined_vars());
    }

    public function view()
    {
        $thread = Thread::get(Param::get("thread_id"));
        $comments = $thread->getComments();


        $this->set(get_defined_vars());
    }



    //write comment
    public function write()
    {
        $thread = Thread::get(Param::get("thread_id"));
        $comment = new Comment;
        $page = Param::get("page_next", "write");
        switch ($page) {
            case "write":
                break;
            case "write_end":
                $comment->username = Param::get("username");
                $comment->body = Param::get("body");
                try {
                    $thread->write($comment);
                } catch (ValidationException $e) {
                    $page = "write";
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break; }
        $this->set(get_defined_vars());
        $this->render($page);

    }

    //create a thread
    public function create()
    {
        $thread = new Thread;
        $comment = new Comment;
        $page = Param::get("page_next", "create");
        switch ($page) {
            case "create":
                break;
            case "create_end":
                $thread->title = Param::get("title");
                $comment->username = Param::get("username");
                $comment->body = Param::get("body");
                try {
                    $thread->create($comment);
                } catch (ValidationException $e) {
                    $page = "create";
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $this->set(get_defined_vars());
        $this->render($page);

    }

    //edit a thread
    public function edit_thread()
    {
        $thread = Thread::get(Param::get("thread_id"));
        $page = Param::get("page_next", "edit_thread");

        switch ($page) {
            case "edit_thread":
                break;
            case "edit_end":
                $thread->title = Param::get("title");
                try {
                    $thread->edit_thread(Param::get("title"),Param::get("thread_id"));
                } catch (ValidationException $e) {
                    $page = "edit_thread";
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $this->set(get_defined_vars());
        $this->render($page);
    }


    public function edit_comment()
    {
        $comment = Comment::get(Param::get("comment_id"));
        $page = Param::get("page_next", "edit_comment");

        switch ($page) {
            case "edit_comment":
                break;
            case "edit_comment_end":
                $thread = Thread::get(Param::get("thread_id"));
                $comment->username = Param::get("username");
                $comment->body = Param::get("body");
                try {
                    $comment->edit_comment(Param::get("username"),Param::get("body"),Param::get("comment_id"));
                } catch (ValidationException $e) {
                    $page = "edit_comment";
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $this->set(get_defined_vars());
        $this->render($page);
    }


    //delete thread
    public function delete()
    {
        $thread = Thread::delete(Param::get("thread_id"));
        $page = Param::get("page_next", "delete_end");
        switch ($page) {
            case "delete":
                break;
            case "delete_end":
                $page = "delete_end";
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $this->set(get_defined_vars());
        $this->render($page);Thread::delete(Param::get("thread_id"));
    }

    public function delete_comment()
    {
        //$thread = Thread::get(Param::get("thread_id"));
        $comment = Comment::delete_comment(Param::get("comment_id"));
        $page = Param::get("page_next", "delete_comment_end");
        switch ($page) {
            case "delete_comment":
                break;
            case "delete_comment_end":
                $page = "delete_comment_end";
                /*
                //$page = "delete_comment_end";
                try {
                    $comment->delete_comment(Param::get("comment_id"));
                } catch (ValidationException $e) {
                    $page = "delete_comment_end";
                }*/
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $this->set(get_defined_vars());
        $this->render($page);
    }





}
