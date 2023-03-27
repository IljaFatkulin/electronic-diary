<?php

namespace App\Controller;

use App\Entity\Timetable;
use App\Entity\User;
use App\Repository\GroupRepository;
use App\Repository\GroupUserRepository;
use App\Repository\TimetableRepository;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TimetableController extends AbstractController
{
    private ?string $filterDate = null;
    private ?string $group = null;
    public function __construct(private ManagerRegistry $doctrine, private UserRepository $userRepository, private TimetableRepository $timetableRepository, private GroupUserRepository $groupUserRepository, private GroupRepository $groupRepository) {}

    #[Route('/timetable/{group?}', name: 'timetable')]
    public function index(Request $request): Response
    {
        if(!isset($this->filterDate)) {
            $filterDate = new DateTime();
        } else {
            $filterDate = new DateTime($this->filterDate);
        }

        if($this->group != null) {
            $group_name = $this->group;
        } else {
            $group_name = $request->get('group');
        }

        if(isset($group_name))   {
            $group = $this->groupRepository->findOneBy(['name' => $group_name]);
        } else {
            $id = $this->getUser()->getId();
            $user = $this->userRepository->find($id);
            $group = $this->groupUserRepository->findOneBy(['user' => $user]);
            if($group != null) {
                $group = $group->getGroup();
                $group_name = $group->getName();
            }
        }

        if($group == null) {
            $this->addFlash('error', 'Group not found');
        }

        date_default_timezone_set("Europe/Riga");
        $todayDate = date("Y-m-d");

        $lessons = (array) null;

        $start = $this->weekStartDate(new DateTime($filterDate->format('Y-m-d')));
        $end = $this->weekEndDate(new DateTime($filterDate->format('Y-m-d')));

        $allLessons = $this->timetableRepository->selectSorted($group, $start, $end);


        for($i = $start; $i <= $end; $i->modify('+1 day')){
            if($i->format('l') != 'Saturday' && $i->format('l') != 'Sunday') {
                $date = $i->format("l, F d");
                $lessons[$date] = [];
            }
        }

        foreach ($allLessons as $lesson) {
            $date = $lesson->getDate();
            $date = $date->format('l, F d');
            if(!array_key_exists($date, $lessons)) {
                $lessons[$date] = [];
            }
            $lessons[$date][] = $lesson;
        }

        $prev = $request->get('prev');
        if(isset($prev)) {
            $tmp = new DateTime($this->filterDate);
            $tmp->modify('-7 day');
            unset($prev);
            $this->index($request);
        }

        if($this->filterDate != null or $this->filterDate != '') {
            $currentDate = $this->filterDate;
        } else {
            $currentDate = date('Y-m-d');
        }

        return $this->render('timetable/index.html.twig', [
            'days' => $lessons,
            'date' => $currentDate,
            'group' => $group_name
        ]);
    }

    #[Route('/timetable/{date?}/{action?}/{group?}', name: 'timetable_filter')]
    public function timetableFilter(Request $request): Response
    {
        $date = $request->get('date');
        $action = $request->get('action');
        $group = $request->get('group');

        if(isset($action)) {
            $date = new DateTime($date);

            if($action === '+') {
                $date->modify('+7 days');
            } else if($action === '-') {
                $date->modify('-7 days');
            }
        }

        if(isset($date)) {
            $this->filterDate = $date->format('Y-m-d');;
        }

        if(isset($group)) {
            $this->group = $group;
        }

        return $this->index($request);
    }

    private function weekStartDate(DateTime $date): DateTime
    {
        $day = $date->format('w');
        if($day == 0) $day = 7;
        $interval = \DateInterval::createFromDateString(-($day)+1 . 'day');
        return date_add($date, $interval);
    }

    private function weekEndDate(DateTime $date): DateTime
    {
        $day = $date->format('w');
        if($day == 0) $day = 7;
        $interval = \DateInterval::createFromDateString(5-$day . 'day');
        return date_add($date, $interval);
    }
}
