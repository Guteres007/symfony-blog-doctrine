<?php
/**
 * Created by PhpStorm.
 * User: Guteres
 * Date: 16.09.2018
 * Time: 20:51
 */
namespace App\Service;
use App\Repository\PostRepository;

class PostService
{
    private $postRepository;

  public function __construct(PostRepository $postRepository )
  {
      $this->postRepository = $postRepository;
  }


  public function getAllPosts()
  {
      return $this->postRepository->findAll();
  }

  public function findPostById($id)
  {
      return $this->postRepository->find($id);
  }
 // Zde bude třeba query kde se budu dotazovat na dvě repository. Třeba post tag

}