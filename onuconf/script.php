<?php

$onuname =	$_POST['onuname'];
$onunumber =	$_POST['onunumber'];
$lineprofile =	$_POST['lineprofile'];
$snmpprofile =	$_POST['snmpprofile'];
$serial =	$_POST['serial'];
$pon =	$_POST['pon'];
$vlan =	$_POST['vlan'];

if (empty($snmpprofile)){
echo "dot1q vlan $vlan name PON16 interface ten-gigabit-ethernet-1/1/$pon tagged</br>
!</br>
!</br>
commit</br>

service vlan $vlan type n:1</br>
!</br>
commit</br>

interface gpon 1/1/$pon</br>
 no shutdown</br>
 onu $onunumber</br>
  name $onuname</br>
  serial-number $serial  </br>
  line-profile $lineprofile</br>
  ethernet 1</br>
   negotiation</br>
   no shutdown</br>
   native vlan vlan-id $vlan</br>
  !</br>
 !</br>
!</br>
service-port new</br>
 gpon 1/1/4 onu $onunumber gem 1 match vlan vlan-id 706 action vlan replace vlan-id 706</br>
!</br>
commit";

}else{
echo "dot1q vlan $vlan name PON16 interface ten-gigabit-ethernet-1/1/$pon tagged</br>
!</br>
!</br>
commit</br>

service vlan $vlan type n:1</br>
!</br>
commit</br>

interface gpon 1/1/$pon</br>
 no shutdown</br>
 onu $onunumber</br>
  name $onuname</br>
  serial-number $serial  </br>
  line-profile $lineprofile</br>
  snmp profile $snmpprofile</br>
  snmp real-time</br>
  ethernet 1</br>
   negotiation</br>
   no shutdown</br>
   native vlan vlan-id $vlan</br>
  !</br>
 !</br>
!</br>
service-port new</br>
 gpon 1/1/4 onu $onunumber gem 1 match vlan vlan-id $vlan action vlan replace vlan-id $vlan</br>
!</br>
commit";
}

?>