<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/post', name: 'post_')]

class PostController extends AbstractController
{

    public function __construct(private ManagerRegistry $doctrine) {}

    /**
     * @param PostRepository $postRepository
     * @return Response
     */
    #[Route('/', name: 'index')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/create', name: 'create')]
    public function create(Request $request) : Response {
        // create a new post with title
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if($form->isSubmitted()) {
            // entity manager
            $em = $this->doctrine->getManager();

            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl('post_index'));
        }

//        $this->addFlash('success', 'Post was created');
        // return a response
//        return new Response(content: 'Post was created')
        return $this->render('post/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Post $post
     * @return Response
     */
    #[Route('/show/{id}', name:'show')]
    public function show(Post $post): Response
    {
        // create the show view
        return $this->render('post/show.html.twig', [
            'post' =>$post
        ]);
    }

    #[Route('/delete/{id}', name:'delete')]
    public function remove(Post $post) : Response {
        $em = $this->doctrine->getManager();

        $em->remove($post);
        $em->flush();

        $this->addFlash('success', 'Post was removed');

        return $this->redirect($this->generateUrl('post_index'));
    }
}
