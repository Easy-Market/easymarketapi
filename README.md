# easymarketapi
RESTful API for EasyMarket
### Making API calls
The base url is ```http://api.easymarket.com.ng/```.
The token is a 64-character string, a product of sha256 hashing which will be given to the developer upon request.
#### Signing Up Users
  The following keys are required to sign up a user:
  ```email``` Only properly formatted email addresses would work.
  ```phonenum``` Only 11-digit Nigerian phone numbers would work.
  ```fname``` First name. Maximum of 20 characters.
  ```lname``` Surname. Maximum of 20 characters.
  ```bizname``` Business name. Maximum of 20 characters.
  ```cansell``` Boolean that specifies whether a user is signed up as a vendor or not.
  ```displaymode``` Specifies how the user's profile will be displayed in the app
  ```pass1``` Password.
  ```pass2``` Verify password
  ```vendorurl``` A string without spaces or punctuation to be used as a unique ID and vendor URL for the store
  ```token``` The token as discussed above.
