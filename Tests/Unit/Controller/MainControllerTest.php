<?php
namespace Jamondigital\JdOgmeta\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Marcel Stadelmann <marcel@jamon.digital>
 */
class MainControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Jamondigital\JdOgmeta\Controller\MainController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Jamondigital\JdOgmeta\Controller\MainController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

}
