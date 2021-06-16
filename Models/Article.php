<?php

class Article extends EntityBase {
    // Attributs 
    private $title;
    private $content;

    // Méthodes 
    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title) {
        if (is_string($title) && strlen($title) > 3 && strlen($title) < 80) {
            $this->title = htmlspecialchars($title);
        }
        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content) {
        if (is_string($content) && strlen($content) > 3 && strlen($content) < 500) {
            $this->content = htmlspecialchars($content);
        }
        return $this;
    }
}