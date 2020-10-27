<?php
declare(strict_types=1);

namespace SwoftTest\Crontab\Unit;

use PHPUnit\Framework\TestCase;
use Swoft\Crontab\CrontabExpression;

class CrontabExpressTest extends TestCase
{
    public function testParse()
    {
        $expression = CrontabExpression::parse("");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("** * * *");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("* * * * * * *");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("66");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("* 66");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("* * 26");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("* * * 32");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("* * * * 13");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("* * * * * 8");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("* * * * * 3.2");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("22-70");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("22-70");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("22/70");
        $this->assertEquals($expression,false);

        $expression = CrontabExpression::parse("1,3,70");
        $this->assertEquals($expression,false);


        $expression = CrontabExpression::parse("*");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("* * *");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("* * * * * *");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("1");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("* 1");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("* * 1");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("* * * 1");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("* * * * 1");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("* * * * * 1");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("1 1 1 1 1 1");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("1,2,3,4,5");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("49-55");
        $this->assertEquals($expression,true);

        $expression = CrontabExpression::parse("49/55");
        $this->assertEquals($expression,true);
    }

    public function testSecondParse()
    {
        $data = CrontabExpression::parseCronItem("*");
        $examp = ['*'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("?");
        $examp = ['?'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("0-5");
        $examp[0]=range(0,5);
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("0,3,7,10");
        $examp[0]=[0,3,7,10];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("20/3");
        $examp[0]=[20,23,26,29,32,35,38,41,44,47,50,53,56,59];
        $this->assertEquals($examp,$data);
    }

    public function testMinuteParse()
    {
        $data = CrontabExpression::parseCronItem("* *");
        $examp = ['*','*'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* ?");
        $examp = ['*','?'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* 0-5");
        $examp[1]=range(0,5);
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* 0,3,7,10");
        $examp[1]=[0,3,7,10];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* 20/3");
        $examp[1]=[20,23,26,29,32,35,38,41,44,47,50,53,56,59];
        $this->assertEquals($examp,$data);
    }

    public function testHoursParse()
    {
        $data = CrontabExpression::parseCronItem("* * *");
        $examp = ['*','*','*'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * ?");
        $examp = ['*','*','?'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * 0-5");
        $examp[2]=range(0,5);
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * 0,3,7,10");
        $examp[2]=[0,3,7,10];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * 20/3");
        $examp[2]=[20,23];
        $this->assertEquals($examp,$data);
    }

    public function testDayParse()
    {
        $data = CrontabExpression::parseCronItem("* * * *");
        $examp = ['*','*','*','*'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * ?");
        $examp = ['*','*','*','?'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * 0-5");
        $examp[3]=range(0,5);
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * 0,3,7,10");
        $examp[3]=[0,3,7,10];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * 20/3");
        $examp[3]=[20,23,26,29];
        $this->assertEquals($examp,$data);
    }

    public function testMonthParse()
    {
        $data = CrontabExpression::parseCronItem("* * * * *");
        $examp = ['*','*','*','*','*'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * * ?");
        $examp = ['*','*','*','*','?'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * * 0-5");
        $examp[4]=range(0,5);
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * * 0,3,7,10");
        $examp[4]=[0,3,7,10];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * * 2/3");
        $examp[4]=[2,5,8,11];
        $this->assertEquals($examp,$data);
    }

    public function testWeekParse()
    {
        $data = CrontabExpression::parseCronItem("* * * * * *");
        $examp = ['*','*','*','*','*','*'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * * * ?");
        $examp = ['*','*','*','*','*','?'];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * * * 0-5");
        $examp[5]=range(0,5);
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * * * 0,3,6");
        $examp[5]=[0,3,6];
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("* * * * * 1/3");
        $examp[5]=[1,4];
        $this->assertEquals($examp,$data);
    }

    public function testComplexParse()
    {
        $data = CrontabExpression::parseCronItem("0 2 * * * *");
        $examp[0]=[0];
        $examp[1]=[2];
        $examp[2]='*';
        $examp[3]='*';
        $examp[4]='*';
        $examp[5]='*';
        $this->assertEquals($examp,$data);

        $data = CrontabExpression::parseCronItem("0 2 2/3 * * *");
        $examp[0]=[0];
        $examp[1]=[2];
        $examp[2]=[2,5,8,11,14,17,20,23];
        $examp[3]='*';
        $examp[4]='*';
        $examp[5]='*';
        $this->assertEquals($examp,$data);
    }

}
