<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class RegistrationController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/register', name: 'register')]
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher, UserRepository $userRepository): Response
    {
        $form = $this->createFormBuilder()
            ->add('username')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Confirm Passowrd']
            ])
            ->add('register', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
            ->getForm()
        ;

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $data = $form->getData();

            $users = $userRepository->findAll();

            if($this->checkUserExist($users, $data['username']) == 1) {
                return $this->redirect($this->generateUrl('register'));
            }

            $user = new User();
            $user->setUsername($data['username']);
            $user->setPassword(
                $passwordHasher->hashPassword($user, $data['password'])
//                $data['password']
            );
            $em = $this->doctrine->getManager();

            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('app_login'));
        }

        return $this->render('registration/index.html.twig' , [
            'form' => $form->createView()
        ]);
    }

    public function checkUserExist($users, $name): int
    {
        foreach($users as $value) {
            if($value->getUsername() == $name) {
                $this->addFlash('error', 'User exist');
                return 1;
            }
        }
        return 0;
    }
}
