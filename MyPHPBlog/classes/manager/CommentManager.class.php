<?php

interface CommentManager
{
    function addComment($body, $post, $user);
}