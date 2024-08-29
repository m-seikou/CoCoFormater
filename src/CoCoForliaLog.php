<?php


class CoCoForliaLog
{
    /** @var string[] $users */
    private array $users = [];
    /** @var string[] $tabs */
    private array $tabs = [];
    /** @var post[] $posts */
    private array $posts = [];

    public function __construct(SimpleXMLElement $log)
    {
        foreach($log->body->p as $p){
            $post =  new post($p);
            $this->posts[] =$post;
            $this->users[$post->name] = $post->color;
            $this->tabs[$post->tab] = $post->tab;
        }
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @return post[]
     */
    public function getPosts(): array
    {
        return $this->posts;
    }

    /**
     * @return string[]
     */
    public function getTabs(): array
    {
        return $this->tabs;
    }
}
