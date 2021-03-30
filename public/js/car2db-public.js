(function( $ ) {
	'use strict';

    $(document).ready(function(){
        car2dbGetType();
        
        $('#carTrim').change(function(){
            car2dbGetEquipment();
        });
        
        $('#carSeries').change(function(){
            car2dbGetModification();
        });
        
        $('#carGeneration').change(function(){
            car2dbGetSeries();
        });
        
        $('#carModel').change(function(){
            car2dbGetGeneration();
        });
        
        $('#carMake').change(function(){
            car2dbGetModel();
        });
        
        $('#carType').change(function(){
            car2dbGetMake();
        });
        
        function car2dbSuccessListUpdate(elementId, elementList){
        
            var opt = '';
            for(var i = 0, max = elementList.length; i < max; i++){
               opt += '<option value="'+elementList[i].id+'">'+elementList[i].name+'</option>';
            }
                
            $(elementId).append(opt);
        }
        
        function car2dbGetAjax(filterElementId, action, updateElementId){
            
            var filterElementVal = $(filterElementId).val();
            
            var request = $.ajax({
                url: ajaxurl,
                method: "GET",
		        data: {
		            action : action,
		            filter_element_val : filterElementVal,
		        },
                dataType: "json"
            });

            request.done(function(data){
                car2dbSuccessListUpdate(updateElementId, data.data);
            });

            request.fail(function(jqXHR, textStatus){
                alert('Request failed: '+textStatus);
            });
        }
        
        function car2dbGetEquipment(){
            $('#carEquipment option').not(':first').remove();
            $('#carCharValue').html('-');
            $('#carOptionValue').html('-');
            
            car2dbGetAjax('#carTrim', 'car2db_get_equipments', '#carEquipment');
        }
        
        function car2dbGetModification(){
            $('#carTrim option').not(':first').remove();
            $('#carEquipment option').not(':first').remove();
            $('#carCharValue').html('-');
            $('#carOptionValue').html('-');
            
            car2dbGetAjax('#carSeries', 'car2db_get_trims', '#carTrim');
        }
        
        function car2dbGetSeries(){
            $('#carSeries option').not(':first').remove();
            $('#carTrim option').not(':first').remove();
            $('#carEquipment option').not(':first').remove();
            $('#carCharValue').html('-');
            $('#carOptionValue').html('-');
            
            car2dbGetAjax('#carGeneration', 'car2db_get_series', '#carSeries');
        }
        
        function car2dbGetGeneration(){
            $('#carGeneration option').not(':first').remove();
            $('#carSeries option').not(':first').remove();
            $('#carTrim option').not(':first').remove();
            $('#carEquipment option').not(':first').remove();
            $('#carCharValue').html('-');
            $('#carOptionValue').html('-');
            
            car2dbGetAjax('#carModel', 'car2db_get_generations', '#carGeneration');
        }
        
        function car2dbGetModel(){
            $('#carModel option').not(':first').remove();
            $('#carGeneration option').not(':first').remove();
            $('#carSeries option').not(':first').remove();
            $('#carTrim option').not(':first').remove();
            $('#carEquipment option').not(':first').remove();
            $('#carCharValue').html('-');
            $('#carOptionValue').html('-');
            
            car2dbGetAjax('#carMake', 'car2db_get_models', '#carModel');
        }
        
        function car2dbGetMake(){
            $('#carMake option').not(':first').remove();
            $('#carModel option').not(':first').remove();
            $('#carGeneration option').not(':first').remove();
            $('#carSeries option').not(':first').remove();
            $('#carTrim option').not(':first').remove();
            $('#carEquipment option').not(':first').remove();
            $('#carCharValue').html('-');
            $('#carOptionValue').html('-');
            
            car2dbGetAjax('#carType', 'car2db_get_makes', '#carMake');
        }
        
        function car2dbGetType(){
            $('#carType option').not(':first').remove();
            $('#carMake option').not(':first').remove();
            $('#carModel option').not(':first').remove();
            $('#carGeneration option').not(':first').remove();
            $('#carSeries option').not(':first').remove();
            $('#carTrim option').not(':first').remove();
            $('#carEquipment option').not(':first').remove();
            $('#carCharValue').html('-');
            $('#carOptionValue').html('-');
            
            car2dbGetAjax(null, 'car2db_get_types', '#carType');
        }
    });



})( jQuery );
