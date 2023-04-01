<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security, private ManagerRegistry $doctrine)
    {
        $this->security = $security;
    }

    #[Route(path: '/getadmin', name: 'getadmin')]
    public function get_admin_role()
    {
        $em = $this->doctrine->getManager();
        $user = $this->security->getUser();

        $user->setRoles(array('ROLE_ADMIN'));

        $em->flush();

        return $this->redirect($this->generateUrl('profile'));
    }

    #[Route(path: '/getteacher', name: 'getteacher')]
    public function get_teacher_role()
    {
        $em = $this->doctrine->getManager();
        $user = $this->security->getUser();

        $user->setRoles(['ROLE_TEACHER']);

        $em->flush();

        return $this->redirect($this->generateUrl('profile'));
    }

    #[Route('/getuser', name: 'getuser')]
    public function get_user_role()
    {
        $em = $this->doctrine->getManager();
        $user = $this->security->getUser();

        $user->setRoles(['ROLE_USER']);

        $em->flush();

        return $this->redirect($this->generateUrl('profile'));
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
