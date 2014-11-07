#Timezone

## About

Timezone is a helper for creating a timezone picker dropdown menu.

### Loading

    include('Timezone.php');
    $timezone = new Pel\Helper\Timezone;

### Usage

    // Get the pure list, $timezone_identifier => $display
    // Then create the menu how you like.
    foreach ($timezone::getList() as $timezone_identifier => $display) {
        echo '<option value="' . $timezone_identifier . '">' . $display . '</option>';
    }

    // OR

    // Echo the menu directly.
    echo $timezone::get_menu();
