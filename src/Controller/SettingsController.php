<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class SettingsController extends AppController
{
    
 public $helpers = ['Form'];
    public function initialize()
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    $this->loadComponent('Auth');
    $this->Auth->allow('index');
}
 

public function index(){

$this->viewBuilder()->layout('webservice');
$dir = $this->request->scheme().'://'.$this->request->host().$this->request->webroot;


 

 // User Registration    
    $indexInfo['description'] = "User Registration (post method) - User Registration";
		$indexInfo['url'] = $dir."Users/app_registration.json";
		$indexInfo['parameters'] = '
		username - User Name (Required) <br>
		password - User Password (Required)<br>
		emailid - Email id<br>
		device_token - Device Token for push Notification<br>
		device_type - 1/2 (1-iPhone, 2-Android)
		';
		
		$indexInfo['output'] = '<b>Success</b><pre>	
        {
            "message": {
                "error": "0",
                "response": "user registered successfully"
            }
        }
		</pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Sorry,Please try later"}]</pre>
		';
		$indexarr[] = $indexInfo;
        
        
// User Login 
		$indexInfo['description'] = "User Login (post method) - User Login";
		$indexInfo['url'] = $dir."Users/app_login.json";
		$indexInfo['parameters'] = '
		username - Username(Required) <br>
		password - User Password (Required)<br>
		device_token - Device Token for push Notification<br>
		device_type - 1/2 (1-iPhone, 2-Android)<br>
		';
		
		$indexInfo['output'] = '<b>Success</b><pre>
        {
            "message": {
                "error": "0",
                "detail": {
                    "id": 41,
                    "username": "tester123",
                    "image": null
                },
                "response": "Successfully logged in...."
            }
        }
                </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Sorry,Please try later"}]</pre>
		';
		$indexarr[] = $indexInfo;
        
        
// User Login-Logout 
		$indexInfo['description'] = "User Logout (post method) - User Logout";
		$indexInfo['url'] = $dir."Users/app_logout.json";
		$indexInfo['parameters'] = '
		id - User id(Required) ';
		$indexInfo['output'] = '<b>Success</b><pre>
            {
                "message": {
                    "error": "0",
                    "response": "User logout successfully"
                }
            }
                </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Sorry,Please try later"}]</pre>
		';
		$indexarr[] = $indexInfo;
        
// User Update Profile
		$indexInfo['description'] = "User Profile Update (post method) - User Profile Update";
		$indexInfo['url'] = $dir."Users/app_update_profile.json";
		$indexInfo['parameters'] = '
	id - User id(Required)<br>
        firstname - User Firstname(Optional)<br>
        lastname - User Lastname(Optional)<br>
        username - Username(Optional)<br>	
	emailid - User Email id(Optional)<br>
     	phone_code  - User Phone Code (Optional)<br>
        phone - User Phone(Optional)<br>
        image - User Image(Optional)<br>
        address_line1 - User Address Line1(Optional)<br>
        address_line2 - User Address Line2(Optional)<br>
        city - User City(Optional)<br>
        country - User Country(Optional)<br>
        postal_code - User Postal Code(Optional)<br>
        device_token - User Device Token(Optional)<br>';
		$indexInfo['output'] = '<b>Success</b><pre>
        {
             "message": {
                 "error": "0",
                 "response": "Record updated successfully"
             }
         }
                </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Sorry,Please try later"}]</pre>
		';
		$indexarr[] = $indexInfo;
		
		
		// User Forgot Password
		$indexInfo['description'] = "User Forgot Password (post method) - User Forgot Password";
		$indexInfo['url'] = $dir."Users/app_forgot_password.json";
		$indexInfo['parameters'] = '
								emailid - Email id(Required)<br>
								Or<br>
        username - User name(Required)<br>';

		$indexInfo['output'] = '<b>Success</b><pre>
 {
    "message": {
        "error": "0",
        "response": "Your request has been submitted.we will send you an email shortly. Thank you."
    }
}
                </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"User not found"}]</pre>
		';
		$indexarr[] = $indexInfo;
   
      
    //Product Listing per brand
    $indexInfo['description'] = "Social Login (post method)";
		$indexInfo['url'] = $dir."users/app_social_login.json";
		$indexInfo['parameters'] = 'social_id - Social id(Required)<br>
        social_type - Social Type(Required)<br>
        emailid - Email id(Required)<br>
        device_token - device_token(Required)<br>
        device_type - Device Type(Required)<br>
        firstname - Firstname(Optional)<br>
        lastname - Lastname(Optional)<br>
        ';
		$indexInfo['output'] = '<b>Success</b><pre>
{
    "message": {
        "error": "0",
        "response": "user registered successfully",
        "UserInfo": {
            "id": 53,
            "social_id": "social5432100",
            "social_type": "facebook",
            "firstname": "",
            "lastname": "",
            "username": "social5432100",
            "emailid": "",
            "phone": "",
            "role": 3,
            "image": "",
            "address_line1": "",
            "address_line2": "",
            "city": "",
            "country": "",
            "postal_code": "",
            "signupdate": "",
            "status": 1,
            "device_token": "12345",
            "device_type": 1
        }
    }
}  
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Record not found,try later"}]</pre>
		';
		$indexarr[] = $indexInfo;
        
      
    // Brands listing
		$indexInfo['description'] = "Brands Listing(post method)";
		$indexInfo['url'] = $dir."products/app_brand_listing.json";
		$indexInfo['parameters'] = ' ';
		$indexInfo['output'] = '<b>Success</b><pre>
{"message":{
"error":"0",
"response":[{"id":2,"name":"brand1","type":"brand"},
            {"id":12,"name":"brand2","type":"brand"}]}
            }
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Record not found,try later"}]</pre>
		';
		$indexarr[] = $indexInfo;   
    
    //Product Listing per brand
    $indexInfo['description'] = "Product List per brand (post method)";
		$indexInfo['url'] = $dir."products/app_show_product.json";
		$indexInfo['parameters'] = 'brandid - Brand id(Required)<br>';
		$indexInfo['output'] = '<b>Success</b><pre>
{
    "message": {
        "error": "0",
        "response": "Product Listing",
        "listing": [
            {
                "id": 69,
                "product_name": "pro13",
                "brand_id": 2,
                "images": [
                    {
                        "id": 3,
                        "product_id": 69,
                        "image": "14664129530.jpg"
                    },
                    {
                        "id": 10,
                        "product_id": 69,
                        "image": "14665050730.png"
                    }
                ]
            },
            {
                "id": 70,
                "product_name": "pro13",
                "brand_id": 2,
                "images": [
                    {
                        "id": 4,
                        "product_id": 70,
                        "image": "14664135920.jpg"
                    }
                ]
            },
            {
                "id": 72,
                "product_name": "pro13",
                "brand_id": 2,
                "images": [
                    {
                        "id": 6,
                        "product_id": 72,
                        "image": "14664226260.png"
                    }
                ]
            },
            {
                "id": 74,
                "product_name": "pro1313",
                "brand_id": 2,
                "images": [
                    {
                        "id": 8,
                        "product_id": 74,
                        "image": "14665022040."
                    }
                ]
            },
            {
                "id": 75,
                "product_name": "newpro1313",
                "brand_id": 2,
                "images": [
                    {
                        "id": 9,
                        "product_id": 75,
                        "image": "14665026990."
                    }
                ]
            },
            {
                "id": 76,
                "product_name": "vcxv12",
                "brand_id": 2,
                "images": []
            },
            {
                "id": 77,
                "product_name": "vcxv12",
                "brand_id": 2,
                "images": []
            },
            {
                "id": 91,
                "product_name": "pro1",
                "brand_id": 2,
                "images": [
                    {
                        "id": 11,
                        "product_id": 91,
                        "image": "14665086540.png"
                    }
                ]
            }
        ],
        "TotalRecord": 8,
        "TotalPageCount": 1,
        "CurrentPage": 1
    }
}
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Record not found,try later"}]</pre>
		';
		$indexarr[] = $indexInfo;
        
          
     //Homepage Banner
    $indexInfo['description'] = "Homepage Page Api (post method)";
		$indexInfo['url'] = $dir."products/app_homepage.json";
		$indexInfo['parameters'] = '';
		$indexInfo['output'] = '<b>Success</b><pre>
       {
    "message": {
        "error": "0",
        "banner": {
            "page_banner1": "http:\/\/sgappstore.com\/\/DBR\/img\/product\/2016-06-29-08-59-21_57738de94032f.jpg",
            "page_banner2": "http:\/\/sgappstore.com\/\/DBR\/img\/product\/2016-06-29-07-45-47_57737cabb03d0.jpg",
            "page_banner3": "http:\/\/sgappstore.com\/\/DBR\/img\/product\/2016-06-29-07-46-26_57737cd29b275.jpg"
        },
        "showSalesClearanceProduct": [
            {
                "id": 91,
                "product_name": "pro1",
                "price": 13,
                "image": ""
            },
            {
                "id": 90,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 89,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 88,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 87,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 86,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 85,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 84,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 83,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 82,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            }
        ],
        "showLatestProduct": [
            {
                "id": 91,
                "product_name": "pro1",
                "price": 13,
                "image": ""
            },
            {
                "id": 90,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 89,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 88,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 87,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 86,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 85,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 84,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 83,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            },
            {
                "id": 82,
                "product_name": "newpro435",
                "price": 233,
                "image": ""
            }
        ]
    }
}
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Record not found"}]</pre>
		';
		$indexarr[] = $indexInfo;         


