# location #

Provide a standard way to store a location and work with it.

# Usage #

Initialising the classes.
 
```

use Drupal\location\Location;
use Drupal\location\LocationCollection;
use Drupal\country\Country;
use Drupal\continent\Continent;

$country = new Country('US');
$continent = new Continent('NA');
$coordinate = new Coordinate(37.419857, -122.078827);

$location = new Location(
  'Google Inc.',
  'Second floor',
  'Amphitheatre Parkway',
  1600,
  'B2',
  '94043',
  'Mountain View',
  'San Francisco',
  'California',
  $country,
  $continent,
  $coordinate
);
$collection = new LocationCollection([$location]);

```

Useful methods.

```

use Drupal\country\CountryCollection;

$world = CountryCollection::createWorldCollection();
$europe = CountryCollection::createContinentCollection('EU');

```

# Release notes #

`1.0.0`
* Basic setup of the module.
* Provide country and country collection class.
