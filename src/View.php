<?php
declare(strict_types=1);

namespace Richbuilds\View;

use RuntimeException;

/**
 * Class View provides a simple way to render view templates.
 *
 * @package Richbuilds\View
 */
class View
{
    /**
     * @var string The path to the directory containing the view templates.
     */
    private string $templateDirectory;

    /**
     * View constructor.
     *
     * @param string $templateDirectory The path to the directory containing the view templates.
     */
    public function __construct(string $templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
    }

    /**
     * Renders a view template with the given data.
     *
     * @param string $templateName The name of the view template.
     * @param array $variables The variables to use in the template.
     *
     * @return string The rendered HTML.
     *
     * @throws RuntimeException If the template file is not found.
     */
    public function render(string $templateName, array $variables = []): string
    {
        $templatePath = $this->templateDirectory . '/' . $templateName . '.tpl.php';

        if (!file_exists($templatePath)) {
            throw new RuntimeException(sprintf('Template %s not found', $templateName));
        }

        ob_start();
        extract($variables, EXTR_SKIP);
        include $templatePath;

        return ob_get_clean();
    }
}