// Show Product detail per id
		$indexInfo['description'] = "Show Product detail as per id (post method)";
		$indexInfo['url'] = $dir."products/app_productdetail.json";
		$indexInfo['parameters'] = 'productid - Product id';
		$indexInfo['output'] = '<b>Success</b><pre>
{
  "message": {
    "error": "0",
    "ProductInfo": [
      {
        "id": 69,
        "brand_id": 2,
        "product_name": "pro13",
        "product_type": "3",
        "product_part_num": 122,
        "product_color": "1",
        "product_catridge_type": "4",
        "product_price_before_gst": 12,
        "product_price_including_gst": 13,
        "product_est_yield": "13",
        "product_est_yield1": "5",
        "product_stock_qty": 13,
        "product_inventory_availability": "6",
        "product_compatability": "8",
        "product_dimension_length": 13,
        "product_dimension_width": 12,
        "product_dimension_height": 43,
        "product_shipping_weight": "kyy",
        "product_waiver_charges": "",
        "product_description": "",
        "product_usage": "",
        "image": "http://sgappstore.com/DBR/img/product/14665086540.png"
      }
    ]
  }
}
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Product id is missing"}]</pre>
		';
		$indexarr[] = $indexInfo;   


// Show Product detail per id
		$indexInfo['description'] = "Show Printer detail as per brand id (post method)";
		$indexInfo['url'] = $dir."products/app_show_printer_with_brandid.json";
		$indexInfo['parameters'] = 'brandid - brand id';
		$indexInfo['output'] = '<b>Success</b><pre>
{
  "message": {
    "error": "0",
    "printerInfo": [
      {
        "id": 3,
        "printer_name": "pnm1",
        "image": ""
      },
      {
        "id": 4,
        "printer_name": "pnm",
        "image": ""
      },
      {
        "id": 6,
        "printer_name": "pnm",
        "image": ""
      },
      {
        "id": 7,
        "printer_name": "pnm",
        "image": ""
      },
      {
        "id": 9,
        "printer_name": "g",
        "image": ""
      },
      {
        "id": 10,
        "printer_name": "g",
        "image": ""
      }
    ],
    "TotalRecord": 6,
    "TotalPageCount": 1,
    "CurrentPage": 1
  }
}
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Product id is missing"}]</pre>
		';
		$indexarr[] = $indexInfo;
        
        
