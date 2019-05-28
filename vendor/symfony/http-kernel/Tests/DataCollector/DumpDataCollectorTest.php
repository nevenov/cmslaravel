<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\DataCollector;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\DataCollector\DumpDataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\Cloner\Data;
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DumpDataCollector;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Server\Connection;
>>>>>>> dev

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
<<<<<<< HEAD
class DumpDataCollectorTest extends \PHPUnit_Framework_TestCase
{
    public function testDump()
    {
        $data = new Data(array(array(123)));
=======
class DumpDataCollectorTest extends TestCase
{
    public function testDump()
    {
        $data = new Data([[123]]);
>>>>>>> dev

        $collector = new DumpDataCollector();

        $this->assertSame('dump', $collector->getName());

        $collector->dump($data);
        $line = __LINE__ - 1;
        $this->assertSame(1, $collector->getDumpsCount());

        $dump = $collector->getDumps('html');
<<<<<<< HEAD
        $this->assertTrue(isset($dump[0]['data']));
        $dump[0]['data'] = preg_replace('/^.*?<pre/', '<pre', $dump[0]['data']);
        $dump[0]['data'] = preg_replace('/sf-dump-\d+/', 'sf-dump', $dump[0]['data']);

        $xDump = array(
            array(
=======
        $this->assertArrayHasKey('data', $dump[0]);
        $dump[0]['data'] = preg_replace('/^.*?<pre/', '<pre', $dump[0]['data']);
        $dump[0]['data'] = preg_replace('/sf-dump-\d+/', 'sf-dump', $dump[0]['data']);

        $xDump = [
            [
>>>>>>> dev
                'data' => "<pre class=sf-dump id=sf-dump data-indent-pad=\"  \"><span class=sf-dump-num>123</span>\n</pre><script>Sfdump(\"sf-dump\")</script>\n",
                'name' => 'DumpDataCollectorTest.php',
                'file' => __FILE__,
                'line' => $line,
                'fileExcerpt' => false,
<<<<<<< HEAD
            ),
        );
        $this->assertEquals($xDump, $dump);

        $this->assertStringMatchesFormat(
            'a:1:{i:0;a:5:{s:4:"data";O:39:"Symfony\Component\VarDumper\Cloner\Data":4:{s:45:"Symfony\Component\VarDumper\Cloner\Datadata";a:1:{i:0;a:1:{i:0;i:123;}}s:49:"Symfony\Component\VarDumper\Cloner\DatamaxDepth";i:%i;s:57:"Symfony\Component\VarDumper\Cloner\DatamaxItemsPerDepth";i:%i;s:54:"Symfony\Component\VarDumper\Cloner\DatauseRefHandles";i:%i;}s:4:"name";s:25:"DumpDataCollectorTest.php";s:4:"file";s:%a',
            str_replace("\0", '', $collector->serialize())
        );

        $this->assertSame(0, $collector->getDumpsCount());
        $this->assertSame('a:0:{}', $collector->serialize());
=======
            ],
        ];
        $this->assertEquals($xDump, $dump);

        $this->assertStringMatchesFormat('a:3:{i:0;a:5:{s:4:"data";%c:39:"Symfony\Component\VarDumper\Cloner\Data":%a', $collector->serialize());
        $this->assertSame(0, $collector->getDumpsCount());
        $this->assertSame('a:2:{i:0;b:0;i:1;s:5:"UTF-8";}', $collector->serialize());
    }

    public function testDumpWithServerConnection()
    {
        $data = new Data([[123]]);

        // Server is up, server dumper is used
        $serverDumper = $this->getMockBuilder(Connection::class)->disableOriginalConstructor()->getMock();
        $serverDumper->expects($this->once())->method('write')->willReturn(true);

        $collector = new DumpDataCollector(null, null, null, null, $serverDumper);
        $collector->dump($data);

        // Collect doesn't re-trigger dump
        ob_start();
        $collector->collect(new Request(), new Response());
        $this->assertEmpty(ob_get_clean());
        $this->assertStringMatchesFormat('a:3:{i:0;a:5:{s:4:"data";%c:39:"Symfony\Component\VarDumper\Cloner\Data":%a', $collector->serialize());
>>>>>>> dev
    }

    public function testCollectDefault()
    {
<<<<<<< HEAD
        $data = new Data(array(array(123)));
=======
        $data = new Data([[123]]);
>>>>>>> dev

        $collector = new DumpDataCollector();

        $collector->dump($data);
        $line = __LINE__ - 1;

        ob_start();
        $collector->collect(new Request(), new Response());
<<<<<<< HEAD
        $output = ob_get_clean();
=======
        $output = preg_replace("/\033\[[^m]*m/", '', ob_get_clean());
>>>>>>> dev

        $this->assertSame("DumpDataCollectorTest.php on line {$line}:\n123\n", $output);
        $this->assertSame(1, $collector->getDumpsCount());
        $collector->serialize();
    }

    public function testCollectHtml()
    {
<<<<<<< HEAD
        $data = new Data(array(array(123)));
=======
        $data = new Data([[123]]);
>>>>>>> dev

        $collector = new DumpDataCollector(null, 'test://%f:%l');

        $collector->dump($data);
        $line = __LINE__ - 1;
        $file = __FILE__;
        $xOutput = <<<EOTXT
<<<<<<< HEAD
 <pre class=sf-dump id=sf-dump data-indent-pad="  "><a href="test://{$file}:{$line}" title="{$file}"><span class=sf-dump-meta>DumpDataCollectorTest.php</span></a> on line <span class=sf-dump-meta>{$line}</span>:
<span class=sf-dump-num>123</span>
</pre>

=======
<pre class=sf-dump id=sf-dump data-indent-pad="  "><a href="test://{$file}:{$line}" title="{$file}"><span class=sf-dump-meta>DumpDataCollectorTest.php</span></a> on line <span class=sf-dump-meta>{$line}</span>:
<span class=sf-dump-num>123</span>
</pre>
>>>>>>> dev
EOTXT;

        ob_start();
        $response = new Response();
        $response->headers->set('Content-Type', 'text/html');
        $collector->collect(new Request(), $response);
        $output = ob_get_clean();
        $output = preg_replace('#<(script|style).*?</\1>#s', '', $output);
        $output = preg_replace('/sf-dump-\d+/', 'sf-dump', $output);

<<<<<<< HEAD
        $this->assertSame($xOutput, $output);
=======
        $this->assertSame($xOutput, trim($output));
>>>>>>> dev
        $this->assertSame(1, $collector->getDumpsCount());
        $collector->serialize();
    }

    public function testFlush()
    {
<<<<<<< HEAD
        $data = new Data(array(array(456)));
=======
        $data = new Data([[456]]);
>>>>>>> dev
        $collector = new DumpDataCollector();
        $collector->dump($data);
        $line = __LINE__ - 1;

        ob_start();
        $collector->__destruct();
<<<<<<< HEAD
        $this->assertSame("DumpDataCollectorTest.php on line {$line}:\n456\n", ob_get_clean());
=======
        $output = preg_replace("/\033\[[^m]*m/", '', ob_get_clean());
        $this->assertSame("DumpDataCollectorTest.php on line {$line}:\n456\n", $output);
    }

    public function testFlushNothingWhenDataDumperIsProvided()
    {
        $data = new Data([[456]]);
        $dumper = new CliDumper('php://output');
        $collector = new DumpDataCollector(null, null, null, null, $dumper);

        ob_start();
        $collector->dump($data);
        $line = __LINE__ - 1;
        $output = preg_replace("/\033\[[^m]*m/", '', ob_get_clean());

        $this->assertSame("DumpDataCollectorTest.php on line {$line}:\n456\n", $output);

        ob_start();
        $collector->__destruct();
        $this->assertEmpty(ob_get_clean());
>>>>>>> dev
    }
}
