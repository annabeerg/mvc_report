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
use App\Project\Data;

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
     * @Route("/proj/reset",
     * name="reset",
     * methods={"GET","HEAD"}
     * )
     */
    public function removesni(ManagerRegistry $doctrine,
): Response {
    $entityManager = $doctrine->getManager();
    $sni = $entityManager->getRepository(ClimateSNI::class)->findAll();
    $climate = $entityManager->getRepository(ClimateChange::class)->findAll();
    $temp = $entityManager->getRepository(Temperature::class)->findAll();
    $bnp = $entityManager->getRepository(BNP::class)->findAll();

    foreach ($sni as $entity) {
        $entityManager->remove($entity);
    }

    foreach ($climate as $entity) {
        $entityManager->remove($entity);
    }

    foreach ($temp as $entity) {
        $entityManager->remove($entity);
    }

    foreach ($bnp as $entity) {
        $entityManager->remove($entity);
    }

    $csvFile = file('../public/data/sektor.csv');
    $data = [];
    foreach ($csvFile as $line) {
        $data[] = str_getcsv($line);
    }

    $x = 0;
    for ($z = 0; $z <= 8; $z++) {
        $csv = $data[$z];
        $result = $this->sektor($csv);

        // tell Doctrine you want to (eventually) save the sni
        // (no queries yet)
        $entityManager->persist($result);
    }

    $csvFilesni = file('../public/data/sni.csv');
    $data = [];
    foreach ($csvFilesni as $line) {
        $data[] = str_getcsv($line);
    }

    $x = 0;
    for ($z = 0; $z <= 9; $z++) {
        $csv = $data[$z];
        $result = $this->sni($csv);

        // tell Doctrine you want to (eventually) save the sni
        // (no queries yet)
        $entityManager->persist($result);
    }

    $csvFiletemp = file('../public/data/temp.csv');
    $data = [];
    foreach ($csvFiletemp as $line) {
        $data[] = str_getcsv($line);
    }

    $x = 0;
    for ($z = 0; $z <= 14; $z++) {
        $csv = $data[$z];
        $result = $this->temp($csv);

        // tell Doctrine you want to (eventually) save the sni
        // (no queries yet)
        $entityManager->persist($result);
    }

    $csvFilebnp = file('../public/data/bnp.csv');
    $data = [];
    foreach ($csvFilebnp as $line) {
        $data[] = str_getcsv($line);
    }

    $result = $this->bnp($data[0]);
    $entityManager->persist($result);

    // actually executes the queries (i.e. the INSERT query)
    $entityManager->flush();

    return $this->redirectToRoute('project');
    }


    public function sektor($csv) {
        $sektor = new ClimateSNI();
        $sektor->setField($csv[0]);
        $sektor->setEight($csv[1]);
        $sektor->setNine($csv[2]);
        $sektor->setTen($csv[3]);
        $sektor->setEleven($csv[4]);
        $sektor->setTwelve($csv[5]);
        $sektor->setThirteen($csv[6]);
        $sektor->setFourteen($csv[7]);
        $sektor->setFifteen($csv[8]);
        $sektor->setSixteen($csv[9]);
        $sektor->setSeventeen($csv[10]);

        return $sektor;
    }

    public function sni($csv) {
        $sni = new ClimateChange();
        $sni->setField($csv[0]);
        $sni->setEight($csv[1]);
        $sni->setNine($csv[2]);
        $sni->setTen($csv[3]);
        $sni->setEleven($csv[4]);
        $sni->setTwelve($csv[5]);
        $sni->setThirteen($csv[6]);
        $sni->setFourteen($csv[7]);
        $sni->setFifteen($csv[8]);
        $sni->setSixteen($csv[9]);
        $sni->setSeventeen($csv[10]);

        return $sni;
    }

    public function bnp($csv) {
        $bnp = new BNP();
        $bnp->setField($csv[0]);
        $bnp->setEight($csv[1]);
        $bnp->setNine($csv[2]);
        $bnp->setTen($csv[3]);
        $bnp->setEleven($csv[4]);
        $bnp->setTwelve($csv[5]);
        $bnp->setThirteen($csv[6]);
        $bnp->setFourteen($csv[7]);
        $bnp->setFifteen($csv[8]);
        $bnp->setSixteen($csv[9]);
        $bnp->setSeventeen($csv[10]);

        return $bnp;
    }

    public function temp($csv) {
        $temp = new Temperature();
        $temp->setYear($csv[0]);
        $temp->setMiddleTemp($csv[1]);

        return $temp;
    }

    /**
     * @Route("/proj/about",
     * name="project-about")
     */
    public function about(): Response
    {
        return $this->render('project/home.html.twig');
    }
}
