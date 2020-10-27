<?php declare(strict_types=1);


namespace SwoftTest\Apollo\Unit;


use PHPUnit\Framework\TestCase;
use Swoft\Apollo\Config;
use Swoft\Apollo\Exception\ApolloException;
use Swoft\Bean\BeanFactory;
use Swoft\Context\Context;

/**
 * Class ApolloTest
 *
 * @since 2.0
 */
class ApolloTest extends TestCase
{
    /**
     */
    public function tearDown()
    {
        Context::getWaitGroup()->wait();
    }

    /**
     * @throws ApolloException
     */
    public function testPullWithCache()
    {
        /* @var Config $config */
        $config = BeanFactory::getBean(Config::class);
        $data   = $config->pullWithCache('application');
        $this->assertNotEmpty($data);
        $this->assertIsArray($data);
    }

    /**
     * @throws ApolloException
     */
    public function testPull()
    {
        /* @var Config $config */
        $config = BeanFactory::getBean(Config::class);
        $data   = $config->pull('application');

        $this->assertNotEmpty($data);
        $this->assertIsArray($data);

        $releaseKey = $data['releaseKey'];

        $data = $config->pull('application', $releaseKey);
        $this->assertEmpty($data);
    }

    /**
     */
    public function testBatchPull()
    {
        /* @var Config $config */
        $config = BeanFactory::getBean(Config::class);
        $data   = $config->batchPull(['application']);
        $this->assertTrue(isset($data['application']));
        $this->assertNotEmpty($data['application']);
    }
}