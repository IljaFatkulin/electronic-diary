<?php

namespace App\Controller;

use App\Entity\Mark;
use App\Entity\Subject;
use App\Entity\UserSubject;
use App\Repository\MarkRepository;
use App\Repository\UserRepository;
use App\Repository\UserSubjectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MarkController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine, private MarkRepository $markRepository, private UserRepository $userRepository, private UserSubjectRepository $userSubjectRepository) {}

    #[Route('/marks/{id?}', name: 'mark')]
    public function index(Request $request): Response
    {
        $id = $request->get('id');
        if(!isset($id)) {
            $id = $this->getUser()->getId();
        }

        $teacher = $this->getUser();

        $user = $this->userRepository->find($id);

        $subjects = $this->userSubjectRepository->findBy(['user' => $user]);

        $marks = (array) null;
        $avg = (array) null;

        foreach($subjects as $subject) {
            $name = $subject->getSubject()->getName();
            $marks[$name] = [];
            $avg[$name] = 0;
            $marks_tmp = $this->markRepository->findBy(
                ['user_subject' => $subject],
                ['date' => 'ASC']
            );
            $counter = 0;

            foreach($marks_tmp as $mark) {
                $marks[$name][] = $mark;
                $v = $mark->getValue();
                if(is_numeric($v)) {
                    $v = intval($v);
                    $counter++;
                    $avg[$name] += $v;
                } else if($v === 'nv') {
                    $counter++;
                    $avg[$name] += 0;
                }
            }
            if($counter > 0) {
                $avg[$name] = round($avg[$name] / $counter, 1);
            } else {
                $avg[$name] = 0;
            }
        }

        $form = $this->createFormAddSubject($request);

        if($form->isSubmitted()) {
            $subject = $form->getData()['subject'];

            $user_subjects = $this->userSubjectRepository->findBy(['user' => $user]);
            if($this->subjectExistUser($user, $subject, $user_subjects) == 0) {
                $em = $this->doctrine->getManager();

                $us = new UserSubject();
                $us->setUser($user);
                $us->setSubject($subject);

                $em->persist($us);
                $em->flush();

                return $this->redirect($this->generateUrl('mark', array('id' => $id)));
            }
        }


        $save_button = $request->get('save');
        if(isset($save_button)) {
            $em = $this->doctrine->getManager();

            foreach ($marks as $subject_name => $subject) {
                foreach ($subject as $mark) {
                    $data = $request->get($mark->getId());
                    if($this->checkMarkValid($data)) {
                        $mark->setValue($data);
                    } else {
                        $this->addFlash('error', 'Mark is not valid');
                    }
                }

                $value = trim($request->get("v_" . $subject_name));
                if($this->checkMarkValid($value)) {
                    $date = $request->get("d_" . $subject_name);
                    if(isset($value) && $value != null) {
                        $new_mark = New Mark();
                        $new_mark->setValue($value);
                        $new_mark->setDate(new \DateTime($date));
                        $new_mark->setTeacher($teacher);

                        foreach($subjects as $user_subject) {
                            if($user_subject->getSubject()->getName() === $subject_name) {
                                $new_mark->setUserSubject($user_subject);
                            }
                        }

                        $em->persist($new_mark);
                    }
                } else if($value != null) {
                    $this->addFlash('error', 'Mark is not valid');
                }
            }

            $em->flush();

            return $this->redirect($this->generateUrl('mark', array('id' => $id)));
        }

        return $this->render('mark/index.html.twig', [
            'marks' => $marks,
            'form' => $form,
            'uid' => $id,
            'avg' => $avg,
            'user' => $user
        ]);
    }

    private function subjectExistUser($user, $subject, $user_subjects): int
    {
        foreach($user_subjects as $s) {
            if($s->getSubject() == $subject) {
                $this->addFlash('error', 'Subject already exist');
                return 1;
            }
        }
        return 0;
    }

    #[Route('/mark/remove/{id?}/{uid?}', 'removeMark')]
    public function removeMark(Request $request): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $id = $request->get('id');
        $uid = $request->get('uid');

        $mark = $this->markRepository->find($id);
        $this->markRepository->remove($mark, true);

        return $this->redirect($this->generateUrl('mark', array('id' => $uid)));
    }

    private function createFormAddSubject(Request $request) {
        $form = $this->createFormBuilder()
            ->add('subject', EntityType::class, [
                'class' => Subject::class
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm()
        ;
        $form->handleRequest($request);

        return $form;
    }

    private function checkMarkValid($value): bool
    {
        if(strlen($value) > 1 && substr($value, 0, 1) == '0') {
            return false;
        }
        if(is_numeric($value) && !str_contains($value, '.') && !str_contains($value, '+') && !str_contains($value, '-')) {
            $value = intval($value);
            if($value >= 0 && $value <= 10) {
                return true;
            }
        } else if($value === 'nv' or $value === 'ni' or $value === 'i') {
            return true;
        }

        return false;
    }
}
