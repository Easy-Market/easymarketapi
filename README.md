# easymarketapi
RESTful API for EasyMarket
### Making API calls
The base url is ```http://api.easymarket.com.ng/```.
The token is a 64-character string, a product of sha256 hashing which will be given to the developer upon request.
#### Signing Up Users
  The following keys are required to sign up a user:<br>
  ```email``` Only properly formatted email addresses would work.<br>
  ```phonenum``` Only 11-digit Nigerian phone numbers would work.<br>
  ```fname``` First name. Maximum of 20 characters.<br>
  ```lname``` Surname. Maximum of 20 characters.<br>
  ```bizname``` Business name. Maximum of 20 characters.<br>
  ```cansell``` Boolean that specifies whether a user is signed up as a vendor or not.<br>
  ```displaymode``` Specifies how the user's profile will be displayed in the app.<br>
  ```pass1``` Password.<br>
  ```pass2``` Verify password<br>
  ```vendorurl``` A string without spaces or punctuation to be used as a unique ID and vendor URL for the store<br>
  ```token``` The token as discussed above.
