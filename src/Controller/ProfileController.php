<?php

namespace App\Controller;

use App\Repository\MarksRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use http\Client\Curl\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
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
    public function profileAction(Request $request, UserRepository $userRepository, UserInterface $user, UserPasswordHasherInterface $passwordHasher): Response
    {
        $name = $request->get(key: 'name');
        if(!isset($name)) {
            $name = strtolower($request->getSession()->get(Security::LAST_USERNAME) );
        }

        $forml = $this->createFormChangeLogin($request);
        if($forml->isSubmitted() && $forml->isValid()) {
            $data = $forml->getData();
            $this->changeLogin($request, $userRepository, $user, $data['login']);
        }

        $formp = $this->createFormChangePassword($request);
        if($formp->isSubmitted() && $formp->isValid()) {
            $data = $formp->getData();

            $old_password = $data['old_password'];
            if($passwordHasher->isPasswordValid($user, $old_password)) {
                $new_password = $passwordHasher->hashPassword($user, $data['new_password']);

                $em = $this->doctrine->getManager();

                $user->setPassword($new_password);

                $em->persist($user);
                $em->flush();

            }
        }
        $name = $request->getSession()->get(Security::LAST_USERNAME);
        return $this->render('profile/profile.html.twig', [
            'name' => $name,
            'form_changelogin' => $forml,
            'form_changepassword' => $formp
        ]);
    }

    #[Route('/marks/{id?}', 'marks')]
    public function showMarks(MarksRepository $marksRepository, Request $request, UserRepository $userRepository) : Response
    {
        $id = $request->get('id');
        $user = $this->getUser();
        if(isset($id)) {
            $user = $userRepository->find($id);
        }

        $marks = $marksRepository->findBy(['user' => $user]);
//        $user = $request->get('name');
//        $user = $userRepository->find($user);

        return $this->render('profile/marks.html.twig', [
            'marks' => $marks
        ]);
    }

    public function createFormChangeLogin(Request $request) {
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

        return $form;
    }

    public function createFormChangePassword(Request $request) {
        $form = $this->createFormBuilder()
            ->add('old_password')
            ->add('new_password')
            ->add('confirm', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
            ->getForm()
        ;

        $form->handleRequest($request);

        return $form;
    }

    public function changeLogin($request, UserRepository $userRepository, UserInterface $user, $name)
    {
        $em = $this->doctrine->getManager();

        $userId = $user->getId();
        $user = $userRepository->find($userId);

        $user->setUsername($name);

        $request->getSession()->set(Security::LAST_USERNAME, $name);

        $em->persist($user);
        $em->flush();
    }

}
