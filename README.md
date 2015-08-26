#Timezone

## About

Timezone is a helper for creating a timezone picker dropdown menu.

## Loading

```php
include('Timezone.php');
$timezone = new Pel\Helper\Timezone;
```

## Usage

```php
// Get the pure list, $timezone_identifier => $display
// Then create the menu how you like.
foreach ($timezone::get_list() as $timezone_identifier => $display) {
    echo '<option value="' . $timezone_identifier . '">' . $display . '</option>';
}

// OR

// Echo the menu directly.
echo $timezone::get_menu();
```
