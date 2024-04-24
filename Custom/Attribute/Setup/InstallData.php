<?php
namespace Custom\Attribute\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Catalog\Model\Product\Type;
class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {  try{
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
         $productTypes = implode(',', [Type::TYPE_SIMPLE, Type::TYPE_VIRTUAL]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'product_type',
            [
            'type' => 'int',
            'backend' => '',
            'frontend' => '',
            'label' => 'Product Type',
            'input' => 'select',
            'class' => '',
            'source' => \Custom\Attribute\Model\ProductType::class, 
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'visible' => true,
            'required' => false,
            'user_defined' => false,
            'default' => '1',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => true,
            'used_in_product_listing' => true,
            'unique' => false,
            'apply_to' => $productTypes,
			'group' => 'General',
            'attribute_set_id' => 'Default',
            ]
        );
	}catch(\Exception $e){
		
	}
    }
}