// Show product record as per printerid
		$indexInfo['description'] = "Show product record as per printer id(post method)";
		$indexInfo['url'] = $dir."products/app_show_product_with_printer.json";
		$indexInfo['parameters'] = 'printerid - Printer id';
		$indexInfo['output'] = '<b>Success</b><pre>
{
  "message": {
    "error": "0",
    "printerInfo": [
      {
        "id": 129,
        "product_name": "mm img",
        "image": "http://sgappstore.com//DBR/img/product/2016-07-04-06-45-40_577a06140fd0e.jpg",
        "price": 1211
      },
      {
        "id": 128,
        "product_name": "mm img",
        "image": "http://sgappstore.com//DBR/img/product/2016-07-04-06-44-28_577a05cc9eb67.jpg",
        "price": 1211
      },
      {
        "id": 127,
        "product_name": "mimage",
        "image": "http://sgappstore.com//DBR/img/product/2016-07-04-06-42-07_577a053f41a39.jpg",
        "price": 13
      },
      {
        "id": 126,
        "product_name": "mimage",
        "image": "http://sgappstore.com//DBR/img/product/2016-07-04-06-36-42_577a03fa691b0.jpg",
        "price": 13
      },
      {
        "id": 125,
        "product_name": "mimage",
        "image": "",
        "price": 13
      },
      {
        "id": 124,
        "product_name": "mimage",
        "image": "",
        "price": 13
      },
      {
        "id": 123,
        "product_name": "mimage",
        "image": "",
        "price": 13
      },
      {
        "id": 122,
        "product_name": "mimage",
        "image": "",
        "price": 13
      },
      {
        "id": 121,
        "product_name": "mimage",
        "image": "",
        "price": 13
      },
      {
        "id": 120,
        "product_name": "mimage",
        "image": "",
        "price": 13
      }
    ],
    "TotalRecord": 16,
    "TotalPageCount": 2,
    "CurrentPage": 1
  }
}
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Product id is missing"}]</pre>
		';
		$indexarr[] = $indexInfo; 


