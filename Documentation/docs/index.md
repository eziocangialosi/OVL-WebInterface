# Welcome to the documentation for the web interface of the Open Vehicle Locator project.

If you're not looking for the web interface part you can navigate between all the repositories in the [Project navigator](https://github.com/eziocangialosi/OpenVehicleLocator#project-navigation).

## Requirement

* Have already installed and configured the Api 

## Installation

* `wget https://github.com/eziocangialosi/OVL-WebInterface.git -O ovl-website.deb` - Install the Website.
* `sudo dpkg -i ovl-website.deb` - Extract the Website.

## Usage

Go to website/php/initLink.php and adapts the links 

    <?php
        $API_link = "https://example.com";
        $Website_link = "https://example.com/";
    ?>
