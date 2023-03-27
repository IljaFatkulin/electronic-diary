<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\Subject;
use App\Entity\Teacher;
use App\Entity\Timetable;
use App\Repository\GroupRepository;
use App\Repository\GroupUserRepository;
use App\Repository\TimetableRepository;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'admin_')]

class AdminPanelController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route('/', name: 'panel')]
    public function index(): Response
    {
        return $this->render('admin_panel/index.html.twig');
    }
}
