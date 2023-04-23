# Richbuilds/View

## A Simple PHP Template Engine

### Example Usage:

```php
use Richbuilds\View;

$view = new View('template_base_directory');

$result = $this->view->render('template', [
    'foo' => $foo, 
    'bar' => 2
]);
```
Returns the contents of template_base_directory/template.tpl.php with $foo and 
$bar injected.
