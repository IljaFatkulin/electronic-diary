<?php

namespace App\Controller;

use App\Entity\Mark;
use App\Entity\Subject;
use App\Repository\GroupUserRepository;
use App\Repository\MarkRepository;
use App\Repository\SubjectRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use http\Client\Curl\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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
     * @param UserRepository $userRepository
     * @param UserInterface $user
     * @param UserPasswordHasherInterface $passwordHasher
     * @return Response
     */
    #[Route('/profile/{name?}', name: 'profile')]
    public function profileAction(Request $request, UserRepository $userRepository, GroupUserRepository $groupUserRepository, UserPasswordHasherInterface $passwordHasher): Response
    {
        $name = $request->get(key: 'name');
        if(!isset($name)) {
            $name = strtolower($request->getSession()->get(Security::LAST_USERNAME) );
        }

        $user = $userRepository->findBy(['username' => $name]);
        $user = $user[0];
        
        $groupUser = $groupUserRepository->findOneBy(['user' => $user]);
        $group = 'null';
        if($groupUser != null) {
            $group = $groupUser->getGroup()->getName();
        }

        $forml = $this->createFormChangeLogin($request);
        if($forml->isSubmitted() && $forml->isValid()) {
            $data = $forml->getData();
            $this->changeLogin($request, $userRepository, $user, $data['login']);
            return $this->redirect($this->generateUrl('profile'));
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

                return $this->redirect($this->generateUrl('app_logout'));
            }
        }
        return $this->render('profile/profile.html.twig', [
            'user' => $user,
            'form_changelogin' => $forml,
            'form_changepassword' => $formp,
            'group' => $group
        ]);
    }

    public function createFormChangeLogin(Request $request)
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

        return $form;
    }

    public function createFormChangePassword(Request $request) {
        $form = $this->createFormBuilder()
            ->add('old_password', PasswordType::class)
            ->add('new_password', PasswordType::class)
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
