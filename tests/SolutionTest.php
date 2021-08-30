<?php

require_once(__DIR__ . '/../src/Solution.php');

class SolutionTest extends PHPUnit\Framework\TestCase {

    /*
     * @covers Src\Solution::getRequiredSolutionCount
     */
    public function testGetRequiredSolutionCount() : void {
        $solution = new Src\Solution(20);
        $this->assertSame(20, $solution->getRequiredSolutionCount());
    }

    /*
     * @covers Src\Solution::setRequiredSolutionCount
     */
    public function testSetRequiredSolutionCount() : void {
        $solution = new Src\Solution(10);
        $solution->setRequiredSolutionCount(20);
        $this->assertSame(20, $solution->getRequiredSolutionCount());
    }

    /*
     * @covers Src\Solution::findSolutions
     */
    public function testFindSolutionsCount() : void {
        $solution = new Src\Solution(10);
        $random = rand(1, 100);
        $solution->setRequiredSolutionCount($random);
        $solutions = $solution->findSolutions();
        $this->assertSame($random, count($solutions));
    }

    /*
     * @covers Src\Solution::findSolutions
     */
    public function testFindSolutions() : void {
        $solution = new Src\Solution(5);
        $computedSolutions = $solution->findSolutions();
        $solutions = [37, 73, 127, 172, 217];
        $this->assertSame($solutions, $computedSolutions);
    }


}