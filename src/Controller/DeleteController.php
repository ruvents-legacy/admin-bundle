<?php

namespace Ruvents\AdminBundle\Controller;

use Ruvents\AdminBundle\Config\Model\EntityConfig;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteController extends AbstractController
{
    /**
     * @param string       $id
     * @param EntityConfig $entityConfig
     * @param Request      $request
     *
     * @return Response
     */
    public function __invoke(string $id, EntityConfig $entityConfig, Request $request): Response
    {
        if (!$entityConfig->delete->enabled) {
            return $this->redirectToList($entityConfig->name);
        }

        $class = $entityConfig->class;
        $manager = $this->getEntityManager($class);

        if ($attributes = $entityConfig->edit->requiresGranted) {
            $this->denyAccessUnlessGranted($attributes, $class);
        }

        $entity = $manager->find($class, $id);

        if (null === $entity) {
            throw $this->createNotFoundException();
        }

        $manager->remove($entity);
        $manager->flush();

        return $this->redirectToList($entityConfig->name);
    }
}
