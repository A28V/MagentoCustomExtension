Magento Assignment - Backend Developer
Create a Magento extension having below features
1) Create a custom drop down attribute named ‘Product Type’ having
values ‘Standard’, ‘Custom’. Default value should be standard.
2) If the attribute value selected for product is ‘Custom’, product image
should be replaced with image from URL
https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg
3) Create a custom Restful API with endpoint /v1/set-product-type which
will set custom attribute value for product based on its SKU.
4) Upload the assignment on Github or Bitbucket and provide the url for
repository. (Kindly keep the repository public)

Installation

Download the extension files or clone the repository.
Upload the extension files to your Magento installation directory in the app/code directory.
Run the following command from your Magento root directory to enable the extension:
php bin/magento module:enable Custom_Attribute
php bin/magento setup:upgrade
php bin/magento cache:flush


Once the extension is installed, you can use the following features:
1. Custom Dropdown Attribute
2. Replace Product Image
When editing a product in the Magento admin panel, set the "Product Type" attribute value to "Custom". The product image will automatically be replaced with a predefined image from the provided URL.
3. Custom RESTful API
The extension provides a custom RESTful API endpoint /rest/V1/set-product-type to set the "Product Type" attribute value for a product based on its SKU. You can make POST requests to this endpoint with the SKU and desired product type.
