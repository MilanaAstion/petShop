let quickView = document.querySelectorAll("#quick-view");
for(let btn of quickView){
    btn.addEventListener("click", getInfoProduct);
}
function getInfoProduct(){
    // let prodId = this.getAttribute("data-prod-id");
    // let prodId = this.dataset.prod_id;
    let prodId = $(this).data("prod_id");
    $.ajax({ 
        url: "/product/info/" + prodId, 
        type: "GET", 
        dataType: "json", 
        success: function(product){ 
            // document.querySelector(".qwick-view-content h3").innerText = product.name;
            $(".qwick-view-content h3").text(product.name);
            $(".qwick-view-content .new").text("$" + product.price+ ".00");
            if(product.old_price){
                $(".qwick-view-content .old").text("$" + product.old_price + ".00");
            }
            $(".qwick-view-content .product-desc").text(product.descr);
            
            let imageBig = $(".quick-view-tab-content img");
            let imageList = $(".quick-view-list img");
            // console.log(product.photo.length);
            for(let i = 0; i < 3; i++){
                imageList[i].src = "/assets/img/product/min/" + product.photo[i].image;
                imageBig[i].src = "/assets/img/product/card/" + product.photo[i].image;
            }
        }, 
        error: function(xhr, status, error){ 
            console.error(xhr.responseText); 
        } 
    });
    console.log(prodId);
}
