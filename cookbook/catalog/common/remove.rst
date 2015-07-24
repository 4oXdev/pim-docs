How to Remove Non-Product Objects
=================================

To remove one or many objects, we provide a dedicated service which provides methods 'remove' and 'removeAll' through the implementation of ``Akeneo\Component\StorageUtils\Remover\RemoverInterface`` and ``Akeneo\Component\StorageUtils\Remover\BulkRemoverInterface``.

Use the Remover to Remove a Single Object
-----------------------------------------

You can remove one or many objects of a kind with a dedicated service, the remover checks that the used object is supported (for instance, you can't use the attribute remover to remove a family).

We define these different services to ease the future changes and allow you to override only one of them to add a specific business logic.

Some services already use specific classes but most of these services use the class ``Akeneo\Bundle\StorageUtilsBundle\Doctrine\Common\Remover\BaseRemover``.

.. code-block:: php

    $attributeRemover = $this->getContainer()->get('pim_catalog.remover.attribute');
    $attributeRemover->remove($attribute);

    $familyRemover = $this->getContainer()->get('pim_catalog.remover.family');
    $familyRemover->remove($family);

    $categoryRemover = $this->getContainer()->get('pim_catalog.remover.category');
    $categoryRemover->remove($category);

Use the Remover to Remove many Objects
----------------------------------

.. code-block:: php

    $attributeRemover = $this->getContainer()->get('pim_catalog.remover.attribute');
    $attributeRemover->removeAll([$attributeOne, $attributeTwo]);

    $familyRemover = $this->getContainer()->get('pim_catalog.remover.family');
    $familyRemover->removeAll([$familyOne, $familyTwo]);

    $categoryRemover = $this->getContainer()->get('pim_catalog.remover.category');
    $categoryRemover->removeAll([$categoryOne, $categoryTwo]);
