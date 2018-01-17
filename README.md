# UBCEats.ca 🧀🌭🍕

This project was developed over the course of 18 hours by Ian Del Rio, Andrea Gottardo and Noah Heyl at nwHacks '18.

## Inspiration

Information regarding food items at UBC is hard to find. It is easy to look for venues, but not so easy to access their menus. And most importantly, there's no centralized place to look for venues based on your food preferences. We want to change that.

## What it does

UBCEats is a search engine that allows you to look for venues at UBC offering specific food items. For instance, you can search for `pizza` and get back all places at UBC where you can get some kind of pizza. Additionally, you can filter results by the distance of the venue, and by whether your meal plan is accepted or not.

## How we built it

UBCEats is powered by a PHP/MySQL backend, and a HTML/CSS frontend based on Bootstrap. Entering of food items into the database was performed both by scraping where feasible, and by human-powered manual insertion. Geo-location is powered by JavaScript.

## Challenges we ran into

Nothing too serious. One major issue was that UBC Food Services provides the vast majority of their menu in PDF format. It was almost impossible to scrape those programmatically.

## Accomplishments that we're proud of

We're offering something useful to the entire UBC community! In particular, students can look for places that accept their meal plan easily.

## What's next for UBCEats

- Users should be able to update the database with new food items, new prices, as menus get updated.
- Users should be able to leave reviews.
- Food items descriptions should be more specific and relevant.
- Provide images of food items, where possible.