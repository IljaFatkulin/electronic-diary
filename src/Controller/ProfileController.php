<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfileController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}


    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/profile/{name?}', name: 'profile')]
    public function profileAction(Request $request, UserRepository $userRepository, UserInterface $user): Response
    {
        $name = $request->get(key: 'name');
        if(!isset($name)) {
            $name = strtolower($request->getSession()->get(Security::LAST_USERNAME) );
        }

        $form = $this->changeLogin($request, $userRepository, $user);

        return $this->render('profile/profile.html.twig', [
            'name' => $name,
            'form_changelogin' => $form
        ]);
    }

    public function changeLogin($request, UserRepository $userRepository, UserInterface $user) : \Symfony\Component\Form\FormInterface
    {
        $form = $this->createFormBuilder()
            ->add('login')
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

            $userId = $user->getId();
            $user = $userRepository->find($userId);

            $user->setUsername($data['login']);

            $em->persist($user);
            $em->flush();

        }

        return $form;
    }
}
