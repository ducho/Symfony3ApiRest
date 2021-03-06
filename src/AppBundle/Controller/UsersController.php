<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpKernel\Exception\HttpException;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class UsersController extends FOSRestController
{
    public function getUsersAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $request->query->get('page', 1);
        $users = $em->getRepository(User::class)->findAllQueryBuilder($page);

        if (!$users) {
            throw new HttpException(400, "Invalid data");
        }

        return $users;
    }

    public function getUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);

        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        return $user;
    }

    public function postUserAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $user;
        }

        throw new HttpException(400, "Invalid data");
    }

    public function putUserAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $form = $this->createForm(UserType::class, $user, array('method' => 'PUT'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($user);
            $em->flush();

            return $user;
        }

        throw new HttpException(400, "Invalid data");
    }

    public function deleteUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $em->remove($user);
        $em->flush();

        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        return $user;
    }
}
