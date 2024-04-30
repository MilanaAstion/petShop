// /admin/comment/edit/{{comment.id}}
let btnCheck = document.querySelectorAll(".check");
for(let btn of btnCheck){
    btn.addEventListener("click", changeState);
}
function changeState(event){
    event.preventDefault();
    let btn = $(this);
    let commentId = btn.attr("id_comment");
    // alert(commentId);
    $.ajax({ 
        url: "/admin/comment/edit/" + commentId, 
        type: "GET", 
        // dataType: "json", 
        success: function(responce){ 
            if(responce == "true"){
                btn.closest("tr").remove(); 
                $("#message").html("<div class='alert alert-success mt-3'>Статус успешно изменен</div>"); 
            }
            else{
                $("#message").html("<div class='alert alert-danger mt-3'>Ошибка при измении статуса</div>"); 
            }
        }, 
        error: function(xhr, status, error){ 
            console.error(xhr.responseText); 
        } 
    });
}