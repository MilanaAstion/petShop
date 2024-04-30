<h1>Contact page</h1>
<!-- <p>{{recipe.name}}</p> -->
{% if recipes %}
    {% for recipe in recipes %}
        <h2>{{ recipe.name }}</h2>
    {% endfor %}
{% else %}
    <p>Рецептов нету</p>
{% endif %}