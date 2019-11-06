<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Context;

use EasyCorp\Bundle\EasyAdminBundle\Configuration\AssetCollection;
use EasyCorp\Bundle\EasyAdminBundle\Configuration\CrudConfig;
use EasyCorp\Bundle\EasyAdminBundle\Configuration\DetailPageConfig;
use EasyCorp\Bundle\EasyAdminBundle\Configuration\EntityConfig;
use EasyCorp\Bundle\EasyAdminBundle\Configuration\FormPageConfig;
use EasyCorp\Bundle\EasyAdminBundle\Configuration\IndexPageConfig;
use EasyCorp\Bundle\EasyAdminBundle\Dashboard\DashboardControllerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Menu\MenuProviderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * A context object that stores all the config about the current dashboard and resource.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
final class ApplicationContext
{
    public const ATTRIBUTE_KEY = 'easyadmin_context';

    private $request;
    private $dashboard;
    private $menu;
    private $assetCollection;
    private $crudConfig;
    private $pageConfig;
    private $entity;
    private $entityConfig;

    public function __construct(Request $request, DashboardControllerInterface $dashboard, MenuProviderInterface $menu, AssetCollection $assetCollection, ?CrudConfig $crudConfig, $pageConfig, ?EntityConfig $entityConfig, $entity)
    {
        $this->request = $request;
        $this->dashboard = $dashboard;
        $this->menu = $menu;
        $this->assetCollection = $assetCollection;
        $this->crudConfig = $crudConfig;
        $this->pageConfig = $pageConfig;
        $this->entityConfig = $entityConfig;
        $this->entity = $entity;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getDashboard(): DashboardControllerInterface
    {
        return $this->dashboard;
    }

    public function getMenu(): MenuProviderInterface
    {
        return $this->menu;
    }

    public function getAssets(): AssetCollection
    {
        return $this->assetCollection;
    }

    public function getCrudConfig(): ?CrudConfig
    {
        return $this->crudConfig;
    }

    /**
     * @return IndexPageConfig|DetailPageConfig|FormPageConfig|null
     */
    public function getPageConfig()
    {
        return $this->pageConfig;
    }

    /**
     * @return object|null
     */
    public function getEntity()
    {
        return $this->entity;
    }

    public function getEntityConfig(): ?EntityConfig
    {
        return $this->entityConfig;
    }

    public function getDashboardRouteName(): string
    {
        return $this->request->attributes->get('_route');
    }
}