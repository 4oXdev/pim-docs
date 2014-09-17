<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Oro\Bundle\DistributionBundle\OroKernel;

class AppKernel extends OroKernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        $bundles = array();

        if (in_array($this->getEnvironment(), array('dev', 'test', 'behat'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }
        $bundles = array_merge(parent::registerBundles(), $bundles);

        $pimDepBundles = array(
            // Uncomment the following line to use MongoDB implementation
            // new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),
            new APY\JsFormValidationBundle\APYJsFormValidationBundle(),
            new Akeneo\Bundle\MeasureBundle\AkeneoMeasureBundle()
        );
        $bundles = array_merge($bundles, $pimDepBundles);

        $pimBundles = array(
            // BAP overriden bundles
            new Pim\Bundle\NavigationBundle\PimNavigationBundle(),
            new Pim\Bundle\FilterBundle\PimFilterBundle(),
            new Pim\Bundle\UserBundle\PimUserBundle(),
            new Pim\Bundle\SearchBundle\PimSearchBundle(),
            new Pim\Bundle\JsFormValidationBundle\PimJsFormValidationBundle(),

            // PIM bundles
            new Pim\Bundle\DataGridBundle\PimDataGridBundle(),
            new Pim\Bundle\DashboardBundle\PimDashboardBundle(),
            new Pim\Bundle\InstallerBundle\PimInstallerBundle(),
            new Pim\Bundle\UIBundle\PimUIBundle(),
            new Pim\Bundle\CatalogBundle\PimCatalogBundle(),
            new Pim\Bundle\TranslationBundle\PimTranslationBundle(),
            new Pim\Bundle\ImportExportBundle\PimImportExportBundle(),
            new Pim\Bundle\VersioningBundle\PimVersioningBundle(),
            new Pim\Bundle\CustomEntityBundle\PimCustomEntityBundle(),
            new Pim\Bundle\WebServiceBundle\PimWebServiceBundle(),
            new Pim\Bundle\EnrichBundle\PimEnrichBundle(),
            new Pim\Bundle\BaseConnectorBundle\PimBaseConnectorBundle(),
            new Pim\Bundle\TransformBundle\PimTransformBundle(),
            new Pim\Bundle\CommentBundle\PimCommentBundle(),
        );

        $bundles = array_merge($bundles, $pimBundles);

        // Add my own bundles
        $bundles[] = new Acme\Bundle\InstallerBundle\AcmeInstallerBundle();

        return $bundles;
    }
}
