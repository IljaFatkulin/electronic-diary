<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
        // access
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // create a new post with title
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            // entity manager
            $em = $this->doctrine->getManager();

            /** @var UploadedFile $file */
            $file = $request->files->get('post')['attachment'];
            if($file) {
                $filename = md5(uniqid()) . '.' . $file->guessClientExtension();

                $file->move(
                    $this->getParameter('uploads_dir'),
                    $filename
                );

                $post->setImage($filename);

                $em->persist($post);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('post_index'));
        }

//        $this->addFlash('success', 'Post was created');
        // return a response
//        return new Response(content: 'Post was created')
        return $this->render('post/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

//    #[Route('/show/{id}', name:'show')]
//    public function show($id, PostRepository $postRepository) {
//        $post = $postRepository->findPostWithCategory($id);
//
//        dump($post);
//
//        return $this->render('post/show.html.twig', [
//            'post' => $post
//        ]);
//    }


    /**
     * @param Post $post
     * @return Response
     */
    #[Route('/show/{id}', name:'show')]
//    public function show(Post $post, Request $request): Response
    public function show(Post $post, Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('title')
            ->add('confirm', SubmitType::class, [
                'attr' => [
                        'class' => 'btn btn-success'
                ]
            ])
            ->getForm()
        ;

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $data = $form->getData();

            $em = $this->doctrine->getManager();

            $post->setTitle($data['title']);

            $em->persist($post);
            $em->flush();
        }
        // create the show view
        return $this->render('post/show.html.twig', [
            'post' => $post,
            'form' => $form
        ]);
    }

    #[Route('/delete/{id}', name:'delete')]
    public function remove(Post $post) : Response {
        // access
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $em = $this->doctrine->getManager();

        $em->remove($post);
        $em->flush();

        $this->addFlash('success', 'Post was removed');

        return $this->redirect($this->generateUrl('post_index'));
    }
}
