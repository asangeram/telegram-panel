<?php

namespace Telegramapp\Telegram\AdminPanel\Console\Menus;

use Telegramapp\Telegram\AdminPanel\Compiler\StubFileCompiler;
use Telegramapp\Telegram\AdminPanel\Filesystem\Filesystem;

/**
 * Class RegularMenu.
 *
 * @package Telegramapp\Telegram\AdminPanel\Console
 */
class RegularMenu extends Menu
{

    /**
     * RegularRoute constructor.
     *
     * @param StubFileCompiler $compiler
     * @param Filesystem $filesystem
     */
    public function __construct(StubFileCompiler $compiler, Filesystem $filesystem)
    {
        parent::__construct($compiler, $filesystem);
    }

    /**
     * Get path to stub.
     *
     * @return string
     */
    protected function getStubPath()
    {
        return __DIR__ . '/../stubs/menu.stub';
    }

    /**
     * @return array
     */
    protected function obtainReplacements()
    {
        return [
            'MENU_LINK' => $this->getReplacements()[0],
            'MENU_NAME' => $this->getReplacements()[1]
        ];
    }
}
