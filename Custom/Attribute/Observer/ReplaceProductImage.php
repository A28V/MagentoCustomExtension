<?php
namespace Custom\Attribute\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductRepository;

class ReplaceProductImage implements ObserverInterface
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $originalProductData = $product->getOrigData();

        if (!$product->getOrigData('product_type') || (isset($originalProductData['product_type']) && $product->getData('product_type') !== $originalProductData['product_type'])) {
            if ($product->getData('product_type') == '2') {
                $_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                $mediaDir = $_objectManager->get('Magento\Framework\App\Filesystem\DirectoryList')->getPath('media');

                $customDir = $mediaDir . '/custom';
                if (!is_dir($customDir)) {
                    mkdir($customDir, 0777, true); 
                }
                $imageUrl = 'https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg'; 

                $localImagePath = $customDir . '/' . basename($imageUrl);
                file_put_contents($localImagePath, file_get_contents($imageUrl));
                
                try {
                    $product->addImageToMediaGallery($localImagePath, ['image', 'small_image', 'thumbnail'], false, false);
                    $this->productRepository->save($product); // Save the product again with the image
                } catch (\Exception $e) {
                    echo $e->getMessage();
                    //die;
                }
            }
        }
    }
}
