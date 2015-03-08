<?php

namespace pp5\ShopBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use pp5\ShopBundle\Entity\Order;


class UserController extends Controller {

    /**
     * All user orders
     */
    public function userOrdersAction() {
        $user = $this->getUser();
        return $this->render('pp5ShopBundle:User:orders.html.twig', array(
            'user' => $user
        ));
    }


}
