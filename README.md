# phptechnicaltask

Thanks for the opportunity



PHP UNIT TESTING RESULTS

challenge]$ ./phpunit challengeTest.php
<pre><h1>RANDOM FIVE CARDS ARE</h1><br/>Array
(
    [0] => Qd
    [1] => Ad
    [2] => 3h
    [3] => 9d
    [4] => 7d
)
<h1>Straight Flush/Straight Check?</h1><br/>N/A<h1>FORCED STRAIGHT FLUSH USING 9c, 10c, Jc, Qc, Kc</h1><br/>Array
(
    [0] => 9c
    [1] => 10c
    [2] => Jc
    [3] => Qc
    [4] => Kc
)
Straight Flush<h1>FORCED STRAIGHT USING 1s, 2s, 3c, 4d, 5c </h1><br/>StraightPHPUnit 8.5.8 by Sebastian Bergmann and contributors.

..F                                                                 3 / 3 (100%)

Time: 106 ms, Memory: 10.00 MB

There was 1 failure:

1) challengeTest::testfWithNone
Failed asserting that two strings are equal.
--- Expected
+++ Actual
@@ @@
-''
+'N/A'

/home/birobit/public_html/challenge/challengeTest.php:38

FAILURES!
Tests: 3, Assertions: 3, Failures: 1.
challenge]$