// Product Add to cart
		$indexInfo['description'] = "Product Add to cart(post method)";
		$indexInfo['url'] = $dir."products/app_addtocart.json";
		$indexInfo['parameters'] = 'product_id - Product id<br> user_id - User id<br>quantity - Quantity <br> price - Price<br>';
		$indexInfo['output'] = '<b>Success</b><pre>
        {
          "message": {
            "error": "0",
            "response": "Cart added successfully.."
          }
        }
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Product id is missing"}]</pre>
		';
		$indexarr[] = $indexInfo; 


// Show cart record
	$indexInfo['description'] = "Show cart record(post method)";
	$indexInfo['url'] = $dir."products/show_cartrecords.json";
	$indexInfo['parameters'] = 'product_id - Product id<br> user_id - User id';
	$indexInfo['output'] = '<b>Success</b><pre>
    {
      "message": {
        "error": "0",
        "cartInfo": [
          {
            "id": 11,
            "user_id": 12,
            "product_id": 74,
            "quantity": 2,
            "unit_price": 20,
            "total_price": 40,
            "product_name": "pro1313",
            "product_part_num": 122,
            "image": ""
          }
        ]
      }
    }
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Product id is missing"}]</pre>
		';
		$indexarr[] = $indexInfo; 

// Remove item from cart record
	$indexInfo['description'] = "Remove item from the cart(post method)";
	$indexInfo['url'] = $dir."products/app_remove_cartitem.json";
	$indexInfo['parameters'] = 'cart_id -Cart id';
	$indexInfo['output'] = '<b>Success</b><pre>
{
   "message": {
   "error": "0",
   "response": "Item remove from the cart"
  }
}
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"Cart id is missing"}]</pre>
		';
		$indexarr[] = $indexInfo; 


 // Show Static pages
		$indexInfo['description'] = "Static Pages";
		$indexInfo['url'] = "<pre>
