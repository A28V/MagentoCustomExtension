<?php

namespace Custom\Attribute\Model;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class ProductType extends AbstractSource
{
    
    public function getAllOptions(): array
    {
        $this->_options = [
            ['label' => 'Standard', 'value' => '1'],
            ['label' => 'Custom', 'value' => '2'],
        ];
        return $this->_options;
    }
}