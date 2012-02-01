<?php
function functionA() {
   echo "A begin\n";
   try {
      echo "Try begin\n"; functionB(); echo "Try end\n";
   } catch (Exception $e) {
      echo $e->getMessage(); 
      echo ' in the file '.$e->getFile();
      echo ' at line '.$e->getLine()."\n";
   }
   echo "A end\n";
}

function functionB() {
   echo "B begin\n"; functionC(); echo "B end\n";
}

function functionC() {
   echo "C begin\n";
   throw new Exception("Exception test");
   echo "C end\n";
}

functionA();