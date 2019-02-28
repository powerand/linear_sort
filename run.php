<?
class PowerandPriorityQueue extends SplPriorityQueue {
    public function current() {
        $current = parent::current();
        return $current['priority'];
    }
}
function lsort(array &$data) {
    $pq = new PowerandPriorityQueue();
    foreach ($data as $element) {
        $pq->insert(true, $element);
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
for($i = 0; $i < 1000000; $i++) $data []= rand(0, PHP_INT_MAX);
profile(function () use ($data) {
    lsort($data);
});
