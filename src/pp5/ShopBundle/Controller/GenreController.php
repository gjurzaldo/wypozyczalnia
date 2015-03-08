<?php

namespace pp5\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GenreController extends Controller {

    /**
     * Display all genres
     */
    public function allGenresAction() {
        $repository = $this->getDoctrine()
            ->getRepository('pp5ShopBundle:Genre');
        $genres = $repository->findAll();

        return $this->render('pp5ShopBundle:Genre:list.html.twig', array(
            'genres' => $genres
        ));
    }

    /**
     * Display movies from specified genre
     *
     * @param $id integer
     */
    public function displayGenreAction($id) {
        $repository = $this->getDoctrine()
            ->getRepository('pp5ShopBundle:Genre');
        $genre = $repository->findOneById($id);

        return $this->render('pp5ShopBundle:Genre:movies.html.twig', array(
            'genre' => $genre
        ));
    }
}
