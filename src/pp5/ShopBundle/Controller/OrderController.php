<?php

namespace pp5\ShopBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use pp5\ShopBundle\Entity\Order;


class OrderController extends Controller {

    /**
     * Order movie
     *
     * @param $id integer
     */
    public function orderAction($id) {
        $repository = $this->getDoctrine()->getRepository('pp5ShopBundle:Movie');
        $movie = $repository->findOneById($id);
        if ( !$movie ) {
            return $this->redirect($this->generateUrl('pp5_shop_movie_list'));
        }

        $order = new Order();
        $order->setMovie($movie);
        $order->setUser($this->getUser());
        $order->setPrice($movie->getPrice());
        $order->setStatus(0);
        $em = $this->getDoctrine()->getManager();
        $em->persist($order);
        $em->flush();

        return $this->render('pp5ShopBundle:Order:order.html.twig', array(
                'order' => $order)
        );
    }


}
