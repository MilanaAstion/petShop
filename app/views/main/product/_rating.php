<div id="des-details3" class="tab-pane">
    <div class="rattings-wrapper">
        {% for comment in comments %}
            <div class="sin-rattings">
                <div class="star-author-all">
                    <div class="product-rating f-left">
                        {% for i in 1..5 %}
                            {% if i <= comment.rating %}
                                <i class="ti-star theme-color"></i>
                            {% else %}
                                <i class="ti-star"></i>
                            {% endif %}
                        {% endfor %}
                        <span>({{comment.rating}})</span>
                    </div>
                    <div class="ratting-author f-right">
                        <h3>{{comment.author}}</h3>
                        <span>12:24</span>
                        <span>{{comment.date}}</span>
                    </div>
                </div>
                <p>{{comment.text}}</p>
            </div>
        {% endfor %}
    </div>

    <div class="ratting-form-wrapper">
        <h3>Add your Comments :</h3>
        <div class="ratting-form">
            <form action="/rating/add" method="post">
                <div class="star-box">
                    <h2>Rating:</h2>
                    <div class="product-rating">
                        <i class="ti-star"></i>
                        <i class="ti-star"></i>
                        <i class="ti-star"></i>
                        <i class="ti-star"></i>
                        <i class="ti-star"></i>
                        <span id="product-rating-num">(0)</span>
                        <input type="hidden" name="rating" id="product-rating-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="rating-form-style mb-20">
                            <input placeholder="Name" type="text" name="author">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rating-form-style mb-20">
                            <!-- <input placeholder="Email" type="text"> -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="rating-form-style form-submit">
                            <textarea name="text" placeholder="Message"></textarea>
                            <input type="hidden" name="prod_id" value={{product.id}}>
                            <input type="submit" value="add review">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // .ratting-form .product-rating i
    let stars = document.querySelectorAll(".ratting-form .product-rating i");
    stars.forEach(star => star.onclick = setColor);
    
    function setColor(){
        let arr = [...stars];
        let index = arr.indexOf(this);
        stars.forEach(star => star.style.color = "black");
        for(let i = 0; i < stars.length; i++){
            if(i <= index){
                stars[i].style.color = "red";
            }
        }
        document.querySelector("#product-rating-num").innerText = `(${index + 1})`;
        document.querySelector("#product-rating-input").value = index + 1;
        console.log(index);
    }
</script>