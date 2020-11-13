<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        $posts = [
            [
                'title' => 'My first post',
                'slug' => 'my-first-post',
                'author' => 'WBS'
            ],
            [
                'title' => 'My second post',
                'slug' => 'my-second-post',
                'author' => 'WBS'
            ],
        ];
        return $this->render('default/index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/{slug}")
     * @param string $slug
     * @return Response
     */
    public function show(string $slug): Response
    {
        $posts = [
            [
                'title' => 'My first post',
                'slug' => 'my-first-post',
                'author' => 'WBS',
                'body' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.'
            ],
            [
                'title' => 'My second post',
                'slug' => 'my-second-post',
                'author' => 'WBS',
                'body' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.'
            ]
        ];
        $post = array_filter($posts, function ($var) use ($slug) {
            return ($var['slug'] == $slug);
        });
        return $this->render('default/show.html.twig', [
            'post' => reset($post)
        ]);
    }

}
