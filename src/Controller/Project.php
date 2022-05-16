<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ClimateChange;
use App\Entity\ClimateSNI;
use App\Entity\BNP;
use App\Entity\Temperature;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ClimateChangeRepository;
use App\Repository\ClimateSNIRepository;
use App\Repository\BNPRepository;
use App\Repository\TemperatureRepository;

class Project extends AbstractController
{
    /**
     * @Route("/proj",
     * name="project",
     * methods={"GET","HEAD"}
     * )
     */
    public function allclimate(
        ClimateChangeRepository $ClimateRepository,
        ClimateSNIRepository $SNIRepository,
        BNPRepository $bnpRepository,
        TemperatureRepository $TemperatureRepository
    ): Response {
        $climate = $ClimateRepository
            ->findAll();

        $sni = $SNIRepository
        ->findAll();

        $bnp = $bnpRepository
        ->findAll();

        $temp = $TemperatureRepository
        ->findAll();

        $data = [
            'climate' => $climate,
            'sni' => $sni,
            'bnp' => $bnp,
            'temp' => $temp
        ];
        return $this->render('project/home.html.twig', $data);
    }

    /**
     * @Route("/proj/about",
     * name="project-about")
     */
    public function about(): Response
    {
        return $this->render('project/home.html.twig');
    }

    /**
     * @Route("/proj/add",
     * name="climateadd",
     * methods={"GET","HEAD"}
     * )
     */
    public function createdata(): Response
    {
        return $this->render('project/addata.html.twig');
    }

    /**
     * @Route(
     *      "/proj/add",
     *      name="climateadd-process",
     *      methods={"POST"}
     * )
     */
    public function createdataprocess(
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $climate = new ClimateChange();
        $climate->setField($_POST['field']);
        $climate->setEight($_POST['8']);
        $climate->setNine($_POST['9']);
        $climate->setTen($_POST['10']);
        $climate->setEleven($_POST['11']);
        $climate->setTwelve($_POST['12']);
        $climate->setThirteen($_POST['13']);
        $climate->setFourteen($_POST['14']);
        $climate->setFifteen($_POST['15']);
        $climate->setSixteen($_POST['16']);
        $climate->setSeventeen($_POST['17']);

        // tell Doctrine you want to (eventually) save the climate
        // (no queries yet)
        $entityManager->persist($climate);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('project');
    }

    /**
     * @Route("/proj/addsni",
     * name="climateaddsni",
     * methods={"GET","HEAD"}
     * )
     */
    public function createdatasni(): Response
    {
        return $this->render('project/addata.html.twig');
    }



    /**
     * @Route(
     *      "/proj/addsni",
     *      name="climateaddd-process",
     *      methods={"POST"}
     * )
     */
    public function dataprocess(
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $sni = new ClimateSNI();
        $sni->setField($_POST['field']);
        $sni->setEight($_POST['8']);
        $sni->setNine($_POST['9']);
        $sni->setTen($_POST['10']);
        $sni->setEleven($_POST['11']);
        $sni->setTwelve($_POST['12']);
        $sni->setThirteen($_POST['13']);
        $sni->setFourteen($_POST['14']);
        $sni->setFifteen($_POST['15']);
        $sni->setSixteen($_POST['16']);
        $sni->setSeventeen($_POST['17']);

        // tell Doctrine you want to (eventually) save the sni
        // (no queries yet)
        $entityManager->persist($sni);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('climateaddsni');
    }

    /**
     * @Route("/proj/addbnp",
     * name="bnpadd",
     * methods={"GET","HEAD"}
     * )
     */
    public function bnpdata(): Response
    {
        return $this->render('project/addata.html.twig');
    }

    /**
     * @Route(
     *      "/proj/addbnp",
     *      name="bnpadd-process",
     *      methods={"POST"}
     * )
     */
    public function bnpdataprocess(
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $bnp = new BNP();
        $bnp->setField($_POST['field']);
        $bnp->setEight($_POST['8']);
        $bnp->setNine($_POST['9']);
        $bnp->setTen($_POST['10']);
        $bnp->setEleven($_POST['11']);
        $bnp->setTwelve($_POST['12']);
        $bnp->setThirteen($_POST['13']);
        $bnp->setFourteen($_POST['14']);
        $bnp->setFifteen($_POST['15']);
        $bnp->setSixteen($_POST['16']);
        $bnp->setSeventeen($_POST['17']);

        // tell Doctrine you want to (eventually) save the bnp
        // (no queries yet)
        $entityManager->persist($bnp);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('project');
    }


    /**
     * @Route("/proj/addtemp",
     * name="climateaddtemp",
     * methods={"GET","HEAD"}
     * )
     */
    public function createdatatemp(): Response
    {
        return $this->render('project/addatatemp.html.twig');
    }



    /**
     * @Route(
     *      "/proj/addtemp",
     *      name="climateaddtemp-process",
     *      methods={"POST"}
     * )
     */
    public function dataprocesstemp(
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $temp = new Temperature();
        $temp->setMiddleTemp($_POST['middle_temp']);
        $temp->setYear($_POST['year']);

        // tell Doctrine you want to (eventually) save the temp
        // (no queries yet)
        $entityManager->persist($temp);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('climateaddtemp');
    }


    /**
     *  @Route("/library/{id}",
     *  name="book-process",
     *  methods={"GET"}
     * )
     */
    public function book(
        ManagerRegistry $doctrine,
        string $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $library = $entityManager->getRepository(Library::class)->find($id);

        if (!$library) {
            throw $this->createNotFoundException(
                'No library found for id ' . $id
            );
        }

        $data = [
            'library' => $library
        ];

        return $this->render('library/one.html.twig', $data);
    }



    /**
     * @Route("/library/update/{id}",
     * name="update-book",
     * methods={"GET","HEAD"}
     * )
     */
    public function updateBook(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $library = $entityManager->getRepository(Library::class)->find($id);

        if (!$library) {
            throw $this->createNotFoundException(
                'No library found for id ' . $id
            );
        }

        $data = [
            'library' => $library
        ];

        return $this->render('library/libraryupdate.html.twig', $data);
    }

    /**
     *  @Route("/library/update/{id}",
     *  name="update-book-process",
     *  methods={"POST"}
     * )
     */
    public function updatesBook(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $library = $entityManager->getRepository(Library::class)->find($id);

        if (!$library) {
            throw $this->createNotFoundException(
                'No library found for id' . $id
            );
        }

        $library->setNamn($_POST['name']);
        $library->setTitel($_POST['title']);
        $library->setISBN($_POST['number']);
        $library->setBild($_POST['picture']);
        $entityManager->flush();

        return $this->redirectToRoute('library');
    }


    /**
     *  @Route("/proj/delete/{id}",
     *  name="delete-bnp",
     *  methods={"GET","HEAD"}
     * )
     */
    public function deleteBook(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $library = $entityManager->getRepository(ClimateChange::class)->find($id);

        if (!$library) {
            throw $this->createNotFoundException(
                'No library found for id' . $id
            );
        }

        $entityManager->remove($library);
        $entityManager->flush();

        return $this->redirectToRoute('library');
    }
}
