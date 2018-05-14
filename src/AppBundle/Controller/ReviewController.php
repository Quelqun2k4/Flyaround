<?php
/**
 * Created by PhpStorm.
 * User: thibault1serre
 * Date: 14/05/18
 * Time: 16:09
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Review controller.
 *
 * @Route("review")
 */
class ReviewController extends Controller
{

    /**
     *  @Route("/", name="review_index")
     */
    public function indexAction()
    {
        return $this->render('review\index.html.twig', array(
        ));
    }
    /**
     * @Route("/new", name="review_new")
     */
    public function newAction()
    {
        return $this->render('review\new.html.twig', array(
        ));
    }
}