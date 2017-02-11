# Perceptron - lib for php

Perceptron lib provide you a class Perceptron that you can use in order to classify data with mono layer neural network. You will be able to predict targets of given entry data

```php
<?php
require_once("perceptron.class.php");
$perceptron = new Perceptron();
$perceptron->config();
$perceptron->init();
$perceptron->setLearnData($data);
```
