<?php 
 class util extends container{
  

   function get_country(){
    $r = '<option selected="selected" style="padding: 3px 0 0 7px;" value="NG">Nigeria</option>';
    return $r;
   }

   function get_location_area(){
    $r = '<option style="padding:3px;" value="">Select Area</option>
	<option style="padding:3px;" value="77"> Akwa Ibom</option>
	<option style="padding:3px;" value="78">Aba</option>
	<option style="padding:3px;" value="79">Abakaliki</option>
	<option style="padding:3px;" value="60">Abeokuta</option>
	<option style="padding:3px;" value="70">Abuja</option>
	<option style="padding:3px;" value="62">Ado-Ekiti</option>
	<option style="padding:3px;" value="61">Akure</option>
	<option style="padding:3px;" value="80">Asaba</option>
	<option style="padding:3px;" value="81">Awka</option>
	<option style="padding:3px;" value="82">Bauchi</option>
	<option style="padding:3px;" value="83">Benin</option>
	<option style="padding:3px;" value="84">Bida</option>
	<option style="padding:3px;" value="85">Bonny</option>
	<option style="padding:3px;" value="74">Calabar</option>
	<option style="padding:3px;" value="86">Damaturu</option>
	<option style="padding:3px;" value="87">Dutse</option>
	<option style="padding:3px;" value="EKET">EKET</option>
	<option style="padding:3px;" value="88">Enugu</option>
	<option style="padding:3px;" value="89">Gombe</option>
	<option style="padding:3px;" value="90">Gusau</option>
	<option style="padding:3px;" value="GWA">GWA</option>
	<option style="padding:3px;" value="63">Ibadan</option>
	<option style="padding:3px;" value="64">Ife</option>
	<option style="padding:3px;" value="65">Ijebu</option>
	<option style="padding:3px;" value="IJEBU">IJEBU-ODE</option>
	<option style="padding:3px;" value="91">Ikot Ekpene</option>
	<option style="padding:3px;" value="IKOT-">IKOT-EKPENE</option>
	<option style="padding:3px;" value="66">Ilorin</option>
	<option style="padding:3px;" value="92">Jalingo</option>
	<option style="padding:3px;" value="73">jos</option>
	<option style="padding:3px;" value="76">kaduna</option>
	<option style="padding:3px;" value="75">Kano</option>
	<option style="padding:3px;" value="93">Kastina</option>
	<option style="padding:3px;" value="94">Lafia</option>
	<option style="padding:3px;" value="59">Lagos Island</option>
	<option style="padding:3px;" value="58">Lagos Mainland</option>
	<option style="padding:3px;" value="95">Lokoja</option>
	<option style="padding:3px;" value="71">Maiduguri</option>
	<option style="padding:3px;" value="96">Makurdi</option>
	<option style="padding:3px;" value="97">Minna</option>
	<option style="padding:3px;" value="98">Nnewi</option>
	<option style="padding:3px;" value="99">Nsuka</option>
	<option style="padding:3px;" value="NSUKK">NSUKKA</option>
	<option style="padding:3px;" value="OFFA">OFFA</option>
	<option style="padding:3px;" value="67">Ogbomosho</option>
	<option style="padding:3px;" value="100">Okigwe</option>
	<option style="padding:3px;" value="102">Onitsha</option>
	<option style="padding:3px;" value="68">Oshogbo</option>
	<option style="padding:3px;" value="101">Owerri</option>
	<option style="padding:3px;" value="72">Port-Harcourt</option>
	<option style="padding:3px;" value="SAGAM">SAGAMU</option>
	<option style="padding:3px;" value="SAPEL">SAPELE</option>
	<option style="padding:3px;" value="69">Shagamu</option>
	<option style="padding:3px;" value="103">sokoto</option>
	<option style="padding:3px;" value="104">Suleja</option>
	<option style="padding:3px;" value="UHUMA">UHUMAHIA</option>
	<option style="padding:3px;" value="105">Umuahia</option>
	<option style="padding:3px;" value="106">Uyo</option>
	<option style="padding:3px;" value="107">Warri</option>
	<option style="padding:3px;" value="108">Yenagoa</option>
	<option style="padding:3px;" value="109">Yola</option>
	<option style="padding:3px;" value="110">Zaria</option>';
    return $r;
   }

   function get_delivery_time(){
    $r = '<option style="padding: 3px 0 0 7px;" value="">Select Delivery Time</option>
    <option style="padding: 3px 0 0 7px;" value="Morning 8am-11am">Morning 8am-11am</option>
    <option style="padding: 3px 0 0 7px;" value="Afternoon 12pm-3pm">Afternoon 12pm-3pm</option>
    <option style="padding: 3px 0 0 7px;" value="Evening 4pm-6pm">Evening 4pm-6pm</option>';
    return $r;
   }

   function get_preferred_delivery(){
   	$r = '<option value="in_store_pick_up">In-Store Pick Up</option>
          <option value="fedex">FedEx (Ground Home Delivery)</option>
   	     ';
    return $r;
   }



 }
?>