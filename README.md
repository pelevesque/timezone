[![Build Status](https://travis-ci.org/pelevesque/timezone.svg?branch=master)](https://travis-ci.org/pelevesque/timezone)

# timezone

## About

A PSR-4 PHP class for creating a timezone picker dropdown menu.

## Loading

```php
include('Timezone.php');
$timezone = new Pel\Helper\Timezone;
```

## Usage

```php
// Get the pure list, $timezone_identifier => $display
// Then create the menu how you like.
foreach ($timezone::getList() as $timezone_identifier => $display) {
    echo '<option value="' . $timezone_identifier . '">' . $display . '</option>';
}

// OR

// Echo the menu directly.
echo $timezone::getMenu();
```
