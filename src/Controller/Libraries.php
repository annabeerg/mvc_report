<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Library;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\LibraryRepository;

class Libraries extends AbstractController
{
    /**
     * @Route("/library",
     * name="library",
     * methods={"GET","HEAD"}
     * )
     */
    public function allBooks(
        LibraryRepository $LibraryRepository
    ): Response {
        $library = $LibraryRepository
            ->findAll();

        $data = [
            'library' => $library
        ];
        // print_r($products);
        return $this->render('library/library.html.twig', $data);
    }

    /**
     * @Route("/library/new",
     * name="newbook",
     * methods={"GET","HEAD"}
     * )
     */
    public function createLibrary(): Response
    {
        return $this->render('library/addlibrary.html.twig');
    }

    /**
     * @Route(
     *      "/library/new",
     *      name="newbook-process",
     *      methods={"POST"}
     * )
     */
    public function createBook(
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $library = new Library();
        $library->setNamn($_POST['name']);
        $library->setTitel($_POST['title']);
        $library->setISBN($_POST['number']);
        $library->setBild($_POST['picture']);

        // tell Doctrine you want to (eventually) save the library
        // (no queries yet)
        $entityManager->persist($library);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('library');
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
     *  @Route("/library/delete/{id}",
     *  name="delete-book",
     *  methods={"GET","HEAD"}
     * )
     */
    public function deleteBook(
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

        $entityManager->remove($library);
        $entityManager->flush();

        return $this->redirectToRoute('library');
    }
}
