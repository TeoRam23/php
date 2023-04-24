<?php
$år = date("Y");
$oscar;
$ludvig;
$beate;

$navn1 = "Oscar";
$navn2 = "Ludvig";
$navn3 = "Beate";

$alder1 = 1980;
$alder2 = 2003;
$alder3 = 2007;

$alder1 = $år - $alder1;
$alder2 = $år - $alder2;
$alder3 = $år - $alder3;

echo "$navn1 er $alder1 år, $navn2 er $alder2 år og $navn3 er $alder3 år. <br>";

$differanse1 = $alder1 - $alder2;
$differanse2 = $alder1 - $alder3;
$differanse3 = $alder2 - $alder3;
echo "$navn1 er $differanse1 år eldre enn $navn2 og $differanse2 år eldre enn $navn3. $navn2 er $differanse3 år eldre enn $navn3.<br>";

?>