<?php
namespace Custom\Attribute\Model;

use Custom\Attribute\Api\ProductTypeSetterInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

class ProductTypeSetter implements ProductTypeSetterInterface
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function setProductType($sku, $productType)
    {
        try {
            $product = $this->productRepository->get($sku);
            $product->setData('product_type', $productType);
            $this->productRepository->save($product);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
