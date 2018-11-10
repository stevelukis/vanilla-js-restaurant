# SmartRestaurant
## API

#### Customer

##### Get Menu 
Description : Get list of all menu  
Url : `http://localhost/smart-restaurant/backend/customer/menu`  
Request body : empty  
Result example :   
`[{"id":"1","name":"Nasi Goreng","price":"20000","image_url":"jus_jeruk.png","category":"Food"},{"id":"2","name":"Mie Kuah","price":"20500","image_url":"","category":"Food"},{"id":"3","name":"Jus Apel","price":"15000","image_url":"","category":"Minuman"}]`

##### Add User
Description : User check in into table   
Url : `http://localhost/smart-restaurant/backend/customer/register`  
Request body : 
`{
 	"timestamp": TIMESTAMP,
 	"table_number": TABLE_NUMBER
 }`  
Result example :   
`{"status":"success"}`  

##### Get Order Status
Description : Get status of the orders from the corresponding user
Url : `http://localhost/smart-restaurant/backend/customer/order_status`  
Request body : 
`{
 	"user_id": USER_ID
 }`  
Result example :   
`[{"id":"1","user_id":"21","quantity":"1","cooked_status":" in_progress","menu":"Nasi Goreng"},{"id":"2","user_id":"21","quantity":"1","cooked_status":"not_yet","menu":"Mie Kuah"},{"id":"5","user_id":"21","quantity":"12","cooked_status":"not_yet","menu":"Jus Apel"}]`  

##### Order
Description : Order a menu
Url : `http://localhost/smart-restaurant/backend/customer/order`  
Request body : 
`{
 	"user_id": USER_ID,
	"menu_id": MENU_ID,
	"quantity": QUANTITY
 }`  
Result example :   
`{"status":"success"}`  

----

#### Manager

##### Add Category
Description : Add a new category  
Url : `http://localhost/smart-restaurant/backend/manager/add_category`  
Request body : 
`{
 	"category": CATEGORY_NAME
 }`  
Result example :   
`{"status":"success"}`  

##### Update Category
Description : Update a  category  
Url : `http://localhost/smart-restaurant/backend/manager/update_category`  
Request body : 
`{  
  	"id": CATEGORY_ID,
  	"name": CATEGORY_NAME
  }`  
Result example :   
`{"status":"success"}`  

##### Delete Category
Description : Delete a  category  
Url : `http://localhost/smart-restaurant/backend/manager/delete_category`  
Request body : 
`{  
  	"id": CATEGORY_ID
  }`  
Result example :   
`{"status":"success"}`  

##### Get Categories
Description : Get all categories
Url : `http://localhost/smart-restaurant/backend/manager/get_categories`  
Request body : empty
Result example :   
`{"status":"success"}`  

##### Add Menu
Description : Add a new menu  
Url : `http://localhost/smart-restaurant/backend/manager/add_menu`  
Request body : 
`{
 	"name": MENU_NAME,
 	"category_id": CATEGORY_ID,
 	"price": MENU_PRICE",
 	"image_url": IMAGE_URL'
 }`  
Result example :   
`{"status":"success"}`  

##### Update Menu
Description : Update a menu  
Url : `http://localhost/smart-restaurant/backend/manager/update_menu`  
Request body : 
`{
 	"name": MENU_NAME,
 	"category_id": CATEGORY_ID,
 	"price": MENU_PRICE",
 	"image_url": IMAGE_URL'
 }`  
Result example :   
`{"status":"success"}`  

##### Delete Menu
Description : Delete a menu
Url : `http://localhost/smart-restaurant/backend/manager/delete_menu`  
Request body : 
`{
 	"id": MENU_ID
 }`  
Result example :   
`{"status":"success"}`  

----

#### Cashier

##### Get Orders
Description : Get all orders of a table
Url : `http://localhost/smart-restaurant/backend/cashier/get_orders`  
Request body : 
`{
    "table_number": TABLE_NUMBER
 }`  
Result example :   
`[{"id":"1","user_id":"21","quantity":"1","cooked_status":" in_progress","menu_name":"Nasi Goreng","price":"20000"},{"id":"2","user_id":"21","quantity":"1","cooked_status":"not_yet","menu_name":"Mie Kuah","price":"20500"},{"id":"5","user_id":"21","quantity":"12","cooked_status":"not_yet","menu_name":"Jus Apel","price":"15000"},{"id":"6","user_id":"21","quantity":"12","cooked_status":"not_yet","menu_name":"Jus Apel","price":"15000"}]`  

##### Update user
Description : Mark a user as have_paid
Url : `http://localhost/smart-restaurant/backend/cashier/paid`  
Request body : 
`{
 	"id": 21
 }`  
Result example :   
`{"status":"success"}`  


---

#### Chef

##### Get Orders
Description : Get all orders which aren't fully cooked
Url : `http://localhost/smart-restaurant/backend/chef/get_orders`  
Request body : empty 
Result example : 
`[{"id":"1","user_id":"21","quantity":"1","cooked_status":" in_progress","menu_name":"Nasi Goreng"},{"id":"2","user_id":"21","quantity":"1","cooked_status":"not_yet","menu_name":"Mie Kuah"},{"id":"5","user_id":"21","quantity":"12","cooked_status":"not_yet","menu_name":"Jus Apel"},{"id":"6","user_id":"21","quantity":"12","cooked_status":"not_yet","menu_name":"Jus Apel"}]` 

##### Update Progress
Description : Update cooked status of an order
Url : `http://localhost/smart-restaurant/backend/chef/in_progress` or `localhost/smart-restaurant/backend/chef/done`  
Request body : 
`{
 	"id": ORDER_ID
 }`  
Result example :   
`{"status":"success"}`  