Terms & Conditions -- ".$dir."Pages/view/2 <br>
About us --".$dir."Pages/view/3<br>
FAQ -- ".$dir."Pages/view/5 <br>
Privacy Policy  -- ".$dir."Pages/view/6 <br>
Contact us -- ".$dir."Pages/view/7 <br>
		</pre>";
		$indexInfo['parameters'] ="";
		$indexInfo['output'] = '<b>Success</b><pre>
					</pre><br>
		<b>Error</b><pre></pre>
		';
		$indexarr[] = $indexInfo;
		
		$indexInfo['description'] = "Country list with name & phone code";
		$indexInfo['url'] = $dir."Users/app_county_list.json";
		$indexInfo['parameters'] ="";
		$indexInfo['output'] = '<b>Success</b><pre>
		{
    "message": {
        "error": "0",
        "Country": [
            {
                "iso": "AF",
                "name": "AFGHANISTAN",
                "phonecode": 93
            },
            {
                "iso": "AL",
                "name": "ALBANIA",
                "phonecode": 355
            },
            {
                "iso": "DZ",
                "name": "ALGERIA",
                "phonecode": 213
            },
            {
                "iso": "AS",
                "name": "AMERICAN SAMOA",
                "phonecode": 1684
            },
            {
                "iso": "AD",
                "name": "ANDORRA",
                "phonecode": 376
            },
            {
                "iso": "AO",
                "name": "ANGOLA",
                "phonecode": 244
            },
            {
                "iso": "AI",
                "name": "ANGUILLA",
                "phonecode": 1264
            },
            {
                "iso": "AQ",
                "name": "ANTARCTICA",
                "phonecode": 0
            },
            {
                "iso": "AG",
                "name": "ANTIGUA AND BARBUDA",
                "phonecode": 1268
            },
            {
                "iso": "AR",
                "name": "ARGENTINA",
                "phonecode": 54
             }
        ]
    }
}
					</pre><br>
		<b>Error</b><pre></pre>
		';
		$indexarr[] = $indexInfo;
		
		
// Remove item from cart record
	$indexInfo['description'] = "Promo code using in the cart(post method)";
	$indexInfo['url'] = $dir."products/app_promocode.json";
	$indexInfo['parameters'] = 'userid - User id<br>promocode - Promocode';
	$indexInfo['output'] = '<b>Success</b><pre>
{
  "message": {
    "promoDetail": {
      "valid": "Yes",
      "discount_amount": "50.00",
      "discount_type": "$",
      "expiry_date": "No"
    },
    "error": "0",
    "message": "PromoCode details."
  }
}
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"User id is missing"}]</pre>
		';
		$indexarr[] = $indexInfo; 

