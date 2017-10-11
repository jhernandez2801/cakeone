/**
 * Created by tec101 on 10/10/2017.
 */
$(document).ready(function(){
    $("#s").autocomplete({
        minLength: 2,
        select: function(event, ui){
            $("#s").val(ui.item.label);
        },
        source: function (request,response){
            $.ajax({
               url: basePath+"users/searchjson",
                data: {
                    term: request.term
                },
                dataType:"json",
                success: function(data){
                    $("#table").empty();
                    $(".paginator").hide();
                    response($.map(data,function(el,index){
                        var btnview="<a href='/cakeone/users/view/"+el.id+"' class='btn btn-sm btn-info'>View</a>";
                        var btnedit="<a href='/cakeone/users/edit/"+el.id+"' class='btn btn-sm btn-primary'>Edit</a>";
                        var btndelete="<form name='post_"+el.id+"' style='display:none;' method='post' action='/cakeone/users/delete/"+el.id+"'>";
                            btndelete+="<input type='hidden' name='_method' value='POST'/></form>";
                            btndelete+="<a href='#' class='btn btn-sm btn-danger' onclick='if (confirm(&quot;Are you sure you want to delete # "+el.id+"?&quot;)) { document.post_"+el.id+".submit(); } event.returnValue = false; return false;'>Delete</a>";
                        var cadena="<tr><td>"+el.id+"</td>";
                        cadena+="<td>"+el.first_name+"</td>";
                        cadena+="<td>"+el.last_name+"</td>";
                        cadena+="<td>"+el.email+"</td>";
                        if(el.role!='admin'){
                            cadena+="<td>"+btnview+" "+btnedit+" "+btndelete+"</td></tr>";
                        }else{
                            cadena+="<td>"+btnview+" "+btnedit+"</td></tr>";
                        }
                        $("#table").append(cadena);
                        return {
                            value: el.first_name+" "+el.last_name,
                            nombre: el.first_name,
                            apellido: el.last_name,

                        };
                    }));
                }
            });
        }
    }).data("ui-autocomplete")._renderItem = function(ul,item){
        return $("<li></li>")
            .data("item.autocomplete", item)
            .append("<a>"+item.nombre+" "+item.apellido+"</a>")
            .appendTo(ul)
    };
});
