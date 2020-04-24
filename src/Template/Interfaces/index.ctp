<script>




$( document ).ready(function() {


        $("#location_id").change(function(){
  //alert("The text has been changed.");

   console.log($("#location_id").val());

var location = $("#location_id").val();








// $.ajax({url: "http://localhost/interfacepanel/LocationInterfaces.json", success: function(result){
        $.ajax({url: "http://localhost/interfacepanel/LocationInterfaces/view/"+location+".json", success: function(result){

  //console.log(result);
/*

  $.each(data.Countries, function (i, item) {
    trHTML += '<tr><td>' + item + '</td><td>' + data.Cities[i] + '</td></tr>';
});

$('#location').append(trHTML);

*/
/*
for( i in result.LocationInterfaces)
  {

          console.log(result.LocationInterfaces[i]);
  }
*/

 // $("#Table1").empty();
 // $("#Table1 tr").remove(); 
  $("#Table1").find("tr:gt(0)").remove();

var options = $("#Table1");
///console.log("antes del each");
var trHTML = "";
    $.each( result.LocationInterfaces, function(key, val) {
           // console.log("agregando opcion key: "+key +" val: "+val);

       //    console.log(val.id);


               trHTML += "<tr><td>" + val.interface_name + "</td><td>" + val.interface_path + "</td><td><input type='checkbox' /></td></tr>";




//           console.log(val);



           
  });

//console.log(trHTML);
//console.log("haciendo el append");
  $('#Table1').append(trHTML);

//console.log("despues de hacer el append");


  }});









});
        
        console.log("Document ready");













        
 $.ajax({url: "http://localhost/interfacepanel/Locations.json", success: function(result){
  
  //console.log(result);

for( i in result.Locations)
  {

         // console.log(result.Locations[i]);
  }//
var options = $("#location_id");
//console.log("antes del each");
    $.each( result.Locations, function(key, val) {
           // console.log("agregando opcion key: "+key +" val: "+val);
           // console.log(val);
    options.append(new Option(val.name,val.id));
  });


  }});



        $("#refresh").click(function () {

           //     alert("refresh");













 $.ajax({url: "http://localhost/interfacepanel/LatestRuns.json", success: function(result){
  
  //console.log(result.LatestRuns[0].ouput);

  $("#resultpanel").val(result.LatestRuns[0].ouput);



  }});






                
        });

    
        $("#run").click(function () {



         
	   var oArray = { 
                   
                   interface : []
                   };

	   
           var message = "Interfaz Descripcion                  Correr\n";
 
            //Loop through all checked CheckBoxes in GridView.
           $("#Table1 input[type=checkbox]:checked").each(function () {
                var row = $(this).closest("tr")[0];
                message += row.cells[0].innerHTML;
                message += "   " + row.cells[1].innerHTML;
                message += "   " + row.cells[2].innerHTML;
                message += "\n";
                var inter  = {};
		
		inter.nombre      = row.cells[0].innerHTML;
		inter.descripcion = row.cells[1].innerHTML;
		inter.sucursal    = $("#location_id").val();

		oArray.interface.push(inter);
               console.log(oArray.interface);


            });
 
            //Display selected Row data in Alert Box.
            //alert(message);
	    //alert(JSON.stringify(oArray.interface));
           // console.log(oArray.interface);

            for( i in oArray.interface)
            {

                //console.log(oArray.interface[i]);


               // console.log("haciendo el post al server...");
                $.ajax({url: "http://localhost/interfacepanel/InterfacesRun/add", 
                data: oArray.interface[i], 
                async: false,
                method: "POST", 
                success: function(result){
                

                console.log("resultado de la llamada al api");
                console.log(result);



                }});


  





            }

            var ilen =  oArray.interface.length;
            console.log("Contador de rows en tabla de interfaces: "+ilen);

            if(ilen== 0)
            {

                    alert("No hay interfaces seleccionadas para correr");
            }


            return false;

        });
	
});

</script>

<h2>Interface Pad</h2>

<?php echo $this->Form->create('Interface', array('type'=>'file', 'onSubmit'=>'return onSubmit();', 'action'=>'add'));?>


<?php

//$location = ['1' => 'BENITO JUAREZ', '2' => 'CHAPULTEPEC'];


echo $this->Form->select('location', null, array( "id"=> "location_id", "class"=>"form-control", "style" => "width:300px;margin-top:50px"));
?>


<div class = "container" style = "overflow-y: auto;width: auto;height: 500px;">
<table id = "Table1" class="table table-striped" style = "margin-top:50px;overflow-y: auto;width: 200px;height: 40px;">
<tr>
<td> Interfaz </td>
<td> Descripción  </td>
<td> Correr </td>
</tr>


<?php

/*
foreach($loci as $l)
{
echo "<tr>";
echo "<td>".  $l["interface_name"]." </td>";
echo "<td>".  $l["interface_description"]." </td>";
echo "<td><input type='checkbox' /></td>";

echo "</tr>";


}*/


?>



</table>
<!--
<input type="button" style="width:90px;height:80px;background-image:url('http://192.168.19.88/interfacepanel/img/cleanicon2.png')"/>
-->


</div>

<textarea class = "form-control" id = "resultpanel" rows = "10" placeholder = "Resultados de las interfaces"></textarea>

<button type="button" id = "run" class="btn btn-primary btn-lg" style = "margin-top:30px">Ejecutar interfaces</button>
<button type="button" id = "refresh" class="btn btn-primary btn-lg" style = "margin-top:30px">Refresh</button>





<?php echo $this->Form->end();?>

