/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getArtistes(){
    $.ajax({
        url : URL + "consulting/artistes",
        async: true,
        type: "GET",
        datatype: "json",
        success: function(datas){
                createTableArtistes(datas);           
        },
        error: function(){
            alert("problème");
        }
    });
}