Inventory Admin System (IAS)

Working Demo: http://zachgosling.com/inv-master
      username: admin@admin.com
      password: 123456
      
Based entirely on CakePHP This is a simple inventory system built to keep track of cable modems/routers/gateways and laptops. 

Key Features
  - jQuery inventory page lists all devices and laptops and is filterable/searchable from any field
  - Mac address for each item integrates nicely with barcode scanner to filter by mac
  - Checkouts allow users to checkout one or multiple items for extended periods of time
  - Ability to import devices/models/vendors from csv
  - View count of devices for each vendor
  - View count of devices for each model
  - View count of each model in each location
  - Uses cake php 2.3
  
Things that need to be added to be an awesome inventory admin system
  -Checkout multiple items at a time
  -Vendors page needs to be formated to suite all the info better
  -Delete multiple items at a time
  
### Install ###
  1. Copy directory to webserver
  2. Update default database settings in inv/app/Config/database.php
  3. Install databaase from  inv/app/Config/Schema/inventory.sql
  4. Go to inv in a web browser and use the following credentials to login:
      username: admin@admin.com
      password: 123456
  5. Enjoy!

Important things to note:
  1. CakePHP is a MVC framework so further development questions can be directed at the CakePHP comunity
  2. Referenced http://datatables.net/development/server-side/php_cake to help format Devices/Laptops pages
  3. Referenced http://www.willis-owen.co.uk/2011/11/dynamic-select-box-with-cakephp-2-0/ to help make the dependent select boxes in the add/edit device view
  4. Referenced http://stackoverflow.com/questions/15301055/how-to-print-count-of-unique-values-in-cakephp to build the counts of devices into the vendors page
  5. Referenced http://stackoverflow.com/questions/15119680/cakephp-combine-input-values-to-create-hidden-name-input to create the names from multiple fields
  6. Referenced http://stackoverflow.com/questions/15098117/cakephp-pass-product-id-value-to-checkout-add-page to add chekout button in devices/laptops index page
