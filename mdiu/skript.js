var j = jQuery.noConflict();

  
  j(document).ready(function(){
    j("#browser").treeview({
      toggle: function() {
        console.log("%s was toggled.", j(this).find(">span").text());
      }
    });
    
    j("#add").click(function() {
      var branches = j("<li><span class='folder'>New Sublist</span><ul>" + 
        "<li><span class='file'>Item1</span></li>" + 
        "<li><span class='file'>Item2</span></li></ul></li>").appendTo("#browser");
      j("#browser").treeview({
        add: branches
      });
    });
  });
 
//==================================000000000000000=======================
 j(document).ready(init2);
function init2(){
  j(".content3").draggable({
    revert:true,
    cursor:'move'
  }).css({
          background:"#FFFFE0",
          heigth:"30px",
          borderStyle:"dashed", 
          borderColor:"#F4A460",
          width:"500px",
          color:"black",
        });
}   
//==================================000000000000000=======================
var element_zap;



//==================================1111111111111111=======================
j(document).ready(init);
function init()
{
  //=== Функция для вычесления захватываемого элемента
  j("p").hover(function(){
    var znach = j(this).html();
   element_zap = "koment="+znach;
  });

  //=== Функция для вычесления папки, в которую скинули и сохранение данных
  j(".suka").droppable({
      accept: '.content3', //=== класс, на который будет реакция 
      drop: function(event,ui)
      {
        //=== Определение папки, в которую кидают
          var draggableId = ui.draggable.attr("id");
          //element_zap="&draggableId="+draggableId;
          var droppableId = j(this).attr("id");
          element_zap += "& dok_no="+ droppableId+"&kas_no="+draggableId;
          //=== Передача даных для сохранения в базу даных. 
          j.ajax({  
            type: "GET",//=== Метод передачи данных
            url: "save.php",//=== файл в котором будетзапрос на сохранение 
            data:element_zap,//=== Переменная,которая будет передаватся и сохранятся.
            success:function(html){alert(element_zap);   ShowOrHide(draggableId);j("#content").html(html);}  
        }); 
      }
    });
}
 
//==================================1111111111111111=======================


//==================================222222222222222222======================
//Функция скрывает перемещаемый элемент

function ShowOrHide(id){  
if (document.getElementById(id).style.display == "none")
   {document.getElementById(id).style.display = "block"}
else 
   {document.getElementById(id).style.display = "none"}
}
//==================================222222222222222222=======================



//==================================333333333333333333=======================
function destroy()
{
if (confirm("Вы уверены?")) 
alert("Неужели вы думаете, что я позволю сделать это!?");
else
alert("Вопрос закрыт!") ;
}
//==================================333333333333333333=======================
