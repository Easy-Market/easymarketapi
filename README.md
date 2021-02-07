# easymarketapi
RESTful API for EasyMarket
### Making API calls
The base url is ```http://api.easymarket.com.ng/modules/```.
The token is a 64-character string, a product of sha256 hashing which will be given to the developer upon request.
#### Signing Up Users
  The following keys are required to sign up a user:<br>
  ```email``` Only properly formatted email addresses would work.<br>
  ```phonenum``` Only 11-digit Nigerian phone numbers would work.<br>
  ```fname``` First name. Maximum of 20 characters.<br>
  ```lname``` Surname. Maximum of 20 characters.<br>
  ```pass1``` Password.<br>
  ```pass2``` Verify password<br>
  ```token``` The token as discussed above.
  ##### Sample User Signup API Call
  ```http://api.easymarket.com.ng/modules/signup.php?email=johndoe@example.com&phonenum=08111222222&fname=John&lname=Doe&bizname=John Tech Gifts&cansell=1&displaymode=business&pass1=admin&pass2=admin&vendorurl=johndoetech&token=xxxx```
  <br>
  ###### User Exists
  When a user tries signing up with an email address already existing in the database, the following response is displayed:<br>
  ```{"code":419,"msg":"UserExists"}```
  ###### Successful Signup
  When a signup attempt is successful, the following is displayed:<br>
  ```{"code":200,"msg":"usercreated"}```<br>

  #### Home screen 
  This section is handled by the ```homescreen``` class located at ```/classes/homescreen.php```. It takes care of all the features on the home screen, namely:<br>
  ###### Slider <br>
  ###### Categories <br>
  ###### Featured Items/Top Sellers<br>

  #### Top Categories
  To make calls, the following keys are required:<br>
  ```token``` See the section Making API Calls. <br>
  ```topcats``` This key should be added to the request URL and assigned ```yes``` as its value.<br>
  ###### Sample call<br>
  ```http://localhost/easymarketapi/modules/homeScreen.php?token=xxxx&&topcats=yes```
  ###### Sample Result
  ```[
    [
        {
            "cat_id": "1",
            "cat_icon": "jjjjnjkn",
            "cat_name": "7",
            "featured": "1"
        }
    ],
    [
        {
            "cat_id": "2",
            "cat_icon": "jbjnjnjn",
            "cat_name": "8",
            "featured": "1"
        }
    ],
    [
        {
            "cat_id": "3",
            "cat_icon": "jjjjnjkn",
            "cat_name": "9",
            "featured": "1"
        }
    ]
]```<br>


#### Sliders
To make calls, the following keys are required: <br>
 ```token``` See the section Making API Calls. <br>
 ```sliders``` Thi should be added to the request URL and assigned ```yes``` as a value.<br>
#### Sample Request<br>
```http://localhost/easymarketapi/modules/homeScreen.php?token=xxxxx&sliders=yes```