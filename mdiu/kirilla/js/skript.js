var j = jQuery.noConflict();
var element_zap;
j(document).ready(init);
function init()
{
    j(".files").click(function(){ 
      loadInfo(j(this).attr("id"));
    });
  function loadInfo(dok_no) {
    var formData = new FormData();
    formData.append('pap_no', dok_no);
    var app = document.querySelector('.app');
    var title = document.createElement('div');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../papki_js/pap_zap.php', false);//Настраивает запрос на сервер
    xhr.send(formData);
    j("#info").html(xhr.responseText);
    j('.new_el').draggable({ 
      revert:true, 
  cursor:'move', 
  }); 
  }
   j(".lotok").droppable({
      accept: '.new_el',
      tolerance:'pointer',
      drop: function(event,ui)
      {
      logi=1;
      var rezID2;
      //=== Определение папки, в которую кидают
      var draggableId = ui.draggable.attr("id");
      var rezID = "";
      for(var i = 6; i < draggableId.length;i++)
      {
        rezID += draggableId[i];
      }
      var droppableId = j(this).attr("id");
      element_zap= "pap_no="+ droppableId+"&kas_no="+rezID;
      j.ajax({  
              type: "POST",
              url : "papki_js/save.php",
              data:element_zap,//=== Переменная,которая будет передаватся и сохранятся.
              success:function(event,ui){ j("#"+draggableId).on('mousedown').css({display:"none"}); 
            }
      }); 

    }
    });

  (function(j) {
      var CLASSES = j.treeview.classes;
      var proxied = j.fn.treeview;
      j.fn.treeview = function(settings) {
        settings = j.extend({}, settings);
        if (settings.update) {
          return this.trigger("update", [settings.update]);
        }
        return proxied.apply(this, arguments).bind("update", function(event, branches) {
          if (branches.hasClass(CLASSES.last) || branches.hasClass(CLASSES.lastExpandable) || branches.hasClass(CLASSES.lastCollapsable)) {
            branches.prev().addClass(CLASSES.last)
            .filter("." + CLASSES.expandable).replaceClass(CLASSES.last, CLASSES.lastExpandable).end()
            .find(">.hitarea").replaceClass(CLASSES.expandableHitarea, CLASSES.lastExpandableHitarea).end()
            .filter("." + CLASSES.collapsable).replaceClass(CLASSES.last, CLASSES.lastCollapsable).end()
            .find(">.hitarea").replaceClass(CLASSES.collapsableHitarea, CLASSES.lastCollapsableHitarea);
          }
        });
      };
    })(jQuery);
  j.fn.sortableTreeview = function(o) {
    this.each(function() {
      j(this).treeview().sortableTree({
        connectWith: o.connectWith,
        items: 'li',
        helper: function(e,item) {
          return j("<div class='treeview-helper'>"+item.find("span").html()+"</div>");
        },
        //revert: true,
        sortIndication: {
          down: function(item) {
            item.css("border-top", "1px dotted black");
          },
          up: function(item) {
            item.css("border-bottom", "1px dotted black");
          },
          remove: function(item) {
            item.css("border-bottom", "0px").css("border-top", "0px");
          }
        },
        start: function(event, ui) {
          ui.instance.element.treeview({update: ui.item});
        },
        update: function(event, ui) {
          ui.item.removeClass();
          ui.instance.element.treeview({add: ui.item});
        }
      });
      j(".folder", this).droppable({
        accept: "li",
        hoverClass: "drop",
        tolerance: "pointer",
        drop: function(e,ui) {
          j("> ul", this.parentNode).append(ui.draggable);
        },
        over: function(e,ui) {
          ui.helper.css("outline", "2px solid green");
        },
        out: function(e,ui) {
          ui.helper.css("outline", "2px solid red");
        }
      });
    });
  };
  j(function() {
    j("#browser, #browser2").sortableTreeview({ connectWith: ["#browser", "#browser2"] });
  })
}


