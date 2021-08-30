<?php

/*
 * Thought Process
 * ---------------
 * Step 1:
 * Breakdown the problem to understand what is being asked:
 * The 10 lowest integers where the sum of the digits equals 10 containing a 7
 *
 * Step 2:
 * Create an example x = 37 because 3 + 7 = 10
 *
 * Step 3
 * Solve multiple example cases to determine a pattern and for use in test
 *
 * 037, 073,
 * 127, 172,
 * 217, 271,
 *
 * The pattern is there is 2 solutions every 100 integers, or 10^n
 *
 * Step 4
 * Create an algorithm to solve the problem. Preferably a scalable one to 10^n of the lowest solutions.
 *
 * x = i + temp1 + temp2 && has(7)
 *
 */

namespace Src;

class Solution {

    //This variable only needs to be initialized because its value is set when the class is initialized
    private int $requiredSolutionCount;

    //Initialize the class with a default of 10 required solutions
    public function __construct($requiredSolutionCount = 10) {
        $this->requiredSolutionCount = $requiredSolutionCount;
    }

    //Get the number of required solutions
    public function getRequiredSolutionCount() : int {
        return $this->requiredSolutionCount;
    }

    //Set the number of required solutions, in the event we want more than the default / prompt of 10
    public function setRequiredSolutionCount(int $newValue) : void {
        $this->requiredSolutionCount = $newValue;
    }

    //Find the solutions based on the amount of solutions required
    public function findSolutions() : array {
        //Initialize an empty solutions array
        $solutions = [];

        //How many zeros are we going to allow
        $depth = 3;

        //We know that there are no solutions with only one digit because it does not fit the parameter
        //But also allowed the list to grow depending on the requested total solutions
        for($i = 10; $i < ((10 * ($this->requiredSolutionCount / 2)) ** $depth); $i++) {
            //Stop once we've found how many solutions were asked so we don't have to loop again.
            if(count($solutions) === $this->requiredSolutionCount) break;

            //Split into individual integers
            $x = str_split($i);

            //If the sum of all the elements in the array is 10 and the array contains a 7
            if(array_sum($x) === 10 && in_array(7, $x)) {
                $solutions[] = intval(implode($x));
            }
        }

        //Return the solutions
        return $solutions;
    }

}

$solution = new Solution();
$solutions = $solution->findSolutions();

foreach($solutions as $solution) {
    echo $solution . ", ";
}
