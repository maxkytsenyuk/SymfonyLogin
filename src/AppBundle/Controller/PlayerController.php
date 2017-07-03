<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 7/3/2017
 * Time: 2:18 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Player;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayerController extends Controller
{
    /**
     * @Route("/homepage")
     */
public function showAction(){

    return $this ->render('player/show.html.twig',[
        'username' => $this->getUser()

    ]);

}
    /**
     * @Route("/list", name="list")
     */
    public function listAction(){

    $players= $this->getDoctrine()->getRepository('AppBundle:Player')->FindAll();

    return $this ->render('player/list.html.twig',[
        'players' => $players

    ]);
    }
    /**
     * @Route("/cud", name="cud")
     */
    public function cudAction(){


        return $this ->render('player/cud.html.twig');
    }

    /**
     * @Route("/addinfo", name="addinfo")
     * @Method("POST")
     */
    public function addinfoAction(Request $request){


        $em = $this->getDoctrine()->getManager();

        $player = new Player();
        $player->setName($request->request->get('name1'));
        $player->setSurname($request->request->get('surname'));
        $player->setTeam($request->request->get('team'));
        $player->setAge($request->request->get('age'));
        $em->persist($player);

        $em->flush();

        return $this->redirecttoRoute('list');

    }
    /**
     * @Route("/update", name="update")
     * @Method("POST")
     */
    public function updateinfoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $player = $em->getRepository('AppBundle:Player')->find($request->request->get('player_id'));

        $pid = $request->request->get('player_id');

        $player->setName($request->request->get('name_u'));

        $player->setSurname($request->request->get('surname_u'));

        $player->setTeam($request->request->get('team_u'));

        $player->setAge($request->request->get('age_u'));

        $em->flush();

        return $this->redirectToRoute('list');

    }
    /**
     * @Route("/delete", name="delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $player = $em->getRepository('AppBundle:Player')->find($request->request->get('player_id_d'));

        $em->remove($player);

        $em->flush();

        return $this->redirectToRoute('list');

    }
}