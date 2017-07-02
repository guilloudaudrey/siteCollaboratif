<?php

class Comment {

    private $author;
    private $article;

    function __construct(User $author, Post $article) {
        $this->author = $author->getPseudo();
        $this->article = $article->getTitle();
    }
    function getAuthor() {
        return $this->author;
    }

    function getArticle() {
        return $this->article;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setArticle($article) {
        $this->article = $article;
    }


}
