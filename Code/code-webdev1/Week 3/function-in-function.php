<?php

function parentFunction()
{
    function childFunction()
    {
        return "Hallo, ik ben de Child Functie!" . PHP_EOL;
        }
    return "Hallo, ik ben de Parent Functie!";
}

echo parentFunction();                      // de childFunctie wordt pas gereeErd wanneer parentfunction wordt geroepen. !!!!!!!!! E
echo childFunction();