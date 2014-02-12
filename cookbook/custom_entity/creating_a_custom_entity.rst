How to Create a Custom Entity and the Screens to Manage it
==========================================================

.. note::
    The code inside this cookbook entry is visible in src directory, you can clone pim-dev then do a symlink and install

Creating the Entity
-------------------

As Akeneo relies heavily on standard tools like Doctrine, creating the entity is
quite straightforward for any developer with Doctrine experience.

.. literalinclude:: ../../src/Pim/Bundle/IcecatDemoBundle/Entity/Vendor.php
   :language: php
   :lines: 1-8,17-
   :linenos:

.. literalinclude:: ../../src/Pim/Bundle/IcecatDemoBundle/Resources/config/doctrine/Vendor.orm.yml
   :language: yaml
   :prepend: # /src/Pim/Bundle/IcecatDemoBundle/Resources/config/doctrine/Vendor.orm.yml
   :linenos:

Also add parameters for your entity in the DIC :

.. literalinclude:: ../../src/Pim/Bundle/IcecatDemoBundle/Resources/config/entities.yml
   :language: yaml
   :prepend: # /src/Pim/Bundle/IcecatDemoBundle/Resources/config/entities.yml
   :lines: 1,3
   :linenos:

.. note::
    We have added a code attribute in order to get a non technical unique key.
    We already have the id, which is the primary key, but this primary key
    is really dependent of Akeneo, it's an internal id that does not carry any
    meaning for the user. The role of the code is to be a unique identifier
    that will make sense for the user and that will be used with other
    applications.

    In the very case of our manufacturer data, they will certainly come from
    the ERP, with their own code that we will store in this attribute.

Creating the Entity Management Screens
--------------------------------------
The Grid
********

To benefit from the grid component (which comes natively with filtering and sorting), you can define the vendor grid as following :

.. literalinclude:: ../../src/Pim/Bundle/IcecatDemoBundle/Resources/config/datagrid.yml
   :language: yaml
   :prepend: # /src/Pim/Bundle/IcecatDemoBundle/Resources/config/datagrid.yml
   :linenos:


Creating the Form Type for this Entity
**************************************

.. literalinclude:: ../../src/Pim/Bundle/IcecatDemoBundle/Form/Type/VendorType.php
   :language: php
   :lines: 1-8,17-
   :linenos:


Creating the CRUD
*****************

A complete CRUD can be easily obtained by defining a service for its configuration:

.. literalinclude:: ../../src/Pim/Bundle/IcecatDemoBundle/Resources/config/custom_entities.yml
   :language: yaml
   :prepend: # /src/Pim/Bundle/IcecatDemoBundle/Resources/config/custom_entities.yml
   :linenos:

From this point a working grid screen is visible at ``/app_dev.php/enrich/vendor``.

If some vendors are manually added to the database, the pagination will be visible as well.

.. note::
   Have a look at the Cookbook recipe "How to add an menu entry" to add your own link in the menu to this grid.

.. _IcecatDemoBundle: https://github.com/akeneo/IcecatDemoBundle


Creating the Attribute Type
***************************

In order to create a vendor attribute linked to your products, you have to define the vendor attribute type
and its configuration file:

.. literalinclude:: ../../src/Pim/Bundle/IcecatDemoBundle/AttributeType/VendorType.php
   :language: php
   :prepend: # /src/Pim/Bundle/IcecatDemoBundle/AttributeType/VendorType.php
   :linenos:

.. literalinclude:: ../../src/Pim/Bundle/IcecatDemoBundle/Resources/config/attribute_types.yml
   :language: yaml
   :prepend: # /src/Pim/Bundle/IcecatDemoBundle/Resources/config/attribute_types.yml
   :linenos:


Use a vendor column and filter in product grid
..............................................

To add the vendor column in the product grid, you have to define each part (column, filter, sorter)
in a specific file definition ``grid_attribute_types.yml``:

.. literalinclude:: ../../src/Pim/Bundle/IcecatDemoBundle/Resources/config/grid_attribute_types.yml
   :language: yaml
   :prepend: # /src/Pim/Bundle/IcecatDemoBundle/Resources/config/grid_attribute_types.yml
   :linenos:


