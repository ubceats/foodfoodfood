# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: sequel.gottardo.me (MySQL 5.5.5-10.2.14-MariaDB)
# Database: fnmiwfit_ubceats_staging
# Generation Time: 2018-03-29 15:29:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table brand
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `name` char(25) NOT NULL DEFAULT '',
  `url` text NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;

INSERT INTO `brand` (`name`, `url`, `desc`)
VALUES
	('Agora Cafe','http://blogs.ubc.ca/agora/','Agora is an innovative café that embraces UBC?s movement towards sustainability and food security, while simultaneously providing meaningful experiences for our volunteers.'),
	('Bento Sushi','http://www.food.ubc.ca/place/bento-sushi','There\'s better sushi elsewhere.'),
	('Gage Market','http://www.food.ubc.ca/place/gage-mini-mart/','Gage\'s very own cornerstore.'),
	('Gather At Vanier','http://www.food.ubc.ca/place/gather/','Vanier\'s own cornerstore.'),
	('Hungry Nomad','http://www.food.ubc.ca/place/hungry-nomad/','UBC?s original food truck, serving hearty lunch fare like Pulled Pork Sliders, a Reuben Sandwich with housemade brisket, and authentic Montreal-style poutine.'),
	('Ike\'s Cafe','http://www.food.ubc.ca/place/ikes','Library eats!\n'),
	('IRC Snackbar','http://www.food.ubc.ca/place/irc-snackbar','Get your snacks at the IRC!'),
	('IWANA Taco','http://www.ams.ubc.ca/foodanddrink/flipside/',''),
	('Law Cafe','http://www.food.ubc.ca/place/law-cafe','Lunch at Allard? No problem.'),
	('Magma Cafe','http://www.food.ubc.ca/place/magma-cafe','Ready for an overpriced Mocha?'),
	('Mercante','http://www.food.ubc.ca/place/mercante/','Who doesn\'t like some fake Neapolitan pizza?'),
	('Neville\'s Cafe','http://www.food.ubc.ca/place/nevilles','Providing food to Buchanan students since 2012.'),
	('Open Kitchen','http://www.food.ubc.ca/place/open-kitchen/','From international comfort foods to custom stir fries, vegetarian entrees and more, Open Kitchen represents the best of Vancouver?s diverse culinary scene. Fresh seafood is Ocean Wise? certified, we serve local and/or organic fruits and vegetables, and our beef burgers and fresh chicken is halal.'),
	('Pacific Poke','http://www.food.ubc.ca/place/pacific-poke/','Poke might originate from Hawaii, but as a team of food-lovers, we\'re constantly creating unique flavour combinations whilst keeping true to the style of this popular cuisine. Our chefs serve the tastiest, most innovative poke from right here on the West Coast. Pacific Poke will satisfy your craving for clean, wholesome food packed with bold flavours.'),
	('Perugia Italian Cafe','http://www.food.ubc.ca/place/caffe-perugia','An Italian Cafe. Or at least that is what we want you to believe.'),
	('Porch','http://www.ams.ubc.ca/foodanddrink/porch/','Vegetarian comfort food'),
	('Sage Restaurant','http://www.food.ubc.ca/place/sage/','A very fancy place.'),
	('Sauder Exchange Cafe','http://www.food.ubc.ca/place/sauder-exchange-cafe/','We only accept American Express here.'),
	('Starbucks','http://www.food.ubc.ca/place/starbucks/','Starbucks offers more than 30 blends of handcrafted beverages including fresh-brewed coffee, hot and iced espresso beverages, Frappuccino coffee and non-coffee blended beverages, smoothies and teas. Baked pastries, sandwiches, salads, oatmeal, yogurt parfaits and fruit cups are also available.'),
	('Stir It Up Cafe','http://www.food.ubc.ca/place/stir-it-up-cafe/',''),
	('Subway','http://www.food.ubc.ca/place/subway/','Eat fresh! Subway has thousands of locations worldwide and is famous for made-to-order sandwiches, fresh soups and salads.'),
	('The Hungry Nomad','http://www.food.ubc.ca/place/hungry-nomad/',''),
	('The Loop Cafe','http://www.food.ubc.ca/place/loop-cafe/',''),
	('The Point Grill','http://www.food.ubc.ca/place/the-point-grill/','Want an expensive meal in first year? We got you covered.'),
	('Totem Dining Room','http://www.food.ubc.ca/place/totem-park-dining-room/','The perfect place to socialize and refuel. Offering a wide selection of menu items including Asian cuisine, daily pasta, pizza, burgers, made-to-order sandwiches and sweet desserts.'),
	('Triple O\'s','http://www.food.ubc.ca/place/triple-o','Only healthy choices!');

/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table brandHas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brandHas`;

CREATE TABLE `brandHas` (
  `brandName` char(25) NOT NULL DEFAULT '',
  `categoryName` char(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`brandName`,`categoryName`),
  KEY `categoryName` (`categoryName`),
  CONSTRAINT `brandHas_ibfk_1` FOREIGN KEY (`brandName`) REFERENCES `brand` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `brandHas_ibfk_2` FOREIGN KEY (`categoryName`) REFERENCES `categories` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `brandHas` WRITE;
/*!40000 ALTER TABLE `brandHas` DISABLE KEYS */;

INSERT INTO `brandHas` (`brandName`, `categoryName`)
VALUES
	('Agora Cafe','Cafe'),
	('Agora Cafe','Vegetarian'),
	('Bento Sushi','Fast food'),
	('Hungry Nomad','Food truck'),
	('Ike\'s Cafe','Cafe'),
	('IWANA Taco','Fast Food'),
	('Law Cafe','Cafe'),
	('Magma Cafe','Cafe'),
	('Neville\'s Cafe','Cafe'),
	('Open Kitchen','Dining Hall'),
	('Open Kitchen','Meal plan'),
	('Pacific Poke','Meal plan'),
	('Perugia Italian Cafe','Cafe'),
	('Porch','Vegetarian'),
	('Sauder Exchange Cafe','Cafe'),
	('Starbucks','Cafe'),
	('Stir It Up Cafe','Cafe'),
	('Subway','Fast food'),
	('The Loop Cafe','Cafe'),
	('Totem Dining Room','Dining Hall'),
	('Totem Dining Room','Meal plan'),
	('Triple O\'s','Fast food');

/*!40000 ALTER TABLE `brandHas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `name` char(25) NOT NULL DEFAULT '',
  `desc` char(50) DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`name`, `desc`)
VALUES
	('Cafe','Caffeine to keep you awake while working on 304'),
	('Dining Hall','Expensive garbage'),
	('Fast Food','Places with unhealthy choices'),
	('Food truck','A meal on wheels'),
	('Gluten Free','Gluten free food items'),
	('Meal plan','Places that take meal plan dollars'),
	('Seafood','Items containing seafood'),
	('Vegan','Vegan food items'),
	('Vegetarian','Vegetarian food items');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table food_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `food_items`;

CREATE TABLE `food_items` (
  `name` char(35) NOT NULL DEFAULT '',
  `brandName` char(25) NOT NULL DEFAULT '',
  `price` float NOT NULL,
  PRIMARY KEY (`name`,`brandName`),
  KEY `brandName` (`brandName`),
  CONSTRAINT `food_items_ibfk_1` FOREIGN KEY (`brandName`) REFERENCES `brand` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `food_items` WRITE;
/*!40000 ALTER TABLE `food_items` DISABLE KEYS */;

INSERT INTO `food_items` (`name`, `brandName`, `price`)
VALUES
	('3 Cheese Quesadilla','IWANA Taco',6),
	('Adobo Pork Burrito','IWANA Taco',8),
	('Adobo Pork Taco','IWANA Taco',3),
	('Al Forno Kitchen','Open Kitchen',6),
	('Al Pesto pizza','Mercante',12),
	('Albacore tuna poke','Sage Restaurant',14),
	('Alla Salsiccia pizza','Mercante',12),
	('Aloha Burger','The Point Grill',16),
	('Assorted Tempura','Bento Sushi',5.99),
	('Bacon Cheddar Burger','Triple O\'s',7.49),
	('Baja Breakfast Sandwich','Triple O\'s',7.99),
	('BAKED PASTA SPECIAL','Perugia Italian Cafe',8.45),
	('Baos and Bowls','Gather At Vanier',8),
	('Beef Asada Burrito','IWANA Taco',8),
	('Beef Asada Taco','IWANA Taco',3),
	('Breakfast Club','Triple O\'s',5.99),
	('Broccolini and cheese','Sage Restaurant',6),
	('Buffalo Chicken Club','Triple O\'s',7.99),
	('Buffalo Chickpea Veggie Burger','The Point Grill',13),
	('Caesar Salad','The Point Grill',10),
	('Caliente','Gather At Vanier',8),
	('California Bento Box','Bento Sushi',8.99),
	('Canadian Burger','The Point Grill',16),
	('CANNOLI','Perugia Italian Cafe',5),
	('CAPOCOLLO WRAP','Perugia Italian Cafe',7.5),
	('CAPRESE WRAP','Perugia Italian Cafe',7.5),
	('Caramel Turtle Cheesecake','The Point Grill',8),
	('Cauliflower Wings','The Point Grill',8),
	('Chicken and Cranberry Grilled Chees','The Point Grill',15),
	('Chicken and Waffles','The Point Grill',15),
	('Chicken or Beef Teriyaki with Rice','Bento Sushi',5.99),
	('Chicken Strips','Open Kitchen',7.99),
	('Chickpea Salad Sandwich','Agora Cafe',3.75),
	('Chipotle BBQ Bacon Melt','Triple O\'s',7.49),
	('Chipotle Chicken Mac and Cheese','The Point Grill',14),
	('Chips and Guacamole','IWANA Taco',4),
	('Chips and Queso','IWANA Taco',4),
	('Chips and Salsa','IWANA Taco',3),
	('Chorizo Halloumi Skewers','The Point Grill',9),
	('Coconut Nanaimo Bar','Perugia Italian Cafe',3.75),
	('Coffee','Starbucks',1.5),
	('Collazione salad','Mercante',3.99),
	('Crisp salmon ginger wontons','Sage Restaurant',12),
	('Crispy Chicken Wrap','The Point Grill',13),
	('Crispy Spicy Baja Chicken Burger','Triple O\'s',7.99),
	('Crispy Wings','The Point Grill',12),
	('Cumin Chicken Burrito','IWANA Taco',8),
	('Cumin Chicken Taco','IWANA Taco',3),
	('Daily Hot Entrees','The Loop Cafe',9),
	('Daily Soup','The Point Grill',6),
	('Daily Soup Special','Porch',4),
	('Dippin Chicken Tenders (5pc)','Triple O\'s',6.99),
	('Dolce Panino gelato','Mercante',4.1),
	('Double Double','Triple O\'s',8.99),
	('Ebi Sunomono','Bento Sushi',2.99),
	('Edamame','Bento Sushi',2.99),
	('Epic Brownie','The Point Grill',8),
	('Farmer\'s Forage','Totem Dining Room',8),
	('Fish Taco','IWANA Taco',3),
	('Fresh berry angel food cake','Sage Restaurant',8),
	('Fresh Fare','Gather At Vanier',7),
	('Fresh salad bar','The Loop Cafe',8),
	('Frisee au lardon','Sage Restaurant',13),
	('Global Bowl Kitchen','Open Kitchen',9),
	('Global Fare','Totem Dining Room',9),
	('Gomae','Bento Sushi',2.99),
	('Grill Kitchen','Open Kitchen',9),
	('Grilled heirloom tomato','Sage Restaurant',20),
	('Grilled lamb rack chops','Sage Restaurant',26),
	('Grilled tenderloin steak','Sage Restaurant',30),
	('Grilled zucchini','Sage Restaurant',18),
	('Grillhouse','Gather At Vanier',9),
	('Gyaza','Gather At Vanier',10),
	('Gyoza','Bento Sushi',3.75),
	('Hand Cone','Bento Sushi',3.25),
	('Harvest Chop','The Point Grill',12),
	('Homestyle/Comfort Food','Totem Dining Room',5),
	('Housemade potato gnocchi','Sage Restaurant',6),
	('Insalata Caprese salad','Mercante',5.75),
	('Insalata di Caesar salad','Mercante',4.4),
	('Insalata di Rucola salad','Mercante',7.95),
	('Jalapeno Cheddar Chicken Wrap','The Point Grill',14),
	('Lasagna Bolognese','Mercante',9.25),
	('lavender creme brulee','Sage Restaurant',8),
	('Lentil Stew','Porch',8.5),
	('Loaded IWANA fries','IWANA Taco',8),
	('Local rockfish escovitch','Sage Restaurant',19),
	('Main Bowl','Porch',8),
	('Margherita Classic pizza','Mercante',11),
	('Mario\'s Gelato','The Point Grill',4),
	('Meat and Cheese Quesadilla','IWANA Taco',7.5),
	('Mexi fries','IWANA Taco',3),
	('Miso Mushroom Soup','Pacific Poke',2),
	('Miso Soup','Bento Sushi',1),
	('Montreal-style poutine','The Hungry Nomad',11),
	('Monty Mushroom','Triple O\'s',7.49),
	('Mushroom Burrito','IWANA Taco',8),
	('MUSHROOM FLATBREAD','Perugia Italian Cafe',8),
	('Mushroom Swiss Melt','The Point Grill',16),
	('Mushroom Taco','IWANA Taco',3),
	('Nachos','The Point Grill',15),
	('Nigiri Sushi','Bento Sushi',1.5),
	('Oatmeal with Water','Agora Cafe',2.5),
	('Onion Petals','The Point Grill',8),
	('Orange almond cake','Sage Restaurant',8),
	('Original Sunny Start','Triple O\'s',5.99),
	('Ortolana pizza','Mercante',11),
	('Pan seared beef and cremini mushroo','Sage Restaurant',20),
	('Pan seared duck breast','Sage Restaurant',26),
	('Pan seared scallops','Sage Restaurant',18),
	('Pastry and baked goods','The Loop Cafe',3),
	('Pecan Pie','The Point Grill',7),
	('PERUGIA EGG SANDWICH','Perugia Italian Cafe',5),
	('Pineapple Tofu Bowl','The Point Grill',14),
	('Pizza Bianca','Mercante',11),
	('Point Burger','The Point Grill',13),
	('Porch Homemade Chili','Porch',8.5),
	('Potato crusted halibut','Sage Restaurant',30),
	('Poutine','The Point Grill',8),
	('Prawn Tempura','Bento Sushi',5.99),
	('Pretzel Bites','The Point Grill',6),
	('Prosciutto e Rucola pizza','Mercante',12),
	('PROSCIUTTO FLATBREAD','Perugia Italian Cafe',8),
	('PROSCIUTTO WRAP','Perugia Italian Cafe',7.5),
	('Pulled Pork Sliders','The Hungry Nomad',11),
	('Pumpkin and Pecan Penne','The Point Grill',13),
	('Reuben Sandwich with housemade bris','The Hungry Nomad',11),
	('ROASTED CHICKEN with pasta & garlic','Perugia Italian Cafe',9.95),
	('ROASTED CHICKEN with sm. soup or ga','Perugia Italian Cafe',9.95),
	('Roasted Peppers Burrito','IWANA Taco',8),
	('Roasted Peppers Taco','IWANA Taco',3),
	('Salad','Perugia Italian Cafe',8),
	('Salmon Burger','The Point Grill',17),
	('Sandwich','Subway',8),
	('Sandwich Kitchen','Open Kitchen',9),
	('Sashimi','Bento Sushi',6.99),
	('Sausage and Mushroom Penne','The Point Grill',14),
	('Sausage Sunny Start','Triple O\'s',5.99),
	('Seafood tagliatelle','Sage Restaurant',20),
	('Seafood Udon Soup','Bento Sushi',7.75),
	('Shuyo or Miso Chicken Ramen','Bento Sushi',7.5),
	('Side Bowl','Porch',5),
	('Simply Juice','Triple O\'s',2),
	('Simply Local','Gather At Vanier',6),
	('Soup and Salad','The Point Grill',11),
	('Soup with toast','Agora Cafe',3.75),
	('Spice Market','Totem Dining Room',5),
	('Spiced vegetable chickpea fritter','Sage Restaurant',10),
	('Spicy Ultimate Crunch','Triple O\'s',6.99),
	('Spring Rolls','Bento Sushi',4.25),
	('Square Meal Kitchen','Open Kitchen',9),
	('Stax Sandwich Bar','Totem Dining Room',9),
	('Steak and Frites','The Point Grill',22),
	('Steamed Mix Veggie','Bento Sushi',3.75),
	('SUNDRIED TOMATO SALMON with pasta &','Perugia Italian Cafe',9.95),
	('SUNDRIED TOMATO SALMON with soup or','Perugia Italian Cafe',9.95),
	('Sushi Bento Box','Bento Sushi',8.99),
	('Tantalizing Tomato Soup','Porch',3),
	('Tempura Bento Box','Bento Sushi',8.99),
	('The Cali','Pacific Poke',11),
	('The Grill','Totem Dining Room',9),
	('The Keefer','Pacific Poke',12),
	('The Main','Pacific Poke',14),
	('The Veggie','Pacific Poke',11),
	('Tiramisu','Mercante',4.99),
	('Tofu Burrito','IWANA Taco',8),
	('Tofu Taco','IWANA Taco',3),
	('TOSSED PASTA SPECIAL','Perugia Italian Cafe',7.45),
	('Tuna Roll','Bento Sushi',3.5),
	('Unagi Donburi','Bento Sushi',8.99),
	('VEGETARIAN PESTO WRAP','Perugia Italian Cafe',7.5),
	('Veggie and Cheese Quesadilla','IWANA Taco',6.5),
	('Veggie Broth','Totem Dining Room',2),
	('Veggie Sunomono','Bento Sushi',2.85),
	('Veggie Tempura','Bento Sushi',4.99),
	('Wild pacific salmon','Sage Restaurant',22),
	('Wild Seafood Pappardelle','The Point Grill',15),
	('Winter Greens','The Point Grill',10),
	('Wrap','Porch',7),
	('Yam fries','The Point Grill',6);

/*!40000 ALTER TABLE `food_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table itemHas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `itemHas`;

CREATE TABLE `itemHas` (
  `itemName` char(35) NOT NULL DEFAULT '''''',
  `categoryName` char(25) NOT NULL DEFAULT '',
  `brandName` char(25) NOT NULL,
  PRIMARY KEY (`itemName`,`categoryName`,`brandName`),
  KEY `categoryName` (`categoryName`),
  KEY `itemHas___fk3` (`itemName`,`brandName`),
  CONSTRAINT `itemHas___fk3` FOREIGN KEY (`itemName`, `brandName`) REFERENCES `food_items` (`name`, `brandName`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `itemHas_ibfk_2` FOREIGN KEY (`categoryName`) REFERENCES `categories` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `itemHas` WRITE;
/*!40000 ALTER TABLE `itemHas` DISABLE KEYS */;

INSERT INTO `itemHas` (`itemName`, `categoryName`, `brandName`)
VALUES
	('Al Forno Kitchen','Vegetarian','Open Kitchen'),
	('Al Pesto pizza','Vegetarian','Mercante'),
	('Baja Breakfast Sandwich','Fast food','Triple O\'s'),
	('Breakfast Club','Fast food','Triple O\'s'),
	('Buffalo Chicken Club','Fast food','Triple O\'s'),
	('Chicken Strips','Fast food','Open Kitchen'),
	('Chickpea Salad Sandwich','Vegan','Agora Cafe'),
	('Chickpea Salad Sandwich','Vegetarian','Agora Cafe'),
	('Chipotle BBQ Bacon Melt','Fast food','Triple O\'s'),
	('Coffee','Cafe','Starbucks'),
	('Daily Soup Special','Vegetarian','Porch'),
	('Double Double','Fast food','Triple O\'s'),
	('Lentil Stew','Vegetarian','Porch'),
	('Main Bowl','Vegetarian','Porch'),
	('Miso Mushroom Soup','Vegan','Pacific Poke'),
	('Miso Mushroom Soup','Vegetarian','Pacific Poke'),
	('Oatmeal with Water','Gluten Free','Agora Cafe'),
	('Oatmeal with Water','Vegan','Agora Cafe'),
	('Oatmeal with Water','Vegetarian','Agora Cafe'),
	('Original Sunny Start','Fast food','Triple O\'s'),
	('Porch Homemade Chili','Vegetarian','Porch'),
	('Pulled Pork Sliders','Fast food','The Hungry Nomad'),
	('Sandwich','Fast food','Subway'),
	('Sandwich','Vegetarian','Subway'),
	('Sausage Sunny Start','Fast food','Triple O\'s'),
	('Side Bowl','Vegetarian','Porch'),
	('Simply Juice','Gluten Free','Triple O\'s'),
	('Simply Juice','Vegan','Triple O\'s'),
	('Simply Juice','Vegetarian','Triple O\'s'),
	('Spicy Ultimate Crunch','Fast food','Triple O\'s'),
	('Spring Rolls','Vegetarian','Bento Sushi'),
	('Tantalizing Tomato Soup','Vegetarian','Porch'),
	('The Cali','Seafood','Pacific Poke'),
	('The Keefer','Seafood','Pacific Poke'),
	('The Main','Seafood','Pacific Poke'),
	('The Veggie','Vegetarian','Pacific Poke'),
	('Tuna Roll','Fast Food','Bento Sushi'),
	('Tuna Roll','Seafood','Bento Sushi'),
	('Veggie Broth','Dining Hall','Totem Dining Room'),
	('Veggie Broth','Gluten Free','Totem Dining Room'),
	('Veggie Broth','Meal Plan','Totem Dining Room'),
	('Veggie Broth','Vegan','Totem Dining Room'),
	('Veggie Broth','Vegetarian','Totem Dining Room'),
	('Veggie Tempura','Fast Food','Bento Sushi'),
	('Veggie Tempura','Vegetarian','Bento Sushi'),
	('Wrap','Vegetarian','Porch');

/*!40000 ALTER TABLE `itemHas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `name` char(25) NOT NULL DEFAULT '',
  `address` char(50) NOT NULL DEFAULT '',
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  PRIMARY KEY (`name`,`address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`name`, `address`, `latitude`, `longitude`)
VALUES
	('Allard Hall','1822 East Mall',49.27,-123.254),
	('AMS Student Nest','6133 University Blvd',49.2666,-123.25),
	('Bookstore','6200 University Blvd',49.265,-123.251),
	('Buchanan Block A','1866 Main Mall',49.2683,-123.255),
	('Centre for Interactive Re','2260 West Mall',49.2621,-123.253),
	('David Lam Research Centre','2015 Main Mall',49.2653,-123.254),
	('Earth Sciences Building','6339 Stores Road',49.262,-123.252),
	('Food truck','varies',49.2614,-123.257),
	('Fred Kaiser Building','2332 Main Mall',49.2623,-123.25),
	('Henry Angus Building','2053 Main Mall',49.2649,-123.254),
	('ICICS','2366 Main Mall',49.2612,-123.249),
	('Instructional Resources C','2194 Health Sciences Mall',49.2648,-123.247),
	('Irving K. Barber Learning','1961 East Mall',49.2675,-123.253),
	('Life Building','6138 Student Union Blvd',49.2675,-123.25),
	('Life Sciences Centre','2350 Health Sciences Mall',49.2624,-123.245),
	('Marine Drive Residence','2205 Lower Mall',49.2616,-123.255),
	('Neville Scarfe Building','2125 Main Mall',49.2643,-123.253),
	('Orchard Commons','6363 Agronomy Rd',49.2604,-123.251),
	('Pharmaceutical Sciences B','2405 Wesbrook Mall',49.2623,-123.243),
	('Place Vanier','1935 Lower Mall',49.2646,-123.259),
	('Ponderosa Commons','6488 University Boulevard',49.2621,-123.253),
	('test location','5959 West Mall',49.2321,-123.233),
	('Totem Park','2525 West Mall',49.258,-123.252),
	('Totem Park Commonsblock','2525 West Mall',49.2579,-123.253),
	('Univeristy Centre','6331 Crescent Rd',49.2689,-123.257),
	('Village','2178 Western Pkwy',49.2659,-123.243),
	('Walter Gage','5959 Student Union Blvd',49.2692,-123.25);

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table occupies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `occupies`;

CREATE TABLE `occupies` (
  `brandName` char(25) NOT NULL DEFAULT '',
  `locationName` char(35) NOT NULL DEFAULT '',
  `locationAddress` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`brandName`,`locationName`,`locationAddress`),
  KEY `occupies_ibfk_2` (`locationName`,`locationAddress`),
  CONSTRAINT `occupies_ibfk_1` FOREIGN KEY (`brandName`) REFERENCES `brand` (`name`) ON UPDATE CASCADE,
  CONSTRAINT `occupies_ibfk_2` FOREIGN KEY (`locationName`, `locationAddress`) REFERENCES `locations` (`name`, `address`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `occupies` WRITE;
/*!40000 ALTER TABLE `occupies` DISABLE KEYS */;

INSERT INTO `occupies` (`brandName`, `locationName`, `locationAddress`)
VALUES
	('Bento Sushi','David Lam Research Centre','2015 Main Mall'),
	('Gage Market','Walter Gage','5959 Student Union Blvd'),
	('Gather At Vanier','Place Vanier','1935 Lower Mall'),
	('IWANA Taco','AMS Student Nest','6133 University Blvd'),
	('Law Cafe','Allard Hall','1822 East Mall'),
	('Magma Cafe','Earth Sciences Building','6339 Stores Road'),
	('Mercante','Ponderosa Commons','6488 University Boulevard'),
	('Neville\'s Cafe','Neville Scarfe Building','2125 Main Mall'),
	('Open Kitchen','Orchard Commons','6363 Agronomy Rd'),
	('Pacific Poke','ICICS','2366 Main Mall'),
	('Perugia Italian Cafe','Life Sciences Centre','2350 Health Sciences Mall'),
	('Porch','AMS Student Nest','6133 University Blvd'),
	('Sage Restaurant','Univeristy Centre','6331 Crescent Rd'),
	('Sauder Exchange Cafe','Henry Angus Building','2053 Main Mall'),
	('Starbucks','Bookstore','6200 University Blvd'),
	('Starbucks','Fred Kaiser Building','2332 Main Mall'),
	('Starbucks','Life Building','6138 Student Union Blvd'),
	('Stir It Up Cafe','Buchanan Block A','1866 Main Mall'),
	('Subway','Life Building','6138 Student Union Blvd'),
	('Subway','Village','2178 Western Pkwy'),
	('The Hungry Nomad','Food truck','varies'),
	('The Point Grill','Marine Drive Residence','2205 Lower Mall'),
	('Totem Dining Room','Totem Park','2525 West Mall'),
	('Totem Dining Room','Totem Park Commonsblock','2525 West Mall'),
	('Triple O\'s','David Lam Research Centre','2015 Main Mall');

/*!40000 ALTER TABLE `occupies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table opening_times
# ------------------------------------------------------------

DROP TABLE IF EXISTS `opening_times`;

CREATE TABLE `opening_times` (
  `day` int(1) NOT NULL,
  `opensAt` int(4) NOT NULL DEFAULT -1,
  `closesAt` int(4) NOT NULL DEFAULT -1,
  `brandName` char(25) NOT NULL DEFAULT '',
  `locationName` char(35) NOT NULL DEFAULT '',
  `locationAddress` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`day`,`brandName`,`locationName`,`locationAddress`),
  KEY `opening_times___fk_3` (`brandName`,`locationName`,`locationAddress`),
  CONSTRAINT `opening_times___fk_3` FOREIGN KEY (`brandName`, `locationName`, `locationAddress`) REFERENCES `occupies` (`brandName`, `locationName`, `locationAddress`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `opening_times` WRITE;
/*!40000 ALTER TABLE `opening_times` DISABLE KEYS */;

INSERT INTO `opening_times` (`day`, `opensAt`, `closesAt`, `brandName`, `locationName`, `locationAddress`)
VALUES
	(1,1000,2000,'Bento Sushi','David Lam Research Centre','2015 Main Mall'),
	(1,1600,2330,'Gage Market','Walter Gage','5959 Student Union Blvd'),
	(1,700,2100,'Gather At Vanier','Place Vanier','1935 Lower Mall'),
	(1,730,1700,'Law Cafe','Allard Hall','1822 East Mall'),
	(1,730,1430,'Magma Cafe','Earth Sciences Building','6339 Stores Road'),
	(1,730,2359,'Mercante','Ponderosa Commons','6488 University Boulevard'),
	(1,730,1645,'Neville\'s Cafe','Neville Scarfe Building','2125 Main Mall'),
	(1,700,2200,'Open Kitchen','Orchard Commons','6363 Agronomy Rd'),
	(1,-1,-1,'Pacific Poke','ICICS','2366 Main Mall'),
	(1,730,1700,'Perugia Italian Cafe','Life Sciences Centre','2350 Health Sciences Mall'),
	(1,1130,1400,'Sage Restaurant','Univeristy Centre','6331 Crescent Rd'),
	(1,730,2000,'Sauder Exchange Cafe','Henry Angus Building','2053 Main Mall'),
	(1,730,1900,'Stir It Up Cafe','Buchanan Block A','1866 Main Mall'),
	(1,700,2200,'Subway','Village','2178 Western Pkwy'),
	(1,-1,-1,'The Hungry Nomad','Food truck','varies'),
	(1,1100,2200,'The Point Grill','Marine Drive Residence','2205 Lower Mall'),
	(1,700,2100,'Totem Dining Room','Totem Park','2525 West Mall'),
	(1,700,2200,'Triple O\'s','David Lam Research Centre','2015 Main Mall'),
	(2,1000,2000,'Bento Sushi','David Lam Research Centre','2015 Main Mall'),
	(2,1600,2330,'Gage Market','Walter Gage','5959 Student Union Blvd'),
	(2,700,2100,'Gather At Vanier','Place Vanier','1935 Lower Mall'),
	(2,730,1700,'Law Cafe','Allard Hall','1822 East Mall'),
	(2,730,1430,'Magma Cafe','Earth Sciences Building','6339 Stores Road'),
	(2,730,2359,'Mercante','Ponderosa Commons','6488 University Boulevard'),
	(2,730,1645,'Neville\'s Cafe','Neville Scarfe Building','2125 Main Mall'),
	(2,700,2200,'Open Kitchen','Orchard Commons','6363 Agronomy Rd'),
	(2,1000,1900,'Pacific Poke','ICICS','2366 Main Mall'),
	(2,730,1700,'Perugia Italian Cafe','Life Sciences Centre','2350 Health Sciences Mall'),
	(2,1130,1400,'Sage Restaurant','Univeristy Centre','6331 Crescent Rd'),
	(2,730,2000,'Sauder Exchange Cafe','Henry Angus Building','2053 Main Mall'),
	(2,730,1900,'Stir It Up Cafe','Buchanan Block A','1866 Main Mall'),
	(2,700,2200,'Subway','Village','2178 Western Pkwy'),
	(2,-1,-1,'The Hungry Nomad','Food truck','varies'),
	(2,1100,2200,'The Point Grill','Marine Drive Residence','2205 Lower Mall'),
	(2,700,2100,'Totem Dining Room','Totem Park','2525 West Mall'),
	(2,700,2200,'Triple O\'s','David Lam Research Centre','2015 Main Mall'),
	(3,1000,2000,'Bento Sushi','David Lam Research Centre','2015 Main Mall'),
	(3,1600,2330,'Gage Market','Walter Gage','5959 Student Union Blvd'),
	(3,700,2100,'Gather At Vanier','Place Vanier','1935 Lower Mall'),
	(3,730,1700,'Law Cafe','Allard Hall','1822 East Mall'),
	(3,730,1430,'Magma Cafe','Earth Sciences Building','6339 Stores Road'),
	(3,730,2359,'Mercante','Ponderosa Commons','6488 University Boulevard'),
	(3,730,1645,'Neville\'s Cafe','Neville Scarfe Building','2125 Main Mall'),
	(3,700,2200,'Open Kitchen','Orchard Commons','6363 Agronomy Rd'),
	(3,1000,1900,'Pacific Poke','ICICS','2366 Main Mall'),
	(3,730,1700,'Perugia Italian Cafe','Life Sciences Centre','2350 Health Sciences Mall'),
	(3,1130,1400,'Sage Restaurant','Univeristy Centre','6331 Crescent Rd'),
	(3,730,2000,'Sauder Exchange Cafe','Henry Angus Building','2053 Main Mall'),
	(3,730,1900,'Stir It Up Cafe','Buchanan Block A','1866 Main Mall'),
	(3,700,2200,'Subway','Village','2178 Western Pkwy'),
	(3,-1,-1,'The Hungry Nomad','Food truck','varies'),
	(3,1100,2200,'The Point Grill','Marine Drive Residence','2205 Lower Mall'),
	(3,700,2100,'Totem Dining Room','Totem Park','2525 West Mall'),
	(3,700,2200,'Triple O\'s','David Lam Research Centre','2015 Main Mall'),
	(4,1000,2000,'Bento Sushi','David Lam Research Centre','2015 Main Mall'),
	(4,1600,2330,'Gage Market','Walter Gage','5959 Student Union Blvd'),
	(4,700,2100,'Gather At Vanier','Place Vanier','1935 Lower Mall'),
	(4,730,1700,'Law Cafe','Allard Hall','1822 East Mall'),
	(4,730,1430,'Magma Cafe','Earth Sciences Building','6339 Stores Road'),
	(4,730,2359,'Mercante','Ponderosa Commons','6488 University Boulevard'),
	(4,730,1645,'Neville\'s Cafe','Neville Scarfe Building','2125 Main Mall'),
	(4,700,2200,'Open Kitchen','Orchard Commons','6363 Agronomy Rd'),
	(4,1000,1900,'Pacific Poke','ICICS','2366 Main Mall'),
	(4,730,1700,'Perugia Italian Cafe','Life Sciences Centre','2350 Health Sciences Mall'),
	(4,1130,1400,'Sage Restaurant','Univeristy Centre','6331 Crescent Rd'),
	(4,730,2000,'Sauder Exchange Cafe','Henry Angus Building','2053 Main Mall'),
	(4,730,1900,'Stir It Up Cafe','Buchanan Block A','1866 Main Mall'),
	(4,700,2200,'Subway','Village','2178 Western Pkwy'),
	(4,-1,-1,'The Hungry Nomad','Food truck','varies'),
	(4,1100,2200,'The Point Grill','Marine Drive Residence','2205 Lower Mall'),
	(4,700,2100,'Totem Dining Room','Totem Park','2525 West Mall'),
	(4,700,2200,'Triple O\'s','David Lam Research Centre','2015 Main Mall'),
	(5,1000,2000,'Bento Sushi','David Lam Research Centre','2015 Main Mall'),
	(5,1600,2330,'Gage Market','Walter Gage','5959 Student Union Blvd'),
	(5,700,2100,'Gather At Vanier','Place Vanier','1935 Lower Mall'),
	(5,730,1700,'Law Cafe','Allard Hall','1822 East Mall'),
	(5,730,1430,'Magma Cafe','Earth Sciences Building','6339 Stores Road'),
	(5,730,2359,'Mercante','Ponderosa Commons','6488 University Boulevard'),
	(5,730,1415,'Neville\'s Cafe','Neville Scarfe Building','2125 Main Mall'),
	(5,700,2200,'Open Kitchen','Orchard Commons','6363 Agronomy Rd'),
	(5,1000,1900,'Pacific Poke','ICICS','2366 Main Mall'),
	(5,730,1700,'Perugia Italian Cafe','Life Sciences Centre','2350 Health Sciences Mall'),
	(5,1130,1400,'Sage Restaurant','Univeristy Centre','6331 Crescent Rd'),
	(5,730,1600,'Sauder Exchange Cafe','Henry Angus Building','2053 Main Mall'),
	(5,730,1900,'Stir It Up Cafe','Buchanan Block A','1866 Main Mall'),
	(5,700,2200,'Subway','Village','2178 Western Pkwy'),
	(5,-1,-1,'The Hungry Nomad','Food truck','varies'),
	(5,1100,2200,'The Point Grill','Marine Drive Residence','2205 Lower Mall'),
	(5,700,2100,'Totem Dining Room','Totem Park','2525 West Mall'),
	(5,700,2200,'Triple O\'s','David Lam Research Centre','2015 Main Mall'),
	(6,-1,-1,'Bento Sushi','David Lam Research Centre','2015 Main Mall'),
	(6,1600,2330,'Gage Market','Walter Gage','5959 Student Union Blvd'),
	(6,700,2100,'Gather At Vanier','Place Vanier','1935 Lower Mall'),
	(6,-1,-1,'Law Cafe','Allard Hall','1822 East Mall'),
	(6,-1,-1,'Magma Cafe','Earth Sciences Building','6339 Stores Road'),
	(6,1000,2200,'Mercante','Ponderosa Commons','6488 University Boulevard'),
	(6,-1,-1,'Neville\'s Cafe','Neville Scarfe Building','2125 Main Mall'),
	(6,700,2200,'Open Kitchen','Orchard Commons','6363 Agronomy Rd'),
	(6,-1,-1,'Pacific Poke','ICICS','2366 Main Mall'),
	(6,-1,-1,'Perugia Italian Cafe','Life Sciences Centre','2350 Health Sciences Mall'),
	(6,-1,-1,'Sage Restaurant','Univeristy Centre','6331 Crescent Rd'),
	(6,900,1600,'Sauder Exchange Cafe','Henry Angus Building','2053 Main Mall'),
	(6,-1,-1,'Stir It Up Cafe','Buchanan Block A','1866 Main Mall'),
	(6,800,2200,'Subway','Village','2178 Western Pkwy'),
	(6,-1,-1,'The Hungry Nomad','Food truck','varies'),
	(6,1100,2200,'The Point Grill','Marine Drive Residence','2205 Lower Mall'),
	(6,700,2100,'Totem Dining Room','Totem Park','2525 West Mall'),
	(6,900,2200,'Triple O\'s','David Lam Research Centre','2015 Main Mall'),
	(7,-1,-1,'Bento Sushi','David Lam Research Centre','2015 Main Mall'),
	(7,1600,2330,'Gage Market','Walter Gage','5959 Student Union Blvd'),
	(7,700,2100,'Gather At Vanier','Place Vanier','1935 Lower Mall'),
	(7,-1,-1,'Law Cafe','Allard Hall','1822 East Mall'),
	(7,-1,-1,'Magma Cafe','Earth Sciences Building','6339 Stores Road'),
	(7,1000,2200,'Mercante','Ponderosa Commons','6488 University Boulevard'),
	(7,-1,-1,'Neville\'s Cafe','Neville Scarfe Building','2125 Main Mall'),
	(7,700,2200,'Open Kitchen','Orchard Commons','6363 Agronomy Rd'),
	(7,-1,-1,'Pacific Poke','ICICS','2366 Main Mall'),
	(7,-1,-1,'Perugia Italian Cafe','Life Sciences Centre','2350 Health Sciences Mall'),
	(7,-1,-1,'Sage Restaurant','Univeristy Centre','6331 Crescent Rd'),
	(7,-1,-1,'Sauder Exchange Cafe','Henry Angus Building','2053 Main Mall'),
	(7,-1,-1,'Stir It Up Cafe','Buchanan Block A','1866 Main Mall'),
	(7,800,2200,'Subway','Village','2178 Western Pkwy'),
	(7,-1,-1,'The Hungry Nomad','Food truck','varies'),
	(7,600,2200,'The Point Grill','Marine Drive Residence','2205 Lower Mall'),
	(7,700,2100,'Totem Dining Room','Totem Park','2525 West Mall'),
	(7,900,2200,'Triple O\'s','David Lam Research Centre','2015 Main Mall');

/*!40000 ALTER TABLE `opening_times` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table todo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `todo`;

CREATE TABLE `todo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `desc` text DEFAULT NULL,
  `done` tinyint(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

LOCK TABLES `todo` WRITE;
/*!40000 ALTER TABLE `todo` DISABLE KEYS */;

INSERT INTO `todo` (`id`, `desc`, `done`)
VALUES
	(1,'Fix foreign key in itemHas',1),
	(2,'Add foreign key in opening_times to occupies',1),
	(3,'Fix foreign key in votes ',1),
	(4,NULL,0),
	(5,NULL,0);

/*!40000 ALTER TABLE `todo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` char(25) NOT NULL DEFAULT '',
  `password` char(25) NOT NULL DEFAULT '',
  `email` char(25) NOT NULL DEFAULT '',
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`username`, `password`, `email`, `isAdmin`)
VALUES
	('andrea','andrea123','andrea@gottardo.me',1),
	('fakeName','password','test@123.com',1),
	('ian','trustthenaturalrecursion','iandelriow@gmail.com',1),
	('kevin','kevinIsCooler','kevin@test.com',1),
	('name here','super secure','test@exmple.com',0),
	('namehere','super secure','test@exmple.com',0),
	('noah','noah_is_cool','noah@falkirks.com',1),
	('robot','this is a password','robot@robot.com',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table votes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `votes`;

CREATE TABLE `votes` (
  `isUpvote` tinyint(1) NOT NULL,
  `review` text DEFAULT NULL,
  `username` char(25) NOT NULL DEFAULT '',
  `foodItemName` char(35) NOT NULL,
  `brandName` char(25) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`username`,`foodItemName`,`brandName`),
  KEY `brandName` (`brandName`),
  KEY `votes_ibfk_1` (`foodItemName`,`brandName`),
  CONSTRAINT `votes___fk2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`foodItemName`, `brandName`) REFERENCES `food_items` (`name`, `brandName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;

INSERT INTO `votes` (`isUpvote`, `review`, `username`, `foodItemName`, `brandName`, `timestamp`)
VALUES
	(1,'What a nice burger','andrea','Bacon Cheddar Burger','Triple O\'s','2018-03-24 14:03:39'),
	(-1,'Chicken Strips are good but pretty overpriced','andrea','Chicken Strips','Open Kitchen','2018-03-24 14:03:39'),
	(1,'Perfect to drink with a straw','andrea','Coffee','Starbucks','2018-03-24 14:03:39'),
	(1,'Nice oatmeal','andrea','Oatmeal with Water','Agora Cafe','2018-03-28 01:38:29'),
	(1,'hey','andrea','Original Sunny Start','Triple O\'s','2018-03-25 14:42:47'),
	(1,'So good!','andrea','Spring Rolls','Bento Sushi','2018-03-24 14:03:39'),
	(-1,'hey','andrea','Tempura Bento Box','Bento Sushi','2018-03-25 14:36:08'),
	(1,'This is disgusting','andrea','The Main','Pacific Poke','2018-03-24 14:03:39'),
	(1,'Cool vegetarian option!','ian','Buffalo Chickpea Veggie Burger','The Point Grill','2018-03-26 17:33:28'),
	(-1,'Terrible sushi.','ian','Spring Rolls','Bento Sushi','2018-03-26 17:50:34'),
	(-1,'pizzaaaaaaa is gud','kevin','Al Pesto pizza','Mercante','2018-03-26 18:32:53'),
	(-1,'i love potato','kevin','Housemade potato gnocchi','Sage Restaurant','2018-03-25 19:52:35'),
	(1,'This is my review \'\'\'','kevin','Original Sunny Start','Triple O\'s','2018-03-25 14:59:16'),
	(-1,'sausage is grossss','kevin','Sausage Sunny Start','Triple O\'s','2018-03-25 19:53:07'),
	(1,'What a nice burger','noah','Bacon Cheddar Burger','Triple O\'s','2018-03-25 12:31:24'),
	(-1,'I don\'t like it','noah','Breakfast Club','Triple O\'s','2018-03-24 14:03:39');

/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
