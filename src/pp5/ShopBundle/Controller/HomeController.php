<?php

namespace pp5\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    /**
     * Homepage, display last added movies
     */
    public function indexAction() {
        $repository = $this->getDoctrine()->getRepository('pp5ShopBundle:Movie');
        $movies = $repository->findByLastAdded(3);
        $mostCommented = $repository->findByMostCommented(3);
        $mostPopular = $repository->findByPopular(3);


        return $this->render('pp5ShopBundle:Home:index.html.twig', array(
            'movies' => $movies,
            'mostCommented' => $mostCommented,
            'mostPopular' => $mostPopular
        ));
    }
}
