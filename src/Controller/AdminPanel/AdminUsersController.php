<?php

namespace App\Controller\AdminPanel;

use App\Entity\Group;
use App\Entity\Subject;
use App\Repository\GroupRepository;
use App\Repository\GroupUserRepository;
use App\Repository\SubjectRepository;
use App\Repository\TeacherRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/users', name: 'admin_users_')]

class AdminUsersController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route('/', name: 'index')]
    public function users_index(Request $request, UserRepository $userRepository, TeacherRepository $teacherRepository): Response
    {
        // Find by username
        $form_user = $this->create_form_username();
        $form_user->handleRequest($request);

        if($form_user->isSubmitted() && $form_user->isValid()) {
            $data = $form_user->getData();

            $username = $data['username'];
            $user = $userRepository->findOneBy(['username' => $username]);
            $uid = $user->getId();

            return $this->redirect($this->generateUrl('admin_users_profile', ['id' => $uid]));
        }

        // Find by group
        $form_group = $this->create_form_group();
        $form_group->handleRequest($request);

        if($form_group->isSubmitted() && $form_group->isValid()) {
            $data = $form_group->getData();
            $group = $data['group'];

            return $this->redirect($this->generateUrl('admin_users_group', ['group' => $group]));
        }

        // Find teacher by subject
        $form_teacher = $this->create_form_teacher();
        $form_teacher->handleRequest($request);

        if($form_teacher->isSubmitted() && $form_teacher->isValid()) {
            $data = $form_teacher->getData();
            $subject = $data['subject'];

            $teachers = $teacherRepository->findBy(['subject' => $subject]);
            foreach ($teachers as $key => $teacher) {
                $teachers[$key] = $teacher->getUser();
            }

            return $this->render('admin_panel/users/users_group.html.twig', [
                'users' => $teachers
            ]);
        }

        return $this->render('admin_panel/users/index.html.twig', [
            'form_user' => $form_user,
            'form_group' => $form_group,
            'form_teacher' => $form_teacher
        ]);
    }

    #[Route('/users/{group}', name: 'group')]
    public function user_choose(Request $request, GroupUserRepository $groupUserRepository, GroupRepository $groupRepository, UserRepository $userRepository) : Response
    {
        $group = $request->get('group');
        $group = $groupRepository->findOneBy(['name' => $group]);

        $groupUsers = $groupUserRepository->findBy(['group' => $group]);
        $users = array();
        foreach ($groupUsers as $user) {
            $users[] = $user->getUser();
        }

        return $this->render('admin_panel/users/users_group.html.twig', [
            'users' => $users
        ]);
    }

    #[Route('/users/profile/{id}', name: 'profile')]
    public function user_profile(Request $request, UserRepository $userRepository, GroupUserRepository $groupUserRepository, GroupRepository $groupRepository): Response
    {
        $id = $request->get('id');
        $user = $userRepository->find($id);
        if(!$user->getGroup()->isEmpty()) {
            $group = $groupUserRepository->findOneBy(['user' => $user]);
            $group = $group->getGroup();
        } else {
            $group = 'null';
        }

        return $this->render('admin_panel/users/user_profile.html.twig', [
            'user' => $user,
            'group' => $group
        ]);
    }

    private function create_form_group(): \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\Form\FormInterface
    {
        return $this->createFormBuilder()
            ->add('group', EntityType::class, [
                'class' => Group::class
            ])
            ->add('find_by_group', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();
    }

    private function create_form_username(): \Symfony\Component\Form\FormInterface
    {
        return $this->createFormBuilder()
            ->add('username')
            ->add('find_by_username', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();
    }

    private function create_form_teacher(): \Symfony\Component\Form\FormInterface
    {
        return $this->createFormBuilder()
            ->add('subject', EntityType::class, [
                'class' => Subject::class
            ])
            ->add('find_teacher_by_subject', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();
    }
}
