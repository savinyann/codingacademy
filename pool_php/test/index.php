<?php
$form = array();


//proto:
	array["txt_text"] = "text";
	array["pas_password"] = "passwordœ";
	array["ema_email"] = "email";
	array["url_link"] = "url";
	array["tel_telephone"] = "telephone";
	array["num_number"] = "number";
	array["col_color"] = "color";
	array["dat_date"] = "date";
	array["sea_search"] = "search";
	array["che_checkbox"] = "checkbox";
	array["rad_radio"] = "radio";
	array["sel_select"] = "select";*/	

?>

<form>
	

	<p><label for="text">text</label>
	<input name="text" placeholder="text" type="text" id="text"></p>


	<p><label for="email">email</label>
	<input name="email" placeholder="email" type="email" id="email"></p>



	<p><label for="url">url</label>
	<input name="url" placeholder="url" type="url" id="url"></p>


	<p><label for="tel">tel</label>
	<input name="tel" type="tel" placeholder="tel" id="tel"></p>


	<p><label for="number">number</label>
	<input name="number" placeholder="number" type="number" id="number" min="0" max="100" step="5"></p>



	<p><label for="color">color</label>
	<input name="color" placeholder="color" type="color" id="color"></p>


	<p><label for="date">date</label>
	<input name="date" placeholder="date" type="date" id="date"></p>


	<p><label for="search">search</label>
	<input name="search" placeholder="search" type="search" id="search"></p>


	<p><label for="checkbox1">checkbox1</label>
	<input name="checkbox1" placeholder="checkbox1" type="checkbox" id="checkbox1"></p>


	<p><label for="checkbox2">checkbox2</label>
	<input name="checkbox2" placeholder="checkbox2" type="checkbox" id="checkbox2" checked></p>


	<p><label for="radio">radio</label>
	<input name="radio" placeholder="radio" type="radio" id="radio"></p>


	<p><label for="select">select</label><br>
	<select name="cars" id="select" size="3">
		<option value="volvo">Volvo</option>
		<option value="saab">Saab</option>
		<option value="fiat">Fiat</option>
		<option value="audi">Audi</option>
	</select></p>


   <p><label for="pays">Dans quel pays habitez-vous ?</label><br />
       <select name="pays" id="pays">
           <optgroup label="Europe">
               ><option value="france">France</option>
               <option value="espagne">Espagne</option>
               <option value="italie">Italie</option>
               <option value="royaume-uni">Royaume-Uni</option>
           </optgroup>
           <optgroup label="Amérique">
               <option value="canada">Canada</option>
               <option value="etats-unis">Etats-Unis</option>
           </optgroup>
           <optgroup label="Asie">
               <option value="chine">Chine</option>
               <option value="japon">Japon</option>
           </optgroup>
       </select></p>


	<p><label for="textarea">textarea</label>
	<textarea name="message" rows="10" cols="30" id="textarea">The cat was playing in the garden.</textarea></p>

 	<p><button type="button" onclick="alert('Hello World!')">Click Me!</button></p>








</form>