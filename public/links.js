var page =window.location.protocol + "//" + window.location.host + "/";
var page_user = page + 'user/';
var page_guest = page + 'guest/';
var page_homeowner = page + 'homeowner/';
$(document).ready(function(){

    var pageUrl = window.location.pathname.split('/');
    pageUrl[0] = "";
    pageUrl[1] = "";
    hasClicked = false;
    $.each(pageUrl, function(x){
        if(pageUrl[x].length > 0){

            if(!hasClicked){
                var name =  '.' +pageUrl[x];
                $(name).addClass('active');
                $(name).click();
                hasClicked = true;
                console.log(name);
            }else{
                var name= '.' +pageUrl[x -1] + "-" +pageUrl[x];
                 $(name).closest("li").addClass('active');
                 console.log(name);
            }
        }
       
    });
   
    var isHidden = true;
        $('#btn_search').click(function(e){
        var c = $('#main-content');
        var searchdiv = $('#div_search');
        e.preventDefault();
        if(isHidden){
             searchdiv.fadeIn();
             searchdiv.animate({ "right": "+=300px"
              }, "slow" ,function(){
                 c.css('-webkit-filter','blur(7px)');
            c.css('-moz-filter','blur(15px)');
            c.css('-o-filter','blur(15px)');
            c.css('-ms-filter','blur(15px)');
            c.css('filter' ,'blur(15px)');

              } );
           
        }
        else{
             
              searchdiv.animate({ "right": "-=300px" }, "slow"  , function(){
                c.css('-webkit-filter','blur(0px)');
                c.css('-moz-filter','blur(0px)');
                c.css('-o-filter','blur(0px)');
                c.css('-ms-filter','blur(0px)');
                c.css('filter' ,'blur(0px)');
                searchdiv.fadeOut();
            });
             
        }
        
      isHidden = !isHidden;
    });

    $('[type=text]').addClass('opacity5');
    $('[type=number]').addClass('opacity5');
    $('[type=email]').addClass('opacity5');
    $('[type=password]').addClass('opacity5');  
    $('textarea').addClass('opacity5');
    $('select').addClass('opacity4');
    $('#btn-save').hide();
    $('.edit').click(function(){
        toggleEditMode($(this));
    });
    $('#btn-save').click(function(){
        save($(this));
    });
    $('#txt_search').on('keyup' , function(){
        setTimeout(search($(this)), 5000);
    });
});
function search(elem){
   var value = elem.val();
   var url = elem.data('url');
   $.get(url , {value : value} , function(result){
        var divResult=  $('#div-results');
      var x= '<div class="desc"><div class="thumb"><span class="badge bg-theme"><i class="fa fa-clock-o"></i>';
      var y= '</span></div><div class="details"><p><muted>';
      
      var z ='</muted><br> <a href="#">Link</a></p></div></div>';
        $.each(result , function(i,obj){
            console.log(obj.id);
            divResult.append(x);
            divResult.append(y);
            divResult.append(obj.id);
            divResult.append(z);
        });
   } ,'json');
}

function save(elem){
    elem.html('Saving..<i class="fa fa-circle-o-notch fa-spin"></i>');
    var data = elem.data();
    var val = $('#value-' + data.id).text();
    $.ajax({
            url : data.url,
            type: 'post',
            data: {
                type : data.type, 
                id : data.id ,
                value : val
            },
            dataType:'json',
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
    }).fail(function(error){
        bootbox.alert('error');
    }).done(function(result){
          elem.html('<i class="fa fa-floppy-o"> </i>');
    });
}
function toggleEditMode(elem){
    var elementid = elem.data('id');
    var searchname = '.editable-' +elementid;
    var saveBtn = '.save-' + elementid;
    var enabled =  $(searchname).attr('contenteditable');
    if(enabled === 'true'){
        enabled = false;
         $(saveBtn).fadeOut();
    }
    else{
        enabled = true;
        $(saveBtn).fadeIn();
    } 
    $(searchname).attr('contenteditable' , enabled);
}