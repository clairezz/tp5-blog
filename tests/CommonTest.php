<?php
namespace tests;


class CommonTest extends TestCase {

    public function provider() {
        return [
            '112相加' => [1,1,2],
            '224相加' => [2,2,4],
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testAdd($a, $b, $expected) {
        $this->assertEquals($expected, add($a, $b));
    }
}
