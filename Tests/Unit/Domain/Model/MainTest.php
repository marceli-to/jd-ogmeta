<?php
namespace Jamondigital\JdOgmeta\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Marcel Stadelmann <marcel@jamon.digital>
 */
class MainTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Jamondigital\JdOgmeta\Domain\Model\Main
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Jamondigital\JdOgmeta\Domain\Model\Main();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }
}
