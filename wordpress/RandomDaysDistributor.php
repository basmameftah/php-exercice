<?php

error_reporting(E_ALL); ini_set('display_errors', '1');

define('DATE_FORMAT', 'Y-m-d');
define('PRECISION', 0.01);

$total = htmlspecialchars($_POST['total'], ENT_QUOTES, 'UTF-8');
$baseline = htmlspecialchars($_POST['baseline'], ENT_QUOTES, 'UTF-8');
$start_date = htmlspecialchars($_POST['start_date'], ENT_QUOTES, 'UTF-8');
$end_date = htmlspecialchars($_POST['end_date'], ENT_QUOTES, 'UTF-8');

class Day {
  var $datetime;
  var $value;

  // GETTERS
  function getDate() {
    return $this->datetime->format(DATE_FORMAT);
  }
  function isWeekEnd() {
    return $this->datetime->format('N') >= 6;
  }
  function getValue() {
    return $this->value;
  }

  // SETTERS
  function setDateTime($new_datetime) {
    $this->datetime = $new_datetime;
  }
  function setValue($new_value) {
    $this->value = $new_value;
  }
}

class RandomDaysDistributor {
  // Input Params
  var $start_dt;
  var $end_dt;
  var $baseline;
  var $total;

  // Helper values
  var $count_week_days;
  var $min_value;
  var $dates_array;

  function __construct($start_date, $end_date, $baseline, $total) {
    $this->baseline = $baseline;
    $this->total = $total;
    $this->start_dt = DateTime::createFromFormat(DATE_FORMAT, $start_date);
    $this->end_dt = DateTime::createFromFormat(DATE_FORMAT, $end_date);
    $this->end_dt->modify('+1 day');

    $period = new DatePeriod(
      $this->start_dt,
      new DateInterval('P1D'),
      $this->end_dt
    );

    $this->dates_array = array();
    foreach ($period as $key => $value) {
      $day = new Day();
      $day->setDateTime($value);
      if(!$day->isWeekEnd()) {
        $this->count_week_days++;
      }
      array_push($this->dates_array, $day);
    }
    $this->min_value = round(($this->total * $this->baseline/100) / $this->count_week_days, 2);
  }

  function distribute($values) {
    $this->dates_map = array();
    $index = 0;
    foreach ($this->dates_array as $val) {
      if (!$val->isWeekEnd()) {
        $this->dates_map[$val->getDate()] = $values[$index++];
      } else {
        $this->dates_map[$val->getDate()] = 0;
      }
    }
    return $this->dates_map;
  }

  function randomize() {
    $rnd_values = array();
    $iterations = 0;
    $min_tolerance = ($this->total-PRECISION*$this->total);
    $max_tolerance = (PRECISION*$this->total+$this->total);
    do {
      $rnd_values = array();
      $max_boundary = $this->total;
      if (($this->min_value+$iterations) <= $this->total) {
        $max_boundary = ($this->min_value+$iterations);
      } else {
        $iterations = 0;
        // echo "RESET\n";
      }
      for ($i=0; $i < $this->count_week_days; $i++) {
        array_push($rnd_values, mt_rand($this->min_value*10, ($max_boundary)*10)/10);
      }
      $iterations++;
    } while(!(array_sum($rnd_values) >= $min_tolerance and array_sum($rnd_values) <= $max_tolerance ));
    return $rnd_values;
  }
}

$randomizer = new RandomDaysDistributor($start_date, $end_date, $baseline, $total);
$rnd_sequence = $randomizer->randomize();
$result = $randomizer->distribute($rnd_sequence);

header('Content-Type: application/json');
echo json_encode($result);
