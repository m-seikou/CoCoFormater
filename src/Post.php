<?php

class Post
{
    public readonly string $tab;
    public readonly string $color;
    public readonly string $name;
    public readonly string $content;

    function __construct(SimpleXMLElement $post)
    {
        $this->color = substr($post->attributes()["style"], 6, 7);
        $this->tab = trim($post->span[0]);
        $this->name = trim($post->span[1]);
        $this->content = trim($post->span[2]);
    }


}