<?php

namespace pp5\ShopBundle\Controller;

use pp5\ShopBundle\Entity\Review;
use pp5\ShopBundle\Form\ReviewType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use pp5\ShopBundle\Entity\Movie;


class MovieController extends Controller {

    /**
     * Display all movies
     */
    public function allMoviesAction() {
        $repository = $this->getDoctrine()
            ->getRepository('pp5ShopBundle:Movie');
        $movies = $repository->findAll();

        return $this->render('pp5ShopBundle:Movie:list.html.twig', array(
            'movies' => $movies
        ));
    }

    /**
     * Display single movie
     *
     * @param $slug string
     */
    public function displayAction($id, Request $request) {
        $repository = $this->getDoctrine()->getRepository('pp5ShopBundle:Movie');
        $movie = $repository->findOneById($id);
        if ( !$movie ) {
            return $this->redirect($this->generateUrl('pp5_shop_movie_list'));
        }

        $review = new Review();

        $form = $this->createForm(new ReviewType(), $review);
        $form->handleRequest($request);
        if ( $request->isMethod('POST') && $form->isValid()) {
            $review->setMovie($movie);
            $review->setCreatedAt(new \DateTime());
            $review->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();
            return $this->redirect($this->generateUrl('pp5_shop_movie_display', array(
                'id' => $movie->getId()
            )));
        }
        return $this->render('pp5ShopBundle:Movie:display.html.twig', array(
                'form' => $form->createView(),
                'movie' => $movie)
        );
    }

}