//________________ Delivery Address ___________________//   
    $indexInfo['description'] = "Add Delivery Address And listing  (post method)";
        $indexInfo['url'] = $dir."users/addDeliveryAdrs.json";
        $indexInfo['parameters'] = '
        user_id - user_id (Required) <br>
        fullname - fullname (Required)<br>
        address  - address (Required)<br>
        country  -  country (Required)<br>
        postalcode - postalcode (Required)<br>
        phone       - phone postalcode (Required)<br>';
        
        $indexInfo['output'] = '<b>Success</b><pre> 
        {
              "message": {
                "error": "0",
                "response": "Delivery detail add successfully",
                "deliveryDetail": [
                  {
                    "id": 11,
                    "user_id": 1,
                    "fullname": "testfullname111",
                    "address": "chd11",
                    "country": "ind11",
                    "postalcode": "1439911",
                    "phone": 9988811
                  }
                ]
              }
            }
        </pre><br>
        <b>Error</b><pre>[{"error":"1","response":"Parameters are missing"}]</pre>
        ';

        $indexarr[] = $indexInfo;


        //________________Enquiry___________________//   
    $indexInfo['description'] = "Add Enquiry  (post method)";
        $indexInfo['url'] = $dir."users/enquiry.json";
        $indexInfo['parameters'] = '
        user_id - user_id (Required) <br>
        name - name <br>
        email -email <br>
        subject- subject<br>
        message - <br>';
        
        $indexInfo['output'] = '<b>Success</b><pre> 
        { 
            "message":
             { "enquiryDetail":
              [ 
                {
                "id": 6,
                "user_id": 43,
                "name": "en name",
                "email": "ee@gg.com",
                "subject": "subject1",
                "message": " enquiry message"
                }
                ]
                }
        }
        </pre><br>
        <b>Error</b><pre>[{"error":"1","response":"Parameters are missing"}]</pre>
        ';
        
        $indexarr[] = $indexInfo;
								
		
		// Sales & clerance api  
		$indexInfo['description'] = "Sales and clearance product record (post method)";
		$indexInfo['url'] = $dir."products/app_show_sales_product.json";
	        $indexInfo['parameters'] = '';
		$indexInfo['output'] = '<b>Success</b><pre>

{
  "message": {
    "error": "0",
    "response": "Product Listing",
    "listing": [
      {
        "id": 102,
        "product_name": "Printer Canon",
        "brand_id": 2,
        "price": 50
      },
      {
        "id": 104,
        "product_name": "Printer Canon",
        "brand_id": 2,
        "price": 150
      },
      {
        "id": 105,
        "product_name": "Printer Canon",
        "brand_id": 2,
        "price": 200
      },
      {
        "id": 108,
        "product_name": "Printer Canon",
        "brand_id": 2,
        "price": 350
      },
      {
        "id": 115,
        "product_name": "product more image",
        "brand_id": 2,
        "price": 13
      },
      {
        "id": 116,
        "product_name": "mimage",
        "brand_id": 2,
        "price": 13
      },
      {
        "id": 117,
        "product_name": "mimage",
        "brand_id": 2,
        "price": 13
      },
      {
        "id": 118,
        "product_name": "mimage",
        "brand_id": 2,
        "price": 13
      },
      {
        "id": 119,
        "product_name": "mimage",
        "brand_id": 2,
        "price": 13
      },
      {
        "id": 120,
        "product_name": "mimage",
        "brand_id": 2,
        "price": 13
      }
    ],
    "TotalRecord": 25,
    "TotalPageCount": 3,
    "CurrentPage": 1
  }
}
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"brand id is missing"}]</pre>
		';
		$indexarr[] = $indexInfo;   
		
       
       
       	// Sales & clerance api  
		$indexInfo['description'] = "Update cart record (post method)";
		$indexInfo['url'] = $dir."products/app_update_cart_detail.json";
		$indexInfo['parameters'] = 'user_id - User id<br> cart_info - 109:2:20||108:1:10 <br>Example : <br> single value = productid1:quantity1:price1<br> multiple value = productid1:quantity1:price1||productid2:quantity2:price2';
		$indexInfo['output'] = '<b>Success</b><pre>

{
  "message": {
    "error": "1",
    "response": "User id is missing"
  }
}
 </pre><br>
		<b>Error</b><pre>[{"error":"1","response":"user id is missing"}]</pre>
		';
		$indexarr[] = $indexInfo; 

//_________________________________USER NOTIFICATION  LIST ______________//             

$indexInfo['description'] = "User Notification list (post method)";
        $indexInfo['url'] = $dir."notifications/notificationList.json";
        $indexInfo['parameters'] = 'user_id - User id<br> ';
        $indexInfo['output'] = '<b>Success</b><pre>

