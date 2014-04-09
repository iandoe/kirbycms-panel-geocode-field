Geocoding Field - Kirby CMS Panel
===========================

KirbyCMS Panel field for geocoding user input and storing it in a simple way.

![Screenshot](https://github.com/iandoe/kirbycms-panel-geocode-field/raw/master/action.gif)

This uses :

- Google  [Maps API v3](https://developers.google.com/maps/documentation/javascript/geocoding)
- @brianreavis [Selectize.js jQuery plugin](brianreavis.github.io/selectize.js/)
- [Pin Icons](http://dribbble.com/shots/928458-80-Shades-of-White-Icons?list=users&offset=26) by [Victor Erixon](http://dribbble.com/victorerixon)

It requires you to :

- [Get a Google Maps API Key](https://developers.google.com/maps/documentation/javascript/tutorial#api_key)



## Install

After installing the [kirbycms panel](https://github.com/bastianallgeier/kirbycms-panel/), create a directory `site/panel/fields` at the root of your kirby install (if not present already), cd into this directory and clone this repository in the `geocode` directory.

You should end up with the new directory:
`site/panel/fields/geocode`

Edit the `geocodeApiKey` variable in the `geocode.js` file using your Google Maps API Key

## Usage

Once installed, when creating a panel blueprint, you can add the field using `type: geocode`, to set the placeholder that will appear when there is no images found in the content folder, you can use the `placeholder: yourtext` property and if your website is in multiple languages, you can use the Kirby Syntax for multi-lingual websites.

eg:

```
# default blueprint

title: Page
pages: true
files: true
fields:
  title:
    label: Title
    type:  text
  geo:
  	label: Location
  	placeholder: Please choose a location...
  	type: geocode
  	
```

## Behaviour

This field is an augmented `<select>` field using [Selectize.js](brianreavis.github.io/selectize.js/), this doesn't work without javascript or offline. User input is sent to Google Maps API and results are fetched to be presented in a user-friendly way.

The then selected location is stored as such `formatted_address:lat:lng` in your page file

```
Title: Page Title

----

Geo: Paris, France:48.856614:2.3522219000000177

----

```

You can then use the data by building an array out of it.

PHP

```php
<?php

// Make sure you get a string
$geo = (string)$page->geo();

// Using kirby toolkit str::split
$geo_arr = str::split($page->geo(), ':');

// OR using PHP's explode function
$geo_arr = explode(':', $page->geo())

/*

$geo_arr = array(
	0 => 'formatted_address',
	1 => 'lat',
	2 => 'lng'
);

?>

<div>Location:  <?php echo $geo_arr[0] ?> </div>
<div>Latitude:  <?php echo $geo_arr[1] ?> </div>
<div>Longitude: <?php echo $geo_arr[2] ?> </div>

```

## Real Life Usage
What can you do with this ?

A few examples:

- Build GeoJSON to use with Mapbox (which i am doing)
- Give blog posts more context by adding a location
- Show blog posts by location name (just like an archive page)
- Link to places in Google Maps
- ...

## TODO

- Fetch locations from other pages just like [The Tag Field](https://github.com/bastianallgeier/kirbycms-extensions/tree/master/fields/tags)
- Allow for multiple locations to be stored and ordered by the user (this could help build "trips" blog posts or maps)
- Field Option to choose the restriction for items, currently only "country, locality" item types are listed as items (no street addresses)


## License

This is released under the MIT License

Guillaume 'Wilhearts' PICARD, 2014