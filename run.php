<?
function lsort(array &$data) {
    $pq = new SplPriorityQueue();
    foreach ($data as $element) {
        $pq->insert($element, $element);
    }
    $data = $pq;
}
function profile($callback) {
    $ts = round(microtime(true) * 1000);
    $callback();
    $te = round(microtime(true) * 1000);
    print_r('Execution time: ' . ($te - $ts) . 'ms' . PHP_EOL);
}
$data = [];
for($i = 0; $i < 1000; $i++) $data []= rand(0, PHP_INT_MAX);
profile(function () {
    global $data;
    lsort($data);
});
foreach ($data as $key => $element) {
    var_dump($element);
}
