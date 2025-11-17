# Dashvio - WooCommerce Theme

Modern multipurpose WooCommerce theme with clean design and powerful features.

## Version
1.0.0 - Milestone 1

## Requirements
- WordPress 6.0 or higher
- WooCommerce 7.0 or higher
- PHP 7.4 or higher

## Installation

1. Upload the theme folder to `/wp-content/themes/`
2. Activate the theme from WordPress admin
3. Install and activate WooCommerce plugin
4. Configure theme options from Appearance > Customize

## Features

### Core Features
- WooCommerce integration
- Responsive design
- Custom logo support
- Multiple menu locations
- Widget areas
- Theme customizer options
- Security features
- AJAX support
- Template functions

### WooCommerce Features
- Product gallery zoom
- Product gallery lightbox
- Product gallery slider
- Custom product grid layouts
- Cart functionality (with empty state)
- Mini cart widget
- Checkout pages (with thank you page)
- My Account pages
- Product loops
- Breadcrumbs

### Theme Options
- Primary color
- Secondary color
- Accent color
- Container width
- Typography settings
- Spacing controls

## File Structure

```
dashvio/
├── assets/
│   ├── css/
│   │   ├── main.css
│   │   ├── header.css
│   │   ├── footer.css
│   │   ├── woocommerce.css
│   │   ├── cart.css
│   │   ├── checkout.css
│   │   └── myaccount.css
│   └── js/
│       ├── main.js
│       └── woocommerce.js
├── inc/
│   ├── setup.php
│   ├── enqueue.php
│   ├── security.php
│   ├── custom-functions.php
│   ├── template-functions.php
│   ├── woocommerce.php
│   ├── theme-options.php
│   └── ajax-handlers.php
├── woocommerce/
│   ├── archive-product.php
│   ├── single-product.php
│   ├── content-product.php
│   ├── cart/
│   │   ├── cart.php
│   │   ├── cart-empty.php
│   │   └── mini-cart.php
│   ├── checkout/
│   │   ├── form-checkout.php
│   │   └── thankyou.php
│   ├── myaccount/
│   │   └── my-account.php
│   ├── global/
│   │   ├── wrapper-start.php
│   │   └── wrapper-end.php
│   └── loop/
│       ├── loop-start.php
│       ├── loop-end.php
│       └── no-products-found.php
├── functions.php
├── style.css
├── index.php
├── header.php
├── footer.php
└── woocommerce.php
```

## Customization

### Colors
Go to Appearance > Customize > Colors to change:
- Primary Color
- Secondary Color
- Accent Color

### Container Width
Go to Appearance > Customize > General Settings
- Adjust container width (default: 1280px)

### Menus
Go to Appearance > Menus to create:
- Primary Menu (header)
- Footer Menu

### Widgets
Go to Appearance > Widgets to configure:
- Footer Widget 1
- Footer Widget 2
- Footer Widget 3
- Footer Widget 4

## Development

### CSS Variables
The theme uses CSS custom properties for easy customization:
- Colors: `--color-primary`, `--color-secondary`, `--color-accent`
- Typography: `--font-primary`, `--font-heading`
- Spacing: `--spacing-xs` to `--spacing-xl`
- Borders: `--radius-sm` to `--radius-lg`
- Shadows: `--shadow-sm` to `--shadow-lg`

## Support
For support and documentation, visit dashvio.com

## License
GNU General Public License v2 or later

## Credits
Developed by Dashvio Team

