<?php

namespace App\Controller\AdminPanel;

use App\Entity\Group;
use App\Entity\Subject;
use App\Entity\Teacher;
use App\Entity\Timetable;
use App\Repository\GroupRepository;
use App\Repository\TimetableRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/timetable', name: 'admin_timetable_')]

class AdminTimetableController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route('/', name:'index')]
    public function timetable(Request $request, TimetableRepository $timetableRepository): Response
    {
        $form_choose_group = $this->createFormChoose($request);

        if($form_choose_group->isSubmitted()) {
            $data = $form_choose_group->getData();

            $group = $data['group'];
            $date = $data['date'];

            return $this->redirect($this->generateUrl('admin_timetable_change', array('group' => $group, 'date' => $date->format('Y-m-d'))));
        }

        return $this->render('admin_panel/timetable/index.html.twig', [
            'form_choose_group' => $form_choose_group->createView(),
        ]);
    }

    #[Route('/timetable/change/{group}/{date}', name: 'change')]
    public function timetableChange(Request $request, TimetableRepository $timetableRepository, GroupRepository $groupRepository): Response
    {
        $group = $request->get('group');
        $date = $request->get('date');
        $group = $groupRepository->findBy(['name' => $group]);
        $group = $group[0];
        $lessons = $timetableRepository->selectSorted($group, $date, $date);

        $add_lesson_form = $this->createFormAddLesson($request);

        if($add_lesson_form->isSubmitted()) {
            $data = $add_lesson_form->getData();
            $teacher = $data['teacher'];
            $subject = $data['subject'];
            $lesson = $data['lesson'];

            $em = $this->doctrine->getManager();

            $date = new DateTime($date);
            $new_lesson = new Timetable();
            $new_lesson->setDate($date);
            $new_lesson->setGroup($group);
            $new_lesson->setTeacher($teacher);
            $new_lesson->setSubject($subject);
            $new_lesson->setLesson($lesson);

            $em->persist($new_lesson);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_timetable_change', array('group' => $group, 'date' => $date->format('Y-m-d'))));
        }

        return $this->render('admin_panel/timetable/main_side.html.twig', [
            'lessons' => $lessons,
            'add_lesson' => $add_lesson_form->createView(),
            'date' => $date,
            'group' => $group
        ]);
    }

    #[Route('/timetable/delete/{id}/{group}/{date}', name: 'delete')]
    public function deleteLesson(Request $request, TimetableRepository $timetableRepository): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $id = $request->get('id');
        $group = $request->get('group');
        $date = $request->get('date');

        $lesson = $timetableRepository->find($id);

        $em = $this->doctrine->getManager();

        $em->remove($lesson);
        $em->flush();

        $this->addFlash('success', 'Lesson was removed');

        return $this->redirect($this->generateUrl('admin_timetable_change', array('group' => $group, 'date' => $date)));
    }

    private function createFormAddLesson(Request $request): \Symfony\Component\Form\FormInterface
    {
        $form = $this->createFormBuilder()
            ->add('subject', EntityType::class, [
                'class' => Subject::class
            ])
            ->add('teacher', EntityType::class, [
                'class' => Teacher::class
            ])
            ->add('lesson', IntegerType::class)
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            unset($data['extra_field1'], $data['extra_field2']);
        }

        return $form;
    }
    private function createFormChoose(Request $request): \Symfony\Component\Form\FormInterface
    {
        $form = $this->createFormBuilder()
            ->add('group', EntityType::class, [
                'class' => Group::class
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('find', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm()
        ;

        $form->handleRequest($request);

        return $form;
    }
}
