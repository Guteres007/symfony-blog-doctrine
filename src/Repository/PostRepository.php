<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class PostRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

   public function getPost($id)
   {
       return $this->find($id);
   }

    /**
     * @param $title
     * @param $body
     */
   public function ulozit($data)
   {
       $post = new Post();
       $post->setBody($data->getBody());
       $post->setTitle($data->getTitle());
       $this->getEntityManager()->persist($post);
       $this->getEntityManager()->flush();

   }
}