{
  "message": {
    "error": "0",
    "response": [
      {
        "id": 4,
        "nid": null,
        "type": "notification",
        "message": "newwwwwwwwww messsss",
        "status": 1,
        "create_date": "2016-07-07T00:00:00+0000"
      },
      {
        "id": 5,
        "nid": null,
        "type": "notification",
        "message": "test",
        "status": 1,
        "create_date": "2016-07-07T00:00:00+0000"
      }
    ]
  }
}
 </pre><br>
        <b>Error</b><pre>[{"error":"1","response":"User have no notification message"}]</pre>
        ';
        $indexarr[] = $indexInfo;   




//_________________________________END USER NOTIFICATION  LIST ______________//    

//_________________________________  USER PRODUCT FIlTER  ______________//             

$indexInfo['description'] = "Product filter  (post method)";
        $indexInfo['url'] = $dir."products/productSearch.json";
        $indexInfo['parameters'] = '
        keyword - keyword<br> 
        product_description<br>
        brand -  brand_id <br>
        type  -  product Type <br>
        color -  color <br>
        partno-  Part number<br>
        compatability -  product_compatability<br>
        price -  price<br>
        limit - limit(optional)<br>
        page - Page (optional)';
        $indexInfo['output'] = '<b>Success</b><pre>

{
  "message": {
    "error": "0",
    "products": [
      {
        "id": 115,
        "product_name": "product more image",
        "product_price_before_gst": 13,
        "image": "http://sgappstore.com//DBR/img/product/2016-07-04-06-12-35_5779fe531e4dc.jpg"
      },
      {
        "id": 116,
        "product_name": "mimage",
        "product_price_before_gst": 13,
        "image": "http://sgappstore.com//DBR/img/product/2016-07-04-06-18-24_5779ffb064f0a.jpg"
      },
      {
        "id": 117,
        "product_name": "mimage",
        "product_price_before_gst": 13
      },
      {
        "id": 118,
        "product_name": "mimage",
        "product_price_before_gst": 13,
        "image": "http://sgappstore.com//DBR/img/product/2016-07-04-06-23-03_577a00c778816.jpg"
      },
      {
        "id": 119,
        "product_name": "mimage",
        "product_price_before_gst": 13,
        "image": "http://sgappstore.com//DBR/img/product/2016-07-04-06-25-09_577a01457d18f.jpg"
      },
      {
        "id": 120,
        "product_name": "mimage",
        "product_price_before_gst": 13
      },
      {
        "id": 121,
        "product_name": "mimage",
        "product_price_before_gst": 13
      },
      {
        "id": 122,
        "product_name": "mimage",
        "product_price_before_gst": 13
      },
      {
        "id": 123,
        "product_name": "mimage",
        "product_price_before_gst": 13
      },
      {
        "id": 124,
        "product_name": "mimage",
        "product_price_before_gst": 13
      }
    ],
    "TotalRecord": 15,
    "TotalPageCount": 2,
    "CurrentPage": 1
  }
}
 </pre><br>
        <b>Error</b><pre>[{"error":"1","response":"Parameter missing"}]</pre>
        ';
        $indexarr[] = $indexInfo;   


        

//_________________________________END USER NOTIFICATION  LIST ______________//


//-------------------------------------Order api-------------------------------------------//



$indexInfo['description'] = "Create order (post method)";
        $indexInfo['url'] = $dir."orders/appCreateOrder.json";
        $indexInfo['parameters'] = 'user_id - User id<br> 
        delivery_id - Delivery id<br>
        transaction_id - Transaction id<br>
	total_amount - Total Amount<br>
	delivery_by - Delivery Method<br>
	delivery_by_time - Delivery Time<br>';
        $indexInfo['output'] = '<b>Success</b><pre>

{
  "message": {
    "error": "0",
    "order_id": "78",
    "response": "Order completed successfully"
  }
}
 </pre><br>
        <b>Error</b><pre>[{"error":"1","response":"Parameter missing"}]</pre>
        ';
        $indexarr[] = $indexInfo;   
