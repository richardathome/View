<?php
declare(strict_types=1);

namespace Richbuilds\View\Tests;

use PHPUnit\Framework\TestCase;
use Richbuilds\View\View;

class ViewTest extends TestCase
{
    private const TEMPLATE_DIRECTORY = __DIR__ . '/templates';

    private View $view;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        $this->view = new View(self::TEMPLATE_DIRECTORY);
    }

    /**
     * @return void
     */
    public function testRenderReturnsExpectedHtml(): void
    {
        $expectedHtml = '<h1>Welcome to my website!</h1>';

        $html = $this->view->render('index', [
            'title' => 'My Website',
            'content' => 'Welcome to my website!'
        ]);

        self::assertStringContainsString($expectedHtml, $html);
    }

    /**
     * @return void
     */
    public function testRenderThrowsRuntimeExceptionIfTemplateNotFound(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Template not-found.php not found');

        $this->view->render('not-found.php');
    }
}
