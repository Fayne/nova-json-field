# Nova JSON Field

A JSON field component for Laravel Nova with syntax highlighting and code editing capabilities.

## Features

- 🎨 **Syntax Highlighting**: JSON syntax highlighting powered by CodeMirror
- 📝 **Code Editing**: Full code editing experience with code folding, auto-indentation, and more
- 🔧 **Customizable Height**: Support for custom editor height or auto-height
- 📱 **Responsive Design**: Great display on both form and detail pages
- ✅ **Data Validation**: Automatic JSON format validation
- 🎯 **Easy Integration**: Simple API for quick integration into existing Nova resources

## Installation

Install the package via Composer:

```bash
composer require mobilenowgroup/nova-json-field
```

## Usage

Use the JSON field in your Nova resources:

```php
use MobileNowGroup\NovaJsonField\Json;

public function fields(NovaRequest $request)
{
    return [
        // Basic usage
        Json::make('Config', 'config'),
        
        // Custom height
        Json::make('Settings', 'settings')
            ->height(300),
            
        // Auto height
        Json::make('Data', 'data')
            ->fullHeight(),
    ];
}
```

## API Methods

### `height(string|int $height)`

Set the editor height:

```php
Json::make('Config', 'config')
    ->height(400); // Set height to 400px
```

### `fullHeight()`

Set the editor to display all content:

```php
Json::make('Config', 'config')
    ->fullHeight(); // Editor will display all content
```

## Development

### Requirements

- PHP ^8.2
- Laravel ^10.0|^11.0|^12.0
- Laravel Nova ^5.0

### Development Setup

1. Clone the project:
```bash
git clone <repository-url>
cd nova-json-field
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Build frontend assets:
```bash
npm run production
```

### Testing

Run the test suite:

```bash
composer test
```

### Workbench Development Environment

This package is configured with Laravel Testbench Workbench environment for development and testing:

```bash
# Install Workbench environment
composer run workbench:install

# Build Workbench
composer run workbench:build

# Start development server
composer run workbench:serve
```

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## Contributing

Pull requests and issues are welcome!

## Support

If you encounter any issues while using this package, please:

1. Check the [Issues](../../issues) page
2. Create a new Issue describing your problem
3. Provide detailed error information and reproduction steps