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
        ClimateChangeRepository $climaterepository,
        ClimateSNIRepository $snirepository,
        BNPRepository $bnprepository,
        TemperatureRepository $temperaturerep
    ): Response {
        //Retrieve all existing data from tables.
        $climate = $climaterepository
            ->findAll();

        $sni = $snirepository
            ->findAll();

        $bnp = $bnprepository
            ->findAll();

        $temp = $temperaturerep
            ->findAll();

        //Variables for tables.
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
     * Reset tables ClimateChange, BNP, ClimateSNI and Temperature.
     * Re-enter data from csv files using functions: sektion, sni, bnp, temp.
     */
    public function reset(
        ManagerRegistry $doctrine,
    ): Response {
        $entityManager = $doctrine->getManager();

        $this->resetter($entityManager);

        $this->adddata($entityManager);

        return $this->redirectToRoute('project');
    }

    /**
     * Reset tables ClimateChange, BNP, ClimateSNI and Temperature.
     * Error for no parameter for entityManager, found no fitting parameter.
     */
    public function resetter(
        $entityManager,
    ): void {
        $sni = $entityManager->getRepository(ClimateSNI::class)->findAll();
        $climate = $entityManager->getRepository(ClimateChange::class)->findAll();
        $temp = $entityManager->getRepository(Temperature::class)->findAll();
        $bnp = $entityManager->getRepository(BNP::class)->findAll();

        //Remove all rows in tables.
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

        //Telling Doctrine to save everything added to EntityManager.
        $entityManager->flush();
    }

    /**
     * Re-enter data from csv files using functions: sektion, sni, bnp, temp.
     * All data from csv files are added to array to use in functions to tell
     * Doctrine to potenially save.
     * Flushes to execute changes.
     * Error for no parameter for entityManager, found no fitting parameter.
     */
    public function adddata(
        $entityManager,
    ): void {
        //The reason why phpstan error is still left for line 248, 236, 224 and 212
        //is because I found no other way to read csv files without major error.
        // I tried to fix the issue but no other way seems to work for me,
        //with my nowledge so far with php.
        $datamethod = new Data();
        $csvFile = file('../public/data/sektor.csv');
        $data = [];
        foreach ($csvFile as $line) {
            $data[] = str_getcsv($line);
        }

        for ($z = 0; $z <= 8; $z++) {
            $csv = $data[$z];
            $result = $datamethod->sektor($csv);
            $entityManager->persist($result);
        }

        $csvFilesni = file('../public/data/sni.csv');
        $data = [];
        foreach ($csvFilesni as $line) {
            $data[] = str_getcsv($line);
        }

        for ($z = 0; $z <= 9; $z++) {
            $csv = $data[$z];
            $result = $datamethod->sni($csv);
            $entityManager->persist($result);
        }

        $csvFiletemp = file('../public/data/temp.csv');
        $data = [];
        foreach ($csvFiletemp as $line) {
            $data[] = str_getcsv($line);
        }

        for ($z = 0; $z <= 14; $z++) {
            $csv = $data[$z];
            $result = $datamethod->temp($csv);
            $entityManager->persist($result);
        }

        $csvFilebnp = file('../public/data/bnp.csv');
        $data = [];
        foreach ($csvFilebnp as $line) {
            $data[] = str_getcsv($line);
        }

        $result = $datamethod->bnp($data[0]);
        $entityManager->persist($result);

        $entityManager->flush();
    }

    /**
     * @Route("/proj/about",
     * name="project-about")
     */
    public function about(): Response
    {
        return $this->render('project/about.html.twig');
    }
}