//______________Order Track _____________//

        $indexInfo['description'] = "order  track  (post method)";
        $indexInfo['url'] = $dir."orders/appTrackingOrder.json";
        $indexInfo['parameters'] = 'order_id - order_id(required)<br>';
        $indexInfo['output'] = '<b>Success</b><pre>

{
  "message": {
    "error": "0",
    "response": [
      {
        "id": 69,
        "order_total": 31,
        "order_date": "2016-07-14T00:00:00+0000",
        "ordertracks": [
          {
            "id": 1,
            "order_id": 69,
            "order_status": "pending",
            "order_date": "2016-07-08T00:00:00+0000"
          },
          {
            "id": 2,
            "order_id": 69,
            "order_status": "approved",
            "order_date": "2016-07-09T00:00:00+0000"
          },
          {
            "id": 3,
            "order_id": 69,
            "order_status": "dispatched",
            "order_date": "2016-07-09T00:00:00+0000"
          },
          {
            "id": 4,
            "order_id": 69,
            "order_status": "processing",
            "order_date": "2016-07-11T00:00:00+0000"
          },
          {
            "id": 6,
            "order_id": 69,
            "order_status": "completed",
            "order_date": "2016-07-12T00:00:00+0000"
          }
        ]
      }
    ]
  }
}
 </pre><br>
        <b>Error</b><pre>[{"error":"1","response":"Parameter missing"}]</pre>
        ';
        $indexarr[] = $indexInfo; 
         
//___________________My Purchase ___________________//




        $indexInfo['description'] = "My Purchase  (post method)";
        $indexInfo['url'] = $dir."orders/appPurchasingOrder.json";
        $indexInfo['parameters'] = 'user_id - user_id(required)<br>';
        $indexInfo['output'] = '<b>Success</b><pre>
{
  "message": {
    "error": "0",
    "response": [
      {
        "id": 77,
        "order_transaction_id": "0",
        "order_address_line1": "ewewew",
        "order_address_line2": "ewewew",
        "order_date": "1970-01-01T00:00:00+0000",
        "order_total": 36,
        "order_status": "delivered"
      },
      {
        "id": 78,
        "order_transaction_id": "0",
        "order_address_line1": "wewewe",
        "order_address_line2": "dsdsdsdsds",
        "order_date": "2016-07-12T00:00:00+0000",
        "order_total": 2563,
        "order_status": "approved"
      }
    ],
    "TotalRecord": 2,
    "TotalPageCount": 1,
    "CurrentPage": 1
  }
}
 </pre><br>
        <b>Error</b><pre>[{"error":"1","response":"Parameter missing"}]</pre>
        ';
        $indexarr[] = $indexInfo; 

/////--------------------Order Detail-----------------// 

//___________________My Purchase ___________________//




        $indexInfo['description'] = "Order Detail  (post method)";
        $indexInfo['url'] = $dir."orders/appPurchasingOrderDetail.json";
        $indexInfo['parameters'] = 'order_id - user_id(required)<br>';
        $indexInfo['output'] = '<b>Success</b><pre>
{
  "message": {
    "error": "0",
    "response": {
      "order_transaction_id": "0",
      "order_address_line1": "ewewew",
      "order_address_line2": "ewewew",
      "order_date": "1970-01-01T00:00:00+0000",
      "order_shipping_cost": 12,
      "order_estimated_tax": 22,
      "order_total": 36,
      "items": [
        {
          "product_id": 115,
          "color": null,
          "quantity": 2,
          "unit_price": 33,
          "total_price": 66
        }
      ]
    }
  }
}
 </pre><br>
        <b>Error</b><pre>[{"error":"1","response":"Parameter missing"}]</pre>
        ';
        $indexarr[] = $indexInfo;        

   $this->set('IndexDetail',$indexarr);
       
}
}
