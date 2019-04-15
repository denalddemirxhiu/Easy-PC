Website Specifications:

/---Database---/
5 tables
  -user
  -shipping_addr
  -assets
  -rentals
  -feedback

/---Dynamic Webpages---/
#Signup (Create Page)
  -signup.php
  -scripts/signup.js
  -includes/signuptoDb.php
  -includes/signupconfirm.php

#Login (Read Page)
 -login.php
 -scripts/login.js
 -includes/login-check.php
 -includes/loginconfirm.php

#Account Management (Update Pages)
 -shipping_addr_form.php
 -scripts/shipping_addr_form.js
 -includes/addrtoDB.php

 -username_form.php
 -scripts/username.js
 -includes/usernametoDb.php

 -password_form.php
 -scripts/password.js
 -includes/passwordtoDb.php

 -email_form.php
 -scripts/email.js
 -includes/emailtoDb.php

 -account_updated.php

 #Products (Read/Transaction/Delete Pages)
  -products.php
  -scripts/searchProds.js
  -includes/searchProducts.php

  -cart.php
  -scripts/cart.js
  -includes/rentProducts.php
  -includes/getCartInfo.php

  -product_remove.php
  -scripts/deleteProd.js
  -includes/removeItem.php
