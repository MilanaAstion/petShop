// /admin/comment/edit/{{comment.id}}
let btnCheck = document.querySelectorAll(".check");
for(let btn of btnCheck){
    btn.addEventListener("click", changeState);
}
async function changeState(event){
    event.preventDefault();
    let btn = this;
    let commentId = btn.getAttribute("id_comment");
    let message = document.querySelector("#message");
    // alert(commentId);
    try{
        let response = await fetch("/admin/comment/edit/" + commentId);
        let status = await response.json();
        console.log(status);
        if(status == true){
            btn.parentElement.parentElement.remove(); 
            message.innerHTML = "<div class='alert alert-success mt-3'>Статус успешно изменен</div>"; 
        }
        else{
            message.innerHTML = "<div class='alert alert-danger mt-3'>Ошибка при изменении статуса</div>"; 
        }
    }
    catch(error){
        console.error(error);
    }
}