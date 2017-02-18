<?php

// 1. Because I needed help understanding what an Equilibrium Index meant, I used google to get a definition.
// 2. Many of the sites used the same example that EquilibriumIndexTest.php uses (i.e., A[0]=-7 A[1]=1 A[2]=5 A[3]=2 A[4]=-4 A[5]=3 A[6]=0), but was interested in seeing other examples because, after seeing the first definition, I wondered, can the sequence be altered? In other words, is the sequence set so that the order of the lower indices and higher indices cannot be altered? For example, can the value at index 4 be moved to index 1, and so on? That is when I found this site (https://discuss.leetcode.com/topic/4/equilibrium-index/3), which used another example and helped me further understand what an Equilibrium Index was and also answered my question.
// 4. My next step will be to create 2 new arrays. The first one will calculate the sums of the sequence's values from left to right using a separate function, namely, leftSum. The second one will do the opposite using the returned array from rightSum (reversing the array so that the same for loop can be run).
// 5. Then I will compare each index using an array map which will run the function called compare to see if the values are equal. If they are, then the index number of that value will constitute an Equilibrium Index, and thus be pushed into $output.
// 6. $output will then be returned.
// Note: I added another test array to EquilibriumIndexTest.php

function leftSum($x) {
	foreach ($x as $i => $val) {
		if ($i == 0) {
			$x[$i] = $x[$i];
		} else {
			$x[$i] += $x[$i - 1];
		}
	}
	return $x;
}

function rightSum($x) {
	$y = array_reverse($x);
	foreach ($y as $i => $val) {
		if ($i == 0) {
			$y[$i] = $y[$i];
		} else {
			$y[$i] += $y[$i - 1];
		}
	}
	return array_reverse($y);
}

function compare($left, $right) {
	return $left == $right;
}

function getEquilibriums($arr) {
	$output = array();
	$leftArr = leftSum($arr);
	$rightArr = rightSum($arr);
	$compare = array_map("compare", $leftArr, $rightArr);
	foreach($compare as $i => $val) {
		if ($val != null) {
			array_push($output, $i);
		}
	}
	return $output;
